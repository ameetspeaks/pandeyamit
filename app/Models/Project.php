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
    ];

    protected $casts = [
        'technologies_used' => 'array',
        'is_featured' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function category()
    {
        return $this->belongsTo(ProjectCategory::class);
    }

    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
} 