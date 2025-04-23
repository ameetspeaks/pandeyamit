<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectCategoryController extends Controller
{
    public function index()
    {
        $categories = ProjectCategory::latest()->paginate(10);
        return view('admin.project-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.project-categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:project_categories',
            'description' => 'nullable',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        ProjectCategory::create($validated);

        return redirect()->route('admin.project-categories.index')
            ->with('success', 'Project category created successfully.');
    }

    public function edit(ProjectCategory $projectCategory)
    {
        return view('admin.project-categories.edit', compact('projectCategory'));
    }

    public function update(Request $request, ProjectCategory $projectCategory)
    {
        $validated = $request->validate([
            'name' => 'required|max:255|unique:project_categories,name,' . $projectCategory->id,
            'description' => 'nullable',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        $projectCategory->update($validated);

        return redirect()->route('admin.project-categories.index')
            ->with('success', 'Project category updated successfully.');
    }

    public function destroy(ProjectCategory $projectCategory)
    {
        $projectCategory->delete();

        return redirect()->route('admin.project-categories.index')
            ->with('success', 'Project category deleted successfully.');
    }
} 