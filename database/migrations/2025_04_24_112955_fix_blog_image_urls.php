<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Fix image URLs by removing /storage/ prefix
        DB::table('blog_images')->get()->each(function ($image) {
            $fixedUrl = preg_replace('#^/storage/#', '', $image->image_url);
            DB::table('blog_images')
                ->where('id', $image->id)
                ->update(['image_url' => $fixedUrl]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Add back /storage/ prefix to image URLs
        DB::table('blog_images')->get()->each(function ($image) {
            $originalUrl = '/storage/' . $image->image_url;
            DB::table('blog_images')
                ->where('id', $image->id)
                ->update(['image_url' => $originalUrl]);
        });
    }
};
