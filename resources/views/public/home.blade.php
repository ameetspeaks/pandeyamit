@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- Hero Section with Stats -->
<div class="relative bg-gradient-to-br from-purple-600 via-pink-500 to-orange-400 text-white py-24">
    <div class="absolute inset-0 bg-pattern opacity-10"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="text-center">
            <h1 class="text-6xl font-bold mb-4 tracking-tight">Amit Pandey</h1>
            <p class="text-2xl mb-16 text-purple-100">Full Stack Developer & Web Designer</p>
            
            <!-- Stats Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto mt-12 bg-white/10 backdrop-blur-lg rounded-2xl p-8">
                <div class="text-center">
                    <span class="block text-5xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-yellow-400 to-orange-500">12</span>
                    <span class="text-sm mt-2 block text-purple-100">Years Experience</span>
                </div>
                <div class="text-center">
                    <span class="block text-5xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-green-400 to-cyan-500">820+</span>
                    <span class="text-sm mt-2 block text-purple-100">Projects Completed</span>
                </div>
                <div class="text-center">
                    <span class="block text-5xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-pink-400 to-red-500">720+</span>
                    <span class="text-sm mt-2 block text-purple-100">Happy Clients</span>
                </div>
                <div class="text-center">
                    <span class="block text-5xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-indigo-500">2200+</span>
                    <span class="text-sm mt-2 block text-purple-100">Cup of Coffee</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Services Section -->
<div class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                <div class="h-2 bg-gradient-to-r from-pink-500 to-orange-500"></div>
                <div class="p-8">
                    <div class="w-16 h-16 bg-gradient-to-br from-pink-500 to-orange-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900">Web Design</h3>
                    <p class="text-gray-600">Creating beautiful, responsive websites that provide excellent user experience</p>
                </div>
            </div>
            
            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                <div class="h-2 bg-gradient-to-r from-purple-500 to-indigo-500"></div>
                <div class="p-8">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900">Web Development</h3>
                    <p class="text-gray-600">Building robust and scalable web applications using modern technologies</p>
                </div>
            </div>
            
            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                <div class="h-2 bg-gradient-to-r from-green-500 to-teal-500"></div>
                <div class="p-8">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-teal-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900">UI/UX Design</h3>
                    <p class="text-gray-600">Designing intuitive interfaces and seamless user experiences</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Education & Experience Section -->
<div class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
            <!-- Education -->
            <div>
                <h2 class="text-3xl font-bold mb-12 text-gray-900 flex items-center">
                    <span class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M12 14l9-5-9-5-9 5 9 5z"/>
                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                        </svg>
                    </span>
                    Education
                </h2>
                <div class="space-y-8">
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold bg-gradient-to-r from-blue-500 to-cyan-500 text-white mb-4">2018 - 2020</span>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Masters in Data Analysis</h3>
                        <p class="text-gray-600">University of Technology</p>
                    </div>
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold bg-gradient-to-r from-blue-500 to-cyan-500 text-white mb-4">2014 - 2018</span>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Bachelor in Engineering</h3>
                        <p class="text-gray-600">Institute of Technology</p>
                    </div>
                </div>
            </div>
            
            <!-- Experience -->
            <div>
                <h2 class="text-3xl font-bold mb-12 text-gray-900 flex items-center">
                    <span class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </span>
                    Experience
                </h2>
                <div class="space-y-8">
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold bg-gradient-to-r from-purple-500 to-pink-500 text-white mb-4">2020 - Present</span>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Senior Web Developer</h3>
                        <p class="text-gray-600">Tech Solutions Inc.</p>
                    </div>
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold bg-gradient-to-r from-purple-500 to-pink-500 text-white mb-4">2018 - 2020</span>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Full Stack Developer</h3>
                        <p class="text-gray-600">Digital Agency Ltd.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Latest Projects Section -->
<div class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-16 text-center text-gray-900">Latest Projects</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredProjects ?? [] as $project)
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                    @if($project->featured_image)
                        <div class="relative overflow-hidden">
                            <img src="{{ asset('storage/' . $project->featured_image) }}" 
                                 alt="{{ $project->title }}"
                                 class="w-full h-48 object-cover transform group-hover:scale-110 transition-transform duration-300">
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
                        <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $project->title }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($project->description, 100) }}</p>
                        <a href="{{ route('projects.show', $project) }}" 
                           class="inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-900">
                            View Project
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-16">
            <a href="{{ route('projects.index') }}" 
               class="inline-flex items-center px-8 py-4 rounded-full text-lg font-semibold text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 transform hover:scale-105 transition-all duration-300">
                View All Projects
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</div>

