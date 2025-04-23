<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'slug',
        'status',
        'author_id',
        'meta_description',
        'views_count',
    ];

    protected $casts = [
        'views_count' => 'integer',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function categories()
    {
        return $this->belongsToMany(BlogCategory::class, 'blog_post_categories', 'blog_post_id', 'blog_category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(BlogTag::class, 'blog_post_tags', 'blog_post_id', 'blog_tag_id');
    }

    public function images()
    {
        return $this->hasMany(BlogImage::class);
    }

    public function incrementViewCount()
    {
        $this->increment('views_count');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }
} 