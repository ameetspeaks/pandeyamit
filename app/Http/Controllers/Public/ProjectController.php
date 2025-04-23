<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = Project::with(['category'])
            ->where('status', 'completed')
            ->latest();

        if ($request->has('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $projects = $query->paginate(9);
        $categories = ProjectCategory::withCount('projects')->get();

        return view('pages.projects.index', compact('projects', 'categories'));
    }

    public function show(Project $project)
    {
        $project->load('category');

        $relatedProjects = Project::where('category_id', $project->category_id)
            ->where('id', '!=', $project->id)
            ->where('status', 'completed')
            ->latest()
            ->take(3)
            ->get();

        $previousProject = Project::where('status', 'completed')
            ->where('id', '<', $project->id)
            ->latest()
            ->first();

        $nextProject = Project::where('status', 'completed')
            ->where('id', '>', $project->id)
            ->oldest()
            ->first();

        return view('pages.projects.show', compact('project', 'previousProject', 'nextProject', 'relatedProjects'));
    }

    public function category(ProjectCategory $category)
    {
        $projects = Project::with(['category', 'images'])
            ->where('category_id', $category->id)
            ->latest()
            ->paginate(12);

        return view('public.projects.category', compact('category', 'projects'));
    }
} 