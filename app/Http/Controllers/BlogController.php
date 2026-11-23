<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Display a listing of blog articles with filters, search, and featured post.
     */
    public function index(Request $request): View
    {
        $categories = Category::withCount(['posts' => function ($query): void {
            $query->published();
        }])->orderBy('order')->get();

        $categorySlug = $request->query('category');
        $searchQuery = $request->query('search');
        $currentSort = $request->query('sort', 'recent');

        $activeCategory = null;
        if (!empty($categorySlug)) {
            $activeCategory = $categories->firstWhere('slug', $categorySlug);
        }

        $isFiltering = !empty($categorySlug) || !empty($searchQuery) || $request->has('page');
        
        // isHome is TRUE ONLY on the root "/" route without active query filters
        $isHome = $request->routeIs('home') && !$isFiltering;

        // Featured post (only displayed on the root "/" homepage without filters)
        $featuredPost = null;
        if ($isHome) {
            $featuredPost = Post::published()
                ->featured()
                ->with('category')
                ->latest('published_at')
                ->first();

            if (!$featuredPost) {
                $featuredPost = Post::published()->with('category')->latest('published_at')->first();
            }
        }

        // Posts query
        $postsQuery = Post::published()->with('category');

        // Only exclude featured post from the grid on the root homepage
        if ($isHome && $featuredPost instanceof Post) {
            $postsQuery->where('id', '!=', $featuredPost->id);
        }

        $postsQuery->filter([
            'search' => $searchQuery,
            'category' => $categorySlug,
            'sort' => $currentSort,
        ]);

        $posts = $postsQuery->paginate(9)->withQueryString();

        return view('blog.index', [
            'categories' => $categories,
            'activeCategory' => $activeCategory,
            'featuredPost' => $featuredPost,
            'posts' => $posts,
            'searchQuery' => $searchQuery,
            'currentSort' => $currentSort,
            'isFiltering' => $isFiltering,
            'isHome' => $isHome,
        ]);
    }

    /**
     * Display the specified blog article.
     */
    public function show(string $slug): View
    {
        $post = Post::published()
            ->with('category')
            ->where('slug', $slug)
            ->firstOrFail();

        $post->incrementViews();

        $relatedPosts = Post::related($post, 3)->get();

        $nextPost = Post::published()
            ->where('published_at', '>', $post->published_at)
            ->orderBy('published_at', 'asc')
            ->first();

        $previousPost = Post::published()
            ->where('published_at', '<', $post->published_at)
            ->orderBy('published_at', 'desc')
            ->first();

        return view('blog.show', [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
            'nextPost' => $nextPost,
            'previousPost' => $previousPost,
        ]);
    }
}
