@extends('layouts.app')

@section('title', $post->title)

@section('content')
<!-- Hero Section with Featured Image -->
<div class="relative bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 py-20">
    <div class="absolute inset-0 bg-pattern opacity-10"></div>
    @if($post->images->where('is_featured', true)->first())
        <div class="absolute inset-0">
            <img src="{{ $post->images->where('is_featured', true)->first()->image_path }}" 
                 alt="{{ $post->title }}" 
                 class="w-full h-full object-cover opacity-20">
        </div>
    @endif
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center">
            <div class="flex items-center justify-center text-sm text-purple-100 mb-4">
                <span>{{ $post->created_at->format('F j, Y') }}</span>
                <span class="mx-2">&bull;</span>
                <span>{{ $post->reading_time }} min read</span>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-white mb-6">
                {{ $post->title }}
            </h1>
            @if($post->meta_description)
                <p class="text-xl text-purple-100 max-w-2xl mx-auto">
                    {{ $post->meta_description }}
                </p>
            @endif
        </div>
    </div>
</div>

<div class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-3">
                <article class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="p-8">
                        <!-- Categories -->
                        <div class="flex flex-wrap gap-2 mb-8">
                            @foreach($post->categories as $category)
                                <a href="{{ route('blog.index', ['category' => $category->slug]) }}"
                                   class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-gradient-to-r from-indigo-500 to-purple-500 text-white hover:from-indigo-600 hover:to-purple-600 transition-all">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>

                        <!-- Featured Image -->
                        @if($post->images->where('is_featured', true)->first())
                            <div class="mb-8 rounded-xl overflow-hidden">
                                <img src="{{ $post->images->where('is_featured', true)->first()->image_path }}" 
                                     alt="{{ $post->title }}" 
                                     class="w-full h-auto">
                            </div>
                        @endif

                        <!-- Content -->
                        <div class="prose prose-lg max-w-none">
                            {!! $post->content !!}
                        </div>

                        <!-- Image Gallery -->
                        @if($post->images->where('is_featured', false)->isNotEmpty())
                            <div class="mt-12">
                                <h2 class="text-2xl font-bold text-gray-900 mb-6">Gallery</h2>
                                <x-blog-image-gallery 
                                    :images="$post->images->where('is_featured', false)" 
                                    containerClass="mt-4"
                                    imageClass="rounded-lg shadow-md"
                                />
                            </div>
                        @endif

                        <!-- Tags -->
                        @if($post->tags->count() > 0)
                            <div class="mt-12 pt-8 border-t border-gray-200">
                                <h2 class="text-xl font-bold text-gray-900 mb-6">Tags</h2>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($post->tags as $tag)
                                        <a href="{{ route('blog.index', ['tag' => $tag->slug]) }}"
                                           class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-gradient-to-r from-pink-500 to-rose-500 text-white hover:from-pink-600 hover:to-rose-600 transition-all">
                                            {{ $tag->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </article>

                <!-- Navigation -->
                <div class="mt-8 grid grid-cols-2 gap-4">
                    @if($previousPost)
                        <a href="{{ route('blog.show', $previousPost) }}" 
                           class="group bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all">
                            <div class="text-sm text-gray-500">Previous Post</div>
                            <div class="mt-2 text-lg font-semibold text-gray-900 group-hover:text-indigo-600 transition-colors">
                                {{ $previousPost->title }}
                            </div>
                        </a>
                    @else
                        <div></div>
                    @endif

                    @if($nextPost)
                        <a href="{{ route('blog.show', $nextPost) }}" 
                           class="group bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all text-right">
                            <div class="text-sm text-gray-500">Next Post</div>
                            <div class="mt-2 text-lg font-semibold text-gray-900 group-hover:text-indigo-600 transition-colors">
                                {{ $nextPost->title }}
                            </div>
                        </a>
                    @else
                        <div></div>
                    @endif
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1 space-y-8">
                <!-- Author Info -->
                <div class="bg-gradient-to-br from-purple-600 to-indigo-600 p-1 rounded-2xl shadow-lg">
                    <div class="bg-white p-6 rounded-2xl">
                        <h2 class="text-xl font-bold text-gray-900 mb-6">About the Author</h2>
                        <div class="flex items-center">
                            <img class="h-16 w-16 rounded-full object-cover ring-4 ring-purple-100" 
                                 src="{{ asset('storage/profile.jpeg') }}" 
                                 alt="Amit Pandey">
                            <div class="ml-4">
                                <h3 class="text-lg font-bold text-gray-900">{{ $post->author->name }}</h3>
                                <p class="text-gray-600">Full Stack Developer</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Related Posts -->
                @if($relatedPosts->count() > 0)
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        <div class="p-6">
                            <h2 class="text-xl font-bold text-gray-900 mb-6">Related Posts</h2>
                            <div class="space-y-6">
                                @foreach($relatedPosts as $relatedPost)
                                    <a href="{{ route('blog.show', $relatedPost) }}" 
                                       class="group block hover:bg-gray-50 rounded-xl p-4 transition-colors">
                                        @if($relatedPost->images->where('is_featured', true)->first())
                                            <img src="{{ $relatedPost->images->where('is_featured', true)->first()->image_path }}" 
                                                 alt="{{ $relatedPost->title }}"
                                                 class="w-full h-32 object-cover rounded-lg mb-4">
                                        @endif
                                        <h3 class="text-lg font-semibold text-gray-900 group-hover:text-indigo-600 transition-colors">
                                            {{ $relatedPost->title }}
                                        </h3>
                                        <p class="mt-2 text-sm text-gray-500">
                                            {{ $relatedPost->created_at->format('F j, Y') }}
                                        </p>
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