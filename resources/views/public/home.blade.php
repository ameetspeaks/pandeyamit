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
                    <span class="block text-5xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-yellow-400 to-orange-500">8</span>
                    <span class="text-sm mt-2 block text-purple-100">Years Experience</span>
                </div>
                <div class="text-center">
                    <span class="block text-5xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-green-400 to-cyan-500">80+</span>
                    <span class="text-sm mt-2 block text-purple-100">Projects Completed</span>
                </div>
                <div class="text-center">
                    <span class="block text-5xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-pink-400 to-red-500">160+</span>
                    <span class="text-sm mt-2 block text-purple-100">Happy Clients</span>
                </div>
                <div class="text-center">
                    <span class="block text-5xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-purple-400 to-indigo-500">500+</span>
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

            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                <div class="h-2 bg-gradient-to-r from-blue-500 to-cyan-500"></div>
                <div class="p-8">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900">Mobile App</h3>
                    <p class="text-gray-600">Developing native and cross-platform mobile applications for iOS and Android</p>
                </div>
            </div>

            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                <div class="h-2 bg-gradient-to-r from-yellow-500 to-orange-500"></div>
                <div class="p-8">
                    <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900">AI Automation</h3>
                    <p class="text-gray-600">Implementing intelligent automation solutions using cutting-edge AI technologies</p>
                </div>
            </div>

            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                <div class="h-2 bg-gradient-to-r from-rose-500 to-pink-500"></div>
                <div class="p-8">
                    <div class="w-16 h-16 bg-gradient-to-br from-rose-500 to-pink-500 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900">MVP in 2 Weeks</h3>
                    <p class="text-gray-600">Rapid development of Minimum Viable Products to validate your business idea quickly</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Education & Experience Section -->
