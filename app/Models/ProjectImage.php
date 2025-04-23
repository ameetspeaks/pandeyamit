<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'image_url',
        'is_featured',
        'display_order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
} 