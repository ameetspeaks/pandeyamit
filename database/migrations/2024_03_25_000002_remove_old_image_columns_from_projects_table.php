<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Check if the columns exist before trying to drop them
        if (Schema::hasColumn('projects', 'featured_image')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->dropColumn('featured_image');
            });
        }
        if (Schema::hasColumn('projects', 'images')) {
            Schema::table('projects', function (Blueprint $table) {
                $table->dropColumn('images');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // Add the columns back if needed for rollback
            $table->string('featured_image')->nullable()->after('project_url');
            $table->json('images')->nullable()->after('featured_image');
        });
    }
}; 