<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'image_caption',
        'author_name',
        'author_role',
        'author_avatar',
        'reading_time',
        'is_featured',
        'is_published',
        'published_at',
        'views_count',
        'meta_title',
        'meta_description',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'is_published' => 'boolean',
            'published_at' => 'datetime',
            'views_count' => 'integer',
            'reading_time' => 'integer',
        ];
    }

    /**
     * Get the category that the post belongs to.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Scope a query to only include published posts.
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    /**
     * Scope a query to only include featured posts.
     */
    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope a query to filter posts by search keyword, category slug, and sort order.
     *
     * @param  array{search?: ?string, category?: ?string, sort?: ?string}  $filters
     */
    public function scopeFilter(Builder $query, array $filters): Builder
    {
        if (!empty($filters['search'])) {
            $searchTerm = trim($filters['search']);
            $query->where(function (Builder $subQuery) use ($searchTerm): void {
                $subQuery->where('title', 'like', "%{$searchTerm}%")
                    ->orWhere('excerpt', 'like', "%{$searchTerm}%")
                    ->orWhere('content', 'like', "%{$searchTerm}%")
                    ->orWhere('author_name', 'like', "%{$searchTerm}%");
            });
        }

        if (!empty($filters['category'])) {
            $categorySlug = $filters['category'];
            $query->whereHas('category', function (Builder $categoryQuery) use ($categorySlug): void {
                $categoryQuery->where('slug', $categorySlug);
            });
        }

        $sort = $filters['sort'] ?? 'recent';
        if ($sort === 'popular') {
            $query->orderByDesc('views_count');
        } elseif ($sort === 'oldest') {
            $query->orderBy('published_at', 'asc');
        } else {
            $query->orderByDesc('published_at');
        }

        return $query;
    }

    /**
     * Scope to find related posts in same category, excluding current.
     */
    public function scopeRelated(Builder $query, Post $post, int $limit = 3): Builder
    {
        return $query->published()
            ->where('id', '!=', $post->id)
            ->where('category_id', $post->category_id)
            ->latest('published_at')
            ->limit($limit);
    }

    /**
     * Get formatted publication date in Spanish.
     */
    public function getFormattedDateAttribute(): string
    {
        if (!$this->published_at instanceof Carbon) {
            return '';
        }

        $months = [
            1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
            5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
            9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
        ];

        $day = $this->published_at->format('d');
        $month = $months[(int)$this->published_at->format('n')];
        $year = $this->published_at->format('Y');

        return "{$day} de {$month}, {$year}";
    }

    /**
     * Get reading time label.
     */
    public function getReadingTimeLabelAttribute(): string
    {
        return "{$this->reading_time} min de lectura";
    }

    /**
     * Increment views count safely.
     */
    public function incrementViews(): void
    {
        $this->increment('views_count');
    }

    /**
     * Boot model events.
     */
    protected static function booted(): void
    {
        static::saving(function (Post $post): void {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }
}
