<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'technologies_used',
        'project_url',
        'start_date',
        'end_date',
        'is_featured',
        'status',
        'client',
        'duration',
        'completed_at',
        'meta_description',
        'slug',
    ];

    protected $casts = [
        'technologies_used' => 'array',
        'is_featured' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
        'completed_at' => 'datetime',
    ];

    protected $appends = [
        'featured_image_url'
    ];

    public function category()
    {
        return $this->belongsTo(ProjectCategory::class);
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class)->orderBy('display_order');
    }

    public function getFeaturedImageUrlAttribute()
    {
        $featuredImage = $this->images()->where('is_featured', true)->first();
        
        return $featuredImage ? $featuredImage->image_url : null;
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
} 