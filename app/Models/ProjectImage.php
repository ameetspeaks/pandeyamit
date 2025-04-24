<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Throwable;

class ProjectImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'image_path',
        'is_featured',
        'display_order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    protected $appends = [
        'image_url',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the full public URL for the image.
     *
     * @return string|null
     */
    public function getImageUrlAttribute(): ?string
    {
        if (empty($this->image_path)) {
            Log::warning("ProjectImage ID {$this->id}: image_path is empty.");
            return null;
        }

        try {
            // Check if file exists
            if (!Storage::disk('public')->exists($this->image_path)) {
                Log::error("File does not exist for ProjectImage ID {$this->id}: {$this->image_path}");
                return null;
            }

            // Use asset helper for direct URL generation
            return asset('storage/' . $this->image_path);
            
        } catch (Throwable $e) {
            Log::error("Error generating URL for ProjectImage ID {$this->id} with path '{$this->image_path}': " . $e->getMessage());
            return null;
        }
    }
} 