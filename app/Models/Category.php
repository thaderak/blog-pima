<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'order',
    ];

    /**
     * Get all posts for this category.
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get published posts for this category.
     */
    public function publishedPosts(): HasMany
    {
        return $this->hasMany(Post::class)
            ->where('is_published', true)
            ->where('published_at', '<=', now())
            ->orderByDesc('published_at');
    }

    /**
     * Boot model events.
     */
    protected static function booted(): void
    {
        static::saving(function (Category $category): void {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }
}
