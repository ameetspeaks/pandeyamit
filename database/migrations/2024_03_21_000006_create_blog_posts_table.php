<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('slug')->unique();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
            $table->text('meta_description')->nullable();
            $table->integer('views_count')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blog_posts');
    }
}; 