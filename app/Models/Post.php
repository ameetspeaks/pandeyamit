<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'excerpt',
        'featured_image',
        'status',
        'published_at',
        'is_featured'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_featured' => 'boolean'
    ];

    public function categories()
    {
        return $this->belongsToMany(BlogCategory::class, 'blog_post_categories');
    }

    public function tags()
    {
        return $this->belongsToMany(BlogTag::class, 'blog_post_tags');
    }

    public function images()
    {
        return $this->hasMany(BlogImage::class);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published')
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }
}
