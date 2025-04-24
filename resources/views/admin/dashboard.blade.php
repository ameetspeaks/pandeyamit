@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Dashboard</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Projects Stats -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $projectCount }}</h3>
                                    <p>Total Projects</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-project-diagram"></i>
                                </div>
                                <a href="{{ route('admin.projects.index') }}" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Blog Posts Stats -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $blogPostCount }}</h3>
                                    <p>Blog Posts</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-blog"></i>
                                </div>
                                <a href="{{ route('admin.blog-posts.index') }}" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Testimonials Stats -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $testimonialCount }}</h3>
                                    <p>Testimonials</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-quote-right"></i>
                                </div>
                                <a href="{{ route('admin.testimonials.index') }}" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Newsletter Subscribers Stats -->
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $subscriberCount }}</h3>
                                    <p>Newsletter Subscribers</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <a href="{{ route('admin.newsletter-subscribers.index') }}" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity Section -->
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Recent Projects</h3>
                                </div>
                                <div class="card-body">
                                    @foreach($recentProjects as $project)
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <span>{{ $project->title }}</span>
                                            <span class="badge bg-info">{{ $project->created_at->diffForHumans() }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Recent Blog Posts</h3>
                                </div>
                                <div class="card-body">
                                    @foreach($recentPosts as $post)
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <span>{{ $post->title }}</span>
                                            <span class="badge bg-success">{{ $post->created_at->diffForHumans() }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 