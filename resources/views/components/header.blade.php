<!-- Header -->
<header class="fixed w-full top-0 z-50 bg-white/80 backdrop-blur-lg border-b border-gray-200">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('home') }}" class="flex items-center">
                    <span class="text-2xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">
                        Amit Pandey
                    </span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex md:items-center md:space-x-6">
                <a href="{{ route('home') }}" 
                   class="text-gray-600 hover:text-indigo-600 px-3 py-2 text-sm font-medium transition-colors {{ request()->routeIs('home') ? 'text-indigo-600' : '' }}">
                    Home
                </a>
                <a href="{{ route('projects.index') }}" 
                   class="text-gray-600 hover:text-indigo-600 px-3 py-2 text-sm font-medium transition-colors {{ request()->routeIs('projects.*') ? 'text-indigo-600' : '' }}">
                    Projects
                </a>
                <a href="{{ route('blog.index') }}" 
                   class="text-gray-600 hover:text-indigo-600 px-3 py-2 text-sm font-medium transition-colors {{ request()->routeIs('blog.*') ? 'text-indigo-600' : '' }}">
                    Blog
                </a>
                <a href="{{ route('contact') }}" 
                   class="text-gray-600 hover:text-indigo-600 px-3 py-2 text-sm font-medium transition-colors {{ request()->routeIs('contact') ? 'text-indigo-600' : '' }}">
                    Contact
                </a>

                <!-- WhatsApp Link -->
                <a href="https://wa.me/+919876543210" target="_blank" rel="noopener noreferrer"
                   class="inline-flex items-center justify-center px-4 py-2 rounded-full text-sm font-medium text-white bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 transition-all transform hover:scale-105">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    Chat on WhatsApp
                </a>

                <!-- Download CV Button -->
                <a href="#" 
                   class="inline-flex items-center justify-center px-4 py-2 rounded-full text-sm font-medium text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 transition-all transform hover:scale-105">
                    Download CV
                </a>

                <!-- Admin Dropdown -->
                @auth
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center text-gray-600 hover:text-indigo-600 px-3 py-2 text-sm font-medium transition-colors">
                            <span>Admin</span>
                            <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" 
                             @click.away="open = false"
                             class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5"
                             x-cloak>
                            <div class="py-1">
                                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                                <a href="{{ route('admin.projects.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Projects</a>
                                <a href="{{ route('admin.blog.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Blog Posts</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button type="button" 
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-600 hover:text-indigo-600 hover:bg-gray-100 transition-colors"
                        @click="mobileMenuOpen = !mobileMenuOpen"
                        aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Navigation -->
    <div class="md:hidden" x-show="mobileMenuOpen" x-cloak>
        <div class="px-2 pt-2 pb-3 space-y-1 bg-white border-b border-gray-200">
            <a href="{{ route('home') }}" 
               class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-indigo-600 hover:bg-gray-100 transition-colors {{ request()->routeIs('home') ? 'text-indigo-600 bg-gray-50' : '' }}">
                Home
            </a>
            <a href="{{ route('projects.index') }}" 
               class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-indigo-600 hover:bg-gray-100 transition-colors {{ request()->routeIs('projects.*') ? 'text-indigo-600 bg-gray-50' : '' }}">
                Projects
            </a>
            <a href="{{ route('blog.index') }}" 
               class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-indigo-600 hover:bg-gray-100 transition-colors {{ request()->routeIs('blog.*') ? 'text-indigo-600 bg-gray-50' : '' }}">
                Blog
            </a>
            <a href="{{ route('contact') }}" 
               class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-indigo-600 hover:bg-gray-100 transition-colors {{ request()->routeIs('contact') ? 'text-indigo-600 bg-gray-50' : '' }}">
                Contact
            </a>

            <!-- Mobile WhatsApp Link -->
            <div class="px-3 py-2">
                <a href="https://wa.me/+919876543210" target="_blank" rel="noopener noreferrer"
                   class="block text-center px-4 py-2 rounded-full text-sm font-medium text-white bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 transition-all">
                    Chat on WhatsApp
                </a>
            </div>

            <!-- Mobile Download CV Button -->
            <div class="px-3 py-2">
                <a href="#" 
                   class="block text-center px-4 py-2 rounded-full text-sm font-medium text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 transition-all">
                    Download CV
                </a>
            </div>

            <!-- Mobile Admin Menu -->
            @auth
                <div class="px-3 py-2 space-y-1">
                    <div class="text-sm font-medium text-gray-500 px-3">Admin Menu</div>
                    <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-indigo-600 hover:bg-gray-100">Dashboard</a>
                    <a href="{{ route('admin.projects.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-indigo-600 hover:bg-gray-100">Projects</a>
                    <a href="{{ route('admin.blog.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-indigo-600 hover:bg-gray-100">Blog Posts</a>
                    <form method="POST" action="{{ route('logout') }}" class="block">
                        @csrf
                        <button type="submit" class="w-full text-left px-3 py-2 rounded-md text-base font-medium text-gray-600 hover:text-indigo-600 hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                </div>
            @endauth
        </div>
    </div>
</header>

<!-- Spacer for fixed header -->
<div class="h-16"></div> 