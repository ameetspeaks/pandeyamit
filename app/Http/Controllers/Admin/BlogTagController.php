<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BlogTagController extends Controller
{
    public function index(): View
    {
        // Eager load post count for efficiency
        $tags = BlogTag::withCount('posts')->paginate(10);
        return view('admin.blog.tags.index', compact('tags'));
    }

    public function create(): View
    {
        return view('admin.blog.tags.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:blog_tags',
            'slug' => 'nullable|max:255|unique:blog_tags',
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        BlogTag::create($validated);

        return redirect()->route('admin.blog-tags.index')
            ->with('success', 'Tag created successfully.');
    }

    public function show(BlogTag $tag): View
    {
        // Typically redirect to edit for admin
       return view('admin.blog.tags.edit', compact('tag'));
    }

    public function edit(BlogTag $blogTag): View
    {
        return view('admin.blog.tags.edit', ['tag' => $blogTag]);
    }

    public function update(Request $request, BlogTag $blogTag): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:blog_tags,name,' . $blogTag->id,
            'slug' => 'nullable|max:255|unique:blog_tags,slug,' . $blogTag->id,
        ]);

        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $blogTag->update($validated);

        return redirect()->route('admin.blog-tags.index')
            ->with('success', 'Tag updated successfully.');
    }

    public function destroy(BlogTag $blogTag): RedirectResponse
    {
        if ($blogTag->posts()->count() > 0) {
            return back()->with('error', 'Cannot delete tag with associated posts.');
        }

        $blogTag->delete();

        return redirect()->route('admin.blog-tags.index')
            ->with('success', 'Tag deleted successfully.');
    }
} 