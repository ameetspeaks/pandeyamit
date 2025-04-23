<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\BlogPost;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProjects = Project::featured()->latest()->take(3)->get();
        $latestPosts = BlogPost::published()->latest()->take(3)->get();

        $testimonials = Testimonial::active()
            ->featured()
            ->latest()
            ->take(6)
            ->get();

        return view('public.home', compact('featuredProjects', 'latestPosts', 'testimonials'));
    }

    public function about()
    {
        return view('public.about');
    }
} 