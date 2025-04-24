<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BlogCategoryController extends Controller
{
    public function index(): View
    {
        // Eager load post count for efficiency
        $categories = BlogCategory::withCount('posts')->paginate(10);
        return view('admin.blog.categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('admin.blog.categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:blog_categories',
            'slug' => 'nullable|max:255|unique:blog_categories',
            'description' => 'nullable|max:1000',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        BlogCategory::create($validated);

        return redirect()->route('admin.blog-categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function show(BlogCategory $category): View
    {
         // Typically redirect to edit for admin
        return view('admin.blog.categories.edit', compact('category'));
    }

    public function edit(BlogCategory $blogCategory): View
    {
        return view('admin.blog.categories.edit', ['category' => $blogCategory]);
    }

    public function update(Request $request, BlogCategory $blogCategory): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:blog_categories,name,' . $blogCategory->id,
            'slug' => 'nullable|max:255|unique:blog_categories,slug,' . $blogCategory->id,
            'description' => 'nullable|max:1000',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $blogCategory->update($validated);

        return redirect()->route('admin.blog-categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(BlogCategory $blogCategory): RedirectResponse
    {
        if ($blogCategory->posts()->count() > 0) {
            return back()->with('error', 'Cannot delete category with associated posts.');
        }

        $blogCategory->delete();

        return redirect()->route('admin.blog-categories.index')
            ->with('success', 'Category deleted successfully.');
    }
} 