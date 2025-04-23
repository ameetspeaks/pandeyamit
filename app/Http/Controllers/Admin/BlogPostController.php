<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::with(['author', 'categories', 'tags'])
            ->latest()
            ->paginate(10);
        return view('admin.blog-posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = BlogCategory::all();
        $tags = BlogTag::all();
        return view('admin.blog-posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'meta_description' => 'nullable|max:255',
            'status' => 'required|in:draft,published',
            'categories' => 'required|array',
            'categories.*' => 'exists:blog_categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:blog_tags,id',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['author_id'] = auth()->id();

        $post = BlogPost::create($validated);
        
        $post->categories()->attach($request->categories);
        if ($request->has('tags')) {
            $post->tags()->attach($request->tags);
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('blog-posts', 'public');
                $post->images()->create([
                    'image_url' => $path,
                    'is_featured' => false,
                ]);
            }
        }

        return redirect()->route('admin.blog-posts.index')
            ->with('success', 'Blog post created successfully.');
    }

    public function edit(BlogPost $blogPost)
    {
        $categories = BlogCategory::all();
        $tags = BlogTag::all();
        return view('admin.blog-posts.edit', compact('blogPost', 'categories', 'tags'));
    }

    public function update(Request $request, BlogPost $blogPost)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'meta_description' => 'nullable|max:255',
            'status' => 'required|in:draft,published',
            'categories' => 'required|array',
            'categories.*' => 'exists:blog_categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:blog_tags,id',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        
        $blogPost->update($validated);
        
        $blogPost->categories()->sync($request->categories);
        $blogPost->tags()->sync($request->tags ?? []);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('blog-posts', 'public');
                $blogPost->images()->create([
                    'image_url' => $path,
                    'is_featured' => false,
                ]);
            }
        }

        return redirect()->route('admin.blog-posts.index')
            ->with('success', 'Blog post updated successfully.');
    }

    public function destroy(BlogPost $blogPost)
    {
        foreach ($blogPost->images as $image) {
            Storage::disk('public')->delete($image->image_url);
        }

        $blogPost->delete();

        return redirect()->route('admin.blog-posts.index')
            ->with('success', 'Blog post deleted successfully.');
    }

    public function deleteImage(Request $request)
    {
        $image = BlogImage::findOrFail($request->image_id);
        Storage::disk('public')->delete($image->image_url);
        $image->delete();

        return response()->json(['success' => true]);
    }
} 