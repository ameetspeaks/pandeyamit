<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->foreignId('category_id')->constrained('project_categories')->onDelete('cascade');
            $table->enum('status', ['ongoing', 'completed'])->default('ongoing');
            $table->json('technologies_used')->nullable();
            $table->string('project_url')->nullable();
            $table->string('featured_image')->nullable();
            $table->json('images')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
}; 