<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Models\BlogTag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $query = BlogPost::with(['categories', 'tags'])
            ->where('status', 'published')
            ->latest();

        if ($request->has('category')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->has('tag')) {
            $query->whereHas('tags', function ($q) use ($request) {
                $q->where('slug', $request->tag);
            });
        }

        $posts = $query->paginate(6);
        $categories = BlogCategory::withCount('posts')->get();
        $tags = BlogTag::withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->take(10)
            ->get();

        return view('pages.blog.index', compact('posts', 'categories', 'tags'));
    }

    public function show(BlogPost $post)
    {
        abort_if($post->status !== 'published', 404);

        $post->load(['categories', 'tags']);

        $previousPost = BlogPost::where('status', 'published')
            ->where('created_at', '<', $post->created_at)
            ->latest()
            ->first();

        $nextPost = BlogPost::where('status', 'published')
            ->where('created_at', '>', $post->created_at)
            ->oldest()
            ->first();

        $relatedPosts = BlogPost::where('status', 'published')
            ->whereHas('categories', function ($query) use ($post) {
                $query->whereIn('blog_categories.id', $post->categories->pluck('id'));
            })
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get();

        return view('pages.blog.show', compact('post', 'previousPost', 'nextPost', 'relatedPosts'));
    }

    public function category(BlogCategory $category)
    {
        $posts = $category->posts()
            ->with(['author', 'categories', 'tags', 'images'])
            ->where('status', 'published')
            ->latest()
            ->paginate(9);

        return view('public.blog.category', compact('category', 'posts'));
    }

    public function tag(BlogTag $tag)
    {
        $posts = $tag->posts()
            ->with(['author', 'categories', 'tags', 'images'])
            ->where('status', 'published')
            ->latest()
            ->paginate(9);

        return view('public.blog.tag', compact('tag', 'posts'));
    }
} 