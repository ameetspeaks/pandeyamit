<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class ProjectCategoryController extends Controller
{
    public function index(): View
    {
        $categories = ProjectCategory::latest()->paginate(15);
        return view('admin.project_categories.index', compact('categories'));
    }

    public function create(): View
    {
        return view('admin.project_categories.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:project_categories',
            'description' => 'nullable|string',
        ]);

        ProjectCategory::create($validated);

        return redirect()->route('admin.project-categories.index')
            ->with('success', 'Project category created successfully.');
    }

    public function show(ProjectCategory $projectCategory): View
    {
        // Typically not needed for admin categories, redirect to edit or index
        return view('admin.project_categories.edit', ['category' => $projectCategory]);
    }

    public function edit(ProjectCategory $projectCategory): View
    {
        return view('admin.project_categories.edit', ['category' => $projectCategory]);
    }

    public function update(Request $request, ProjectCategory $projectCategory): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:project_categories,slug,' . $projectCategory->id,
            'description' => 'nullable|string',
        ]);

        $projectCategory->update($validated);

        return redirect()->route('admin.project-categories.index')
            ->with('success', 'Project category updated successfully.');
    }

    public function destroy(ProjectCategory $projectCategory): RedirectResponse
    {
        // Add check if category is used by projects before deleting?
        $projectCategory->delete();

        return redirect()->route('admin.project-categories.index')
            ->with('success', 'Project category deleted successfully.');
    }
} 