<!-- Testimonials Section -->
<div class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-16 text-center text-gray-900">Testimonials</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($testimonials ?? [] as $testimonial)
                <div class="bg-gradient-to-br from-purple-600 to-indigo-600 p-1 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="bg-white p-8 rounded-2xl h-full">
                        <div class="flex items-center mb-6">
                            @if($testimonial->client_image)
                                <img src="{{ asset('storage/' . $testimonial->client_image) }}" 
                                     alt="{{ $testimonial->client_name }}"
                                     class="w-14 h-14 rounded-full object-cover ring-4 ring-purple-100">
                            @endif
                            <div class="ml-4">
                                <h4 class="font-bold text-gray-900">{{ $testimonial->client_name }}</h4>
                                <p class="text-sm text-gray-600">{{ $testimonial->client_position }}</p>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-6">{{ Str::limit($testimonial->testimonial_text, 150) }}</p>
                        <div class="flex">
                            @for($i = 0; $i < $testimonial->rating; $i++)
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @endfor
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Latest Blog Posts -->
<div class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-16 text-center text-gray-900">Latest News</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($latestPosts ?? [] as $post)
                <div class="group bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                    <div class="p-8">
                        <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold bg-gradient-to-r from-pink-500 to-rose-500 text-white mb-4">
                            {{ $post->created_at->format('F j, Y') }}
                        </span>
                        <h3 class="text-xl font-bold text-gray-900 mb-4 group-hover:text-indigo-600 transition-colors">
                            {{ $post->title }}
                        </h3>
                        <p class="text-gray-600 mb-6">{{ Str::limit($post->content, 120) }}</p>
                        <a href="{{ route('blog.show', $post) }}" 
                           class="inline-flex items-center text-sm font-semibold text-indigo-600 hover:text-indigo-900">
                            Read More
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-16">
            <a href="{{ route('blog.index') }}" 
               class="inline-flex items-center px-8 py-4 rounded-full text-lg font-semibold text-white bg-gradient-to-r from-pink-600 to-rose-600 hover:from-pink-700 hover:to-rose-700 transform hover:scale-105 transition-all duration-300">
                View All Posts
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</div>

<!-- FAQ Section -->
<div class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold mb-16 text-center text-gray-900">FAQs</h2>
        <div class="max-w-3xl mx-auto space-y-6">
            <div x-data="{ open: false }" class="bg-white rounded-2xl shadow-lg overflow-hidden transition-all duration-300">
                <button @click="open = !open" class="w-full px-8 py-6 text-left focus:outline-none">
                    <div class="flex items-center justify-between">
                        <span class="text-lg font-semibold text-gray-900">What services do you offer?</span>
                        <svg class="w-6 h-6 transform transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </button>
                <div x-show="open" class="px-8 pb-6">
                    <p class="text-gray-600">I offer web design, web development, and UI/UX design services. This includes creating responsive websites, developing web applications, and designing user interfaces.</p>
                </div>
            </div>
            
            <div x-data="{ open: false }" class="bg-white rounded-2xl shadow-lg overflow-hidden transition-all duration-300">
                <button @click="open = !open" class="w-full px-8 py-6 text-left focus:outline-none">
                    <div class="flex items-center justify-between">
                        <span class="text-lg font-semibold text-gray-900">How long does a typical project take?</span>
                        <svg class="w-6 h-6 transform transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </button>
                <div x-show="open" class="px-8 pb-6">
                    <p class="text-gray-600">Project timelines vary depending on complexity and scope. A simple website might take 2-4 weeks, while a complex web application could take 2-3 months or more.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact CTA -->
<div class="relative bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-600 py-20">
    <div class="absolute inset-0 bg-pattern opacity-10"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative">
        <h2 class="text-4xl font-bold text-white mb-6">Ready to Start Your Project?</h2>
        <p class="text-xl text-purple-100 mb-12 max-w-2xl mx-auto">Let's work together to bring your ideas to life</p>
        <div class="mt-8">
            <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                Get in Touch
            </a>
        </div>
    </div>
</div>
@endsection 