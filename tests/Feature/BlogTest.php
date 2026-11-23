<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class BlogTest extends TestCase
{
    use RefreshDatabase;

    private Category $category;
    private Post $featuredPost;
    private Post $regularPost;

    protected function setUp(): void
    {
        parent::setUp();

        $this->category = Category::create([
            'name' => 'Descanso y Bienestar',
            'slug' => 'descanso-y-bienestar',
            'description' => 'Higiene del sueño y confort.',
            'order' => 1,
        ]);

        $this->featuredPost = Post::create([
            'category_id' => $this->category->id,
            'title' => 'El Santuario del Descanso',
            'slug' => 'el-santuario-del-descanso',
            'excerpt' => 'Aprende a transformar tu dormitorio.',
            'content' => '<p>Contenido editorial de prueba sobre descanso.</p>',
            'image' => '/images/blog/hero-editorial.jpg',
            'author_name' => 'Camila Valdivia',
            'author_role' => 'Directora de Interiorismo',
            'author_avatar' => 'CV',
            'reading_time' => 5,
            'is_featured' => true,
            'is_published' => true,
            'published_at' => Carbon::now()->subDay(),
            'views_count' => 10,
        ]);

        $this->regularPost = Post::create([
            'category_id' => $this->category->id,
            'title' => 'La Nobleza del Algodon Pima',
            'slug' => 'la-nobleza-del-algodon-pima',
            'excerpt' => 'El algodon de fibra extra larga.',
            'content' => '<p>Contenido sobre la fibra peruana.</p>',
            'image' => '/images/blog/cotton-boll.jpg',
            'author_name' => 'Alonso Mendoza',
            'author_role' => 'Maestro Textil',
            'author_avatar' => 'AM',
            'reading_time' => 4,
            'is_featured' => false,
            'is_published' => true,
            'published_at' => Carbon::now()->subDays(2),
            'views_count' => 5,
        ]);
    }

    public function test_home_page_renders_successfully(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Diario Editorial Peru Pima');
        $response->assertSee('El Santuario del Descanso');
        $response->assertSee('Universo Pima');
        $response->assertSee('Categorías');
    }

    public function test_blog_index_page_renders_successfully(): void
    {
        $response = $this->get('/blog');

        $response->assertStatus(200);
        $response->assertSee('Todos los Artículos');
        $response->assertSee('Descanso y Bienestar');
        $response->assertDontSee('El Arte del Descanso & la Poesía Textil');
    }

    public function test_filter_by_category_shows_only_matching_posts(): void
    {
        $otherCategory = Category::create([
            'name' => 'Decoración y Hogar',
            'slug' => 'decoracion-y-hogar',
            'description' => 'Decoración.',
            'order' => 2,
        ]);

        $otherPost = Post::create([
            'category_id' => $otherCategory->id,
            'title' => 'Ideas de Decoracion Organica',
            'slug' => 'ideas-de-decoracion-organica',
            'excerpt' => 'Tonos arena y calidez.',
            'content' => '<p>Decoración con lino.</p>',
            'image' => '/images/blog/natural-tones.jpg',
            'author_name' => 'Valeria Rossi',
            'reading_time' => 3,
            'is_featured' => false,
            'is_published' => true,
            'published_at' => Carbon::now()->subDays(3),
        ]);

        $response = $this->get('/blog?category=decoracion-y-hogar');

        $response->assertStatus(200);
        $response->assertSee('Ideas de Decoracion Organica');
        $response->assertDontSee('La Nobleza del Algodon Pima');
    }

    public function test_search_functionality_filters_posts(): void
    {
        $response = $this->get('/blog?search=Santuario');

        $response->assertStatus(200);
        $response->assertSee('El Santuario del Descanso');
        $response->assertDontSee('La Nobleza del Algodon Pima');
    }

    public function test_search_with_no_matches_renders_empty_state(): void
    {
        $response = $this->get('/blog?search=PalabraTotalmenteInexistenteXYZ');

        $response->assertStatus(200);
        $response->assertSee('No encontramos artículos para esta búsqueda');
    }

    public function test_sorting_posts_by_popularity(): void
    {
        $response = $this->get('/blog?sort=popular');

        $response->assertStatus(200);
        $response->assertSee('El Santuario del Descanso');
    }

    public function test_single_post_view_renders_successfully(): void
    {
        $response = $this->get('/blog/' . $this->featuredPost->slug);

        $response->assertStatus(200);
        $response->assertSee($this->featuredPost->title);
        $response->assertSee('Camila Valdivia');
        $response->assertSee('Descanso y Bienestar');
        $response->assertSee('Contenido editorial de prueba sobre descanso.');
    }

    public function test_single_post_increments_views(): void
    {
        $initialViews = $this->featuredPost->views_count;

        $this->get('/blog/' . $this->featuredPost->slug);

        $this->assertEquals($initialViews + 1, $this->featuredPost->fresh()->views_count);
    }

    public function test_invalid_post_slug_returns_404(): void
    {
        $response = $this->get('/blog/articulo-que-no-existe');

        $response->assertStatus(404);
    }

    public function test_related_posts_exclude_current_post(): void
    {
        $relatedPost = Post::create([
            'category_id' => $this->category->id,
            'title' => 'Tercer Articulo en Misma Categoria',
            'slug' => 'tercer-articulo-misma-categoria',
            'excerpt' => 'Extracto de prueba.',
            'content' => '<p>Cuerpo del articulo.</p>',
            'image' => '/images/blog/spa-ritual.jpg',
            'author_name' => 'Alonso Mendoza',
            'reading_time' => 3,
            'is_featured' => false,
            'is_published' => true,
            'published_at' => Carbon::now()->subDays(4),
        ]);

        $response = $this->get('/blog/' . $this->featuredPost->slug);

        $response->assertStatus(200);
        $response->assertSee('Publicaciones Relacionadas');
        $response->assertSee('Tercer Articulo en Misma Categoria');
    }
}
