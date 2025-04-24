<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - Admin Dashboard</title>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar" class="bg-dark text-light">
            <div class="sidebar-header">
                <h3>{{ config('app.name') }}</h3>
            </div>

            <ul class="list-unstyled components">
                <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.projects.index') }}">
                        <i class="fas fa-project-diagram"></i> Projects
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.project-categories.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.project-categories.index') }}">
                        <i class="fas fa-tags"></i> Project Categories
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.blog-posts.*') || request()->routeIs('admin.blog-categories.*') || request()->routeIs('admin.blog-tags.*') ? 'active' : '' }}">
                    <a href="#blogSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-blog"></i> Blog
                    </a>
                    <ul class="collapse list-unstyled {{ request()->routeIs('admin.blog-posts.*') || request()->routeIs('admin.blog-categories.*') || request()->routeIs('admin.blog-tags.*') ? 'show' : '' }}" id="blogSubmenu">
                        <li class="{{ request()->routeIs('admin.blog-posts.index') ? 'active' : '' }}">
                            <a href="{{ route('admin.blog-posts.index') }}">Posts</a>
                        </li>
                        <li class="{{ request()->routeIs('admin.blog-categories.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.blog-categories.index') }}">Categories</a>
                        </li>
                        <li class="{{ request()->routeIs('admin.blog-tags.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.blog-tags.index') }}">Tags</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.testimonials.index') }}">
                        <i class="fas fa-quote-right"></i> Testimonials
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.newsletter-subscribers.*') ? 'active' : '' }}">
                    <a href="{{ route('admin.newsletter-subscribers.index') }}">
                        <i class="fas fa-envelope"></i> Newsletter
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content">
            <!-- Top Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-dark">
                        <i class="fas fa-bars"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="py-4">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/admin/projects.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    @stack('scripts')
</body>
</html> 