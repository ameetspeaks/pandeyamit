<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Http\Requests\ProjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('category')->latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = ProjectCategory::all();
        return view('admin.projects.create', compact('categories'));
    }

    public function store(ProjectRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        $data['technologies_used'] = explode(',', $request->technologies_used);

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('projects', 'public');
        }

        $project = Project::create($data);

        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('projects', 'public');
            }
            $project->images = $images;
            $project->save();
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        $categories = ProjectCategory::all();
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function update(ProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);
        $data['technologies_used'] = explode(',', $request->technologies_used);

        if ($request->hasFile('featured_image')) {
            if ($project->featured_image) {
                Storage::disk('public')->delete($project->featured_image);
            }
            $data['featured_image'] = $request->file('featured_image')->store('projects', 'public');
        }

        if ($request->hasFile('images')) {
            $images = $project->images ?? [];
            foreach ($request->file('images') as $image) {
                $images[] = $image->store('projects', 'public');
            }
            $data['images'] = $images;
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        if ($project->featured_image) {
            Storage::disk('public')->delete($project->featured_image);
        }

        if ($project->images) {
            foreach ($project->images as $image) {
                Storage::disk('public')->delete($image);
            }
        }

        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }

    public function deleteImage(Request $request)
    {
        $project = Project::findOrFail($request->project_id);
        $images = $project->images;

        if (($key = array_search($request->image, $images)) !== false) {
            Storage::disk('public')->delete($request->image);
            unset($images[$key]);
            $project->images = array_values($images);
            $project->save();
        }

        return response()->json(['success' => true]);
    }
} 