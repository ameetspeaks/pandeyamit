@extends('layouts.app')

@section('title', 'Blog')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 py-20">
    <div class="absolute inset-0 bg-pattern opacity-10"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Blog & Articles</h1>
            <p class="text-xl text-purple-100 max-w-2xl mx-auto">Insights, tutorials, and updates from my journey in web development</p>
        </div>
    </div>
</div>

<div class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-3">
                <!-- Blog Posts -->
                <div class="space-y-12">
                    @forelse($posts as $post)
                        <div class="group bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                            @if($post->images->where('is_featured', true)->first())
                                <div class="relative h-72 overflow-hidden">
                                    <img src="{{ $post->images->where('is_featured', true)->first()->image_path }}" 
                                         alt="{{ $post->title }}"
                                         class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-300">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                    <div class="absolute bottom-0 left-0 right-0 p-6">
                                        <div class="flex items-center text-sm text-white mb-2">
                                            <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold bg-indigo-600/80">
                                                {{ $post->created_at->format('F j, Y') }}
                                            </span>
                                            <span class="mx-2">&bull;</span>
                                            <span>{{ $post->reading_time }} min read</span>
                                        </div>
                                        <h2 class="text-2xl font-bold text-white group-hover:text-indigo-200 transition-colors">
                                            <a href="{{ route('blog.show', $post) }}">
                                                {{ $post->title }}
                                            </a>
                                        </h2>
                                    </div>
                                </div>
                            @else
                                <div class="p-8">
                                    <div class="flex items-center text-sm mb-4">
                                        <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold bg-gradient-to-r from-pink-500 to-rose-500 text-white">
                                            {{ $post->created_at->format('F j, Y') }}
                                        </span>
                                        <span class="mx-2 text-gray-400">&bull;</span>
                                        <span class="text-gray-500">{{ $post->reading_time }} min read</span>
                                    </div>
                                    <h2 class="text-2xl font-bold text-gray-900 group-hover:text-indigo-600 transition-colors">
                                        <a href="{{ route('blog.show', $post) }}">
                                            {{ $post->title }}
                                        </a>
                                    </h2>
                                </div>
                            @endif
                            
                            <div class="p-8 pt-0">
                                <p class="mt-4 text-gray-600">
                                    {{ Str::limit(strip_tags($post->content), 200) }}
                                </p>
                                <div class="mt-6 flex flex-wrap gap-2">
                                    @foreach($post->categories as $category)
                                        <a href="{{ route('blog.index', ['category' => $category->slug]) }}"
                                           class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-gradient-to-r from-indigo-500 to-purple-500 text-white hover:from-indigo-600 hover:to-purple-600 transition-all">
                                            {{ $category->name }}
                                        </a>
                                    @endforeach
                                </div>
                                
                                <div class="mt-6">
                                    <a href="{{ route('blog.show', $post) }}" 
                                       class="inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-900">
                                        Read more
                                        <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="bg-white rounded-2xl shadow-lg p-8 text-center">
                            <p class="text-gray-600">No blog posts found.</p>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $posts->links() }}
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-8">
                <!-- Categories -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="p-6">
                        <h2 class="text-xl font-bold text-gray-900 mb-6">Categories</h2>
                        <div class="space-y-3">
                            @foreach($categories as $category)
                                <a href="{{ route('blog.index', ['category' => $category->slug]) }}"
                                   class="flex items-center justify-between group">
                                    <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">
                                        {{ $category->name }}
                                    </span>
                                    <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-indigo-100 text-indigo-600 text-xs font-medium">
                                        {{ $category->posts_count }}
                                    </span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Popular Tags -->
                @if(isset($tags) && $tags->isNotEmpty())
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <div class="p-6">
                            <h2 class="text-xl font-bold text-gray-900 mb-6">Popular Tags</h2>
                            <div class="flex flex-wrap gap-2">
                                @foreach($tags as $tag)
                                    <a href="{{ route('blog.index', ['tag' => $tag->slug]) }}"
                                       class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gradient-to-r from-pink-500 to-rose-500 text-white hover:from-pink-600 hover:to-rose-600 transition-all">
                                        {{ $tag->name }}
                                        <span class="ml-1 text-pink-100">{{ $tag->posts_count }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection 