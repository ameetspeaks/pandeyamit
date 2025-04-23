@extends('layouts.app')

@section('title', 'About Me')

<x-slot name="header">
    <h1 class="text-3xl font-bold text-gray-900">
        About Me
    </h1>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Personal Info Section -->
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:p-12">
                <div class="md:flex">
                    <div class="md:flex-shrink-0">
                        <img class="h-48 w-48 rounded-full object-cover" src="{{ asset('images/profile.jpg') }}" alt="Profile picture">
                    </div>
                    <div class="mt-4 md:mt-0 md:ml-6">
                        <h2 class="text-2xl font-bold text-gray-900">Amit Pandey</h2>
                        <p class="mt-2 text-xl text-gray-600">Full Stack Developer & Web Designer</p>
                        <div class="mt-4 text-gray-600">
                            <p class="mb-4">
                                I am a passionate full-stack developer with expertise in modern web technologies.
                                With a strong foundation in both frontend and backend development, I create
                                scalable and user-friendly applications that solve real-world problems.
                            </p>
                            <p>
                                My journey in web development started several years ago, and since then,
                                I've worked on various projects ranging from small business websites to
                                complex enterprise applications.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Skills Section -->
        <div class="mt-8 bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Skills & Expertise</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Frontend -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Frontend</h3>
                        <ul class="space-y-2">
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                HTML5, CSS3, JavaScript
                            </li>
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                React.js, Vue.js
                            </li>
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Tailwind CSS, Bootstrap
                            </li>
                        </ul>
                    </div>

                    <!-- Backend -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Backend</h3>
                        <ul class="space-y-2">
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                PHP, Laravel
                            </li>
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Node.js, Express
                            </li>
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                MySQL, MongoDB
                            </li>
                        </ul>
                    </div>

                    <!-- Tools & Others -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-3">Tools & Others</h3>
                        <ul class="space-y-2">
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Git, GitHub
                            </li>
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Docker, AWS
                            </li>
                            <li class="flex items-center">
                                <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                Agile, Scrum
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 