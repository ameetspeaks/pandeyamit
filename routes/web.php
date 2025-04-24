<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\ProjectController;
use App\Http\Controllers\Public\BlogController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogTagController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\NewsletterSubscriberController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Public\AboutController;
use App\Http\Controllers\Admin\AdminDashboardController;

// Authentication Routes
Auth::routes();

// Public Routes
Route::get('/', [App\Http\Controllers\Public\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\Public\AboutController::class, 'index'])->name('about');

// Projects Routes
Route::get('/projects', [App\Http\Controllers\Public\ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [App\Http\Controllers\Public\ProjectController::class, 'show'])->name('projects.show');

// Blog Routes
Route::get('/blog', [App\Http\Controllers\Public\BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post}', [App\Http\Controllers\Public\BlogController::class, 'show'])->name('blog.show');

// Contact Routes
Route::get('/contact', [App\Http\Controllers\Public\ContactController::class, 'index'])->name('contact');
Route::post('/contact', [App\Http\Controllers\Public\ContactController::class, 'store'])->name('contact.store');

// Newsletter Routes
Route::post('/newsletter/subscribe', [ContactController::class, 'subscribe'])->name('newsletter.subscribe');
Route::get('/newsletter/unsubscribe/{email}', [ContactController::class, 'unsubscribe'])->name('newsletter.unsubscribe');

// Test Admin Dashboard Route (temporary)
Route::get('/test-admin-dashboard', [DashboardController::class, 'index'])
    ->middleware(['web', 'auth', 'verified'])
    ->middleware(\App\Http\Middleware\AdminMiddleware::class)
    ->name('admin.test.dashboard');

// Admin Routes
Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Projects
    Route::resource('projects', AdminProjectController::class);
    Route::resource('project-categories', ProjectCategoryController::class);
    Route::post('projects/reorder', [AdminProjectController::class, 'reorder'])->name('projects.reorder');
    Route::post('projects/delete-image', [AdminProjectController::class, 'deleteImage'])->name('projects.delete-image');
    
    // Blog
    Route::resource('blog-posts', BlogPostController::class);
    Route::resource('blog-categories', BlogCategoryController::class);
    Route::resource('blog-tags', BlogTagController::class);
    Route::post('blog/delete-image', [BlogPostController::class, 'deleteImage'])->name('blog.delete-image');
    
    // Testimonials
    Route::resource('testimonials', TestimonialController::class);
    Route::post('testimonials/reorder', [TestimonialController::class, 'reorder'])->name('testimonials.reorder');
    
    // Newsletter
    Route::resource('newsletter-subscribers', NewsletterSubscriberController::class)->only(['index', 'destroy']);
    Route::get('newsletter-subscribers/export', [NewsletterSubscriberController::class, 'export'])->name('newsletter-subscribers.export');
});
