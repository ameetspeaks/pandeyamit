<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_post_id',
        'image_url',
        'is_featured',
        'display_order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    public function post()
    {
        return $this->belongsTo(BlogPost::class, 'blog_post_id');
    }
} 