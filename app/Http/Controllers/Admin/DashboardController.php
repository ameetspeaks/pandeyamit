<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\BlogPost;
use App\Models\Testimonial;
use App\Models\NewsletterSubscriber;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'projectCount' => Project::count(),
            'blogPostCount' => BlogPost::count(),
            'testimonialCount' => Testimonial::count(),
            'subscriberCount' => NewsletterSubscriber::count(),
            'recentProjects' => Project::latest()->take(5)->get(),
            'recentPosts' => BlogPost::latest()->take(5)->get(),
        ]);
    }
} 