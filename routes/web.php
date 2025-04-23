<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\ProjectController;
use App\Http\Controllers\Public\BlogController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogTagController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\NewsletterSubscriberController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Projects Routes
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

// Blog Routes
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post}', [BlogController::class, 'show'])->name('blog.show');

// Contact Routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Newsletter Routes
Route::post('/newsletter/subscribe', [ContactController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/newsletter/unsubscribe/{email}', [ContactController::class, 'unsubscribe'])->name('newsletter.unsubscribe');

// Admin Routes
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Project Categories
    Route::resource('project-categories', ProjectCategoryController::class);
    Route::resource('projects', AdminProjectController::class);
    Route::post('projects/delete-image', [AdminProjectController::class, 'deleteImage'])->name('projects.delete-image');

    // Blog Management
    Route::resource('blog-categories', BlogCategoryController::class);
    Route::resource('blog-tags', BlogTagController::class);
    Route::resource('blog-posts', BlogPostController::class);
    Route::post('blog-posts/delete-image', [BlogPostController::class, 'deleteImage'])->name('blog-posts.delete-image');

    // Testimonials
    Route::resource('testimonials', TestimonialController::class);

    // Newsletter Subscribers
    Route::resource('newsletter-subscribers', NewsletterSubscriberController::class)->only(['index', 'destroy']);
    Route::get('newsletter-subscribers/export', [NewsletterSubscriberController::class, 'export'])->name('newsletter-subscribers.export');
});
