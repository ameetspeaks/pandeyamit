@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 py-20">
    <div class="absolute inset-0 bg-pattern opacity-10"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">My Projects</h1>
            <p class="text-xl text-purple-100 max-w-2xl mx-auto">Explore my latest work and creative endeavors</p>
        </div>
    </div>
</div>

<div class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Filter Section -->
        <div class="mb-12">
            <div class="bg-white rounded-2xl shadow-lg p-6">
                <div class="flex flex-wrap gap-3">
                    @foreach($categories as $category)
                        <a href="{{ route('projects.index', ['category' => $category->slug]) }}" 
                           class="inline-flex items-center px-6 py-3 rounded-full text-sm font-medium transition-all
                                  {{ request('category') == $category->slug 
                                     ? 'bg-gradient-to-r from-indigo-600 to-purple-600 text-white shadow-lg'
                                     : 'bg-gray-100 text-gray-800 hover:bg-gray-200' }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Projects Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($projects as $project)
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                    @if($project->featured_image)
                        <div class="relative overflow-hidden">
                            <img src="{{ asset('storage/' . $project->featured_image) }}" 
                                 alt="{{ $project->title }}"
                                 class="w-full h-64 object-cover transform group-hover:scale-110 transition-transform duration-300">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        </div>
                    @endif
                    
                    <div class="p-8">
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-4 py-2 rounded-full text-sm font-semibold bg-gradient-to-r from-indigo-500 to-purple-500 text-white">
                                {{ $project->category->name }}
                            </span>
                            <span class="px-4 py-2 rounded-full text-xs font-semibold 
                                {{ $project->status === 'completed' ? 'bg-gradient-to-r from-green-500 to-emerald-500' : 'bg-gradient-to-r from-yellow-500 to-orange-500' }} text-white">
                                {{ ucfirst($project->status) }}
                            </span>
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-indigo-600 transition-colors">
                            {{ $project->title }}
                        </h3>
                        
                        <p class="text-gray-600 mb-6">
                            {{ Str::limit($project->description, 150) }}
                        </p>

                        <div class="flex items-center justify-between">
                            <a href="{{ route('projects.show', $project) }}" 
                               class="inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-900">
                                View Project
                                <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                </svg>
                            </a>
                            @if($project->project_url)
                                <a href="{{ $project->project_url }}" 
                                   target="_blank"
                                   class="inline-flex items-center text-sm font-semibold text-gray-600 hover:text-gray-900">
                                    Live Demo
                                    <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full">
                    <div class="bg-white rounded-2xl shadow-lg p-8 text-center">
                        <p class="text-gray-600">No projects found.</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $projects->links() }}
        </div>
    </div>
</div>
@endsection 