<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Education -->
            <div>
                <h2 class="text-3xl font-bold mb-8 text-gray-900 flex items-center">
                    <span class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M12 14l9-5-9-5-9 5 9 5z"/>
                            <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                        </svg>
                    </span>
                    Education
                </h2>
                <div class="space-y-6">
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold bg-gradient-to-r from-blue-500 to-cyan-500 text-white mb-4">2021 - 2022</span>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Certification in Data Science</h3>
                        <p class="text-gray-600">Accredian (Formerly INSAID)</p>
                    </div>
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold bg-gradient-to-r from-blue-500 to-cyan-500 text-white mb-4">2012 - 2016</span>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Bachelor of Engineering</h3>
                        <p class="text-gray-600">Tulas Institute</p>
                    </div>
                </div>
            </div>
            
            <!-- Experience -->
            <div x-data="{ showMore: false }">
                <h2 class="text-3xl font-bold mb-8 text-gray-900 flex items-center">
                    <span class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </span>
                    Experience
                </h2>
                <div class="space-y-6">
                    <!-- Always visible cards -->
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold bg-gradient-to-r from-purple-500 to-pink-500 text-white mb-4">Jan 2025 - Present</span>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Freelance Developer</h3>
                        <p class="text-gray-600">Independent Contractor</p>
                    </div>

                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold bg-gradient-to-r from-purple-500 to-pink-500 text-white mb-4">Mar 2021 - Dec 2024</span>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Project Manager</h3>
                        <p class="text-gray-600">ARJH tech Labs</p>
                    </div>

                    <!-- See More Button -->
                    <div class="text-right">
                        <button @click="showMore = !showMore" 
                                class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-full text-white bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transform transition-all duration-300 hover:scale-105">
                            <span x-text="showMore ? 'Show Less' : 'See More'"></span>
                            <svg class="w-4 h-4 ml-1.5 transition-transform duration-300" 
                                 :class="{ 'rotate-180': showMore }"
                                 fill="none" 
                                 stroke="currentColor" 
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>

                    <!-- Collapsible content -->
                    <div x-show="showMore" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform -translate-y-4"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-4"
                         class="space-y-6">
                        <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                            <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold bg-gradient-to-r from-purple-500 to-pink-500 text-white mb-4">Oct 2020 - Feb 2021</span>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Digital Marketing Manager</h3>
                            <p class="text-gray-600">PrepOnline.in</p>
                        </div>

                        <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                            <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold bg-gradient-to-r from-purple-500 to-pink-500 text-white mb-4">Oct 2018 - Sep 2019</span>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Digital Marketing Executive</h3>
                            <p class="text-gray-600">Technix Infotech LLP</p>
                        </div>

                        <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                            <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold bg-gradient-to-r from-purple-500 to-pink-500 text-white mb-4">Mar 2015 - May 2018</span>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Start-up Co-founder</h3>
                            <p class="text-gray-600">Inklovers Publishing House</p>
                        </div>

                        <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                            <span class="inline-block px-4 py-2 rounded-full text-sm font-semibold bg-gradient-to-r from-purple-500 to-pink-500 text-white mb-4">Oct 2014 - Jan 2016</span>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Content Writer</h3>
                            <p class="text-gray-600">Techmagnate (Freelance)</p>
                        </div>
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
        <!-- Slider main container -->
        <div class="relative testimonials-container">
            <div class="swiper testimonials-slider !overflow-visible">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach(($testimonials ?? [])->sortByDesc('is_featured') as $testimonial)
                        <div class="swiper-slide !h-auto">
                            <div class="bg-gradient-to-br from-purple-600 to-indigo-600 p-1 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300">
                                <div class="bg-white p-8 rounded-2xl h-full">
                                    <div class="flex items-center mb-6">
                                        @if($testimonial->client_image)
                                            <img src="{{ $testimonial->client_image }}" 
                                                 alt="{{ $testimonial->client_name }}"
                                                 class="w-14 h-14 rounded-full object-cover ring-4 ring-purple-100">
                                        @else
                                            <div class="w-14 h-14 rounded-full bg-gradient-to-br from-purple-600 to-indigo-600 flex items-center justify-center text-white text-xl font-bold ring-4 ring-purple-100">
                                                {{ substr($testimonial->client_name, 0, 1) }}
                                            </div>
                                        @endif
                                        <div class="ml-4">
                                            <h4 class="font-bold text-gray-900">{{ $testimonial->client_name }}</h4>
                                            <p class="text-sm text-gray-600">{{ $testimonial->client_position }}</p>
                                        </div>
                                        @if($testimonial->is_featured)
                                            <div class="ml-auto">
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gradient-to-r from-amber-500 to-yellow-500 text-white">
                                                    Featured
                                                </span>
                                            </div>
                                        @endif
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
                        </div>
                    @endforeach
                </div>
                <!-- Add Pagination -->
                <div class="swiper-pagination !-bottom-10"></div>
            </div>
            <!-- Navigation buttons -->
            <div class="swiper-button-prev !-left-4 md:!-left-6 !w-12 !h-12 !text-gray-800"></div>
            <div class="swiper-button-next !-right-4 md:!-right-6 !w-12 !h-12 !text-gray-800"></div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .testimonials-container {
        padding: 0 20px;
        margin: 0 auto;
        position: relative;
        overflow: hidden;
    }
    .testimonials-slider {
        padding: 20px 10px 50px !important;
    }
    .swiper-button-next:after,
    .swiper-button-prev:after {
        font-size: 20px !important;
        font-weight: bold;
    }
    .swiper-button-next,
    .swiper-button-prev {
        background: white;
        border-radius: 50%;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    .swiper-button-next:hover,
    .swiper-button-prev:hover {
        background: #f3f4f6;
    }
    .swiper-pagination-bullet {
        width: 10px;
        height: 10px;
        background: #e5e7eb;
        opacity: 1;
    }
    .swiper-pagination-bullet-active {
        background: #6366f1 !important;
    }
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    new Swiper('.testimonials-slider', {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        },
        grabCursor: true,
        speed: 800,
    });
});
</script>
@endpush

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