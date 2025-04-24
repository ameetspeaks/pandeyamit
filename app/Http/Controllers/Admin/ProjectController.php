<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::with('category')
                           ->withCount('images')
                           ->latest()
                           ->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create(): View
    {
        $categories = ProjectCategory::orderBy('name')->pluck('name', 'id');
        return view('admin.projects.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:project_categories,id',
            'description' => 'required|string',
            'technologies_used' => 'nullable|string',
            'project_url' => 'nullable|url',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:ongoing,completed',
            'is_featured' => 'boolean',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'featured_image_index' => 'nullable|integer',
        ]);

        // Convert checkbox value
        $validated['is_featured'] = $request->has('is_featured');
        
        // Convert technologies string to array
        $validated['technologies_used'] = $request->technologies_used ? explode(',', $request->technologies_used) : [];

        $project = Project::create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $imageFile) {
                // Get original file extension
                $extension = $imageFile->getClientOriginalExtension();
                
                // Generate a unique filename with the original extension
                $filename = Str::uuid() . '.' . $extension;
                
                // Store the file with the custom filename
                $path = $imageFile->storeAs('projects', $filename, 'public');
                
                // Verify the file was stored successfully
                if (!Storage::disk('public')->exists($path)) {
                    continue; // Skip if file wasn't stored properly
                }
                
                $project->images()->create([
                    'image_path' => $path,
                    'is_featured' => ($index == $request->input('featured_image_index', -1)),
                    'display_order' => $index + 1,
                ]);
            }
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function show(Project $project): View
    {
        // Typically redirect to edit for admin
        return $this->edit($project);
    }

    public function edit(Project $project): View
    {
        $categories = ProjectCategory::orderBy('name')->pluck('name', 'id');
        $project->load('images'); // Ensure images are loaded
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:project_categories,id',
            'description' => 'required|string',
            'technologies_used' => 'nullable|string',
            'project_url' => 'nullable|url',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:ongoing,completed',
            'is_featured' => 'boolean',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'featured_image_id' => 'nullable|exists:project_images,id,project_id,' . $project->id,
        ]);

        // Convert checkbox value
        $validated['is_featured'] = $request->has('is_featured');

        // Convert technologies string to array
        $validated['technologies_used'] = $request->technologies_used ? explode(',', $request->technologies_used) : [];

        $project->update($validated);

        // Handle new image uploads
        if ($request->hasFile('images')) {
            $nextOrder = ($project->images()->max('display_order') ?? 0) + 1;
            foreach ($request->file('images') as $index => $imageFile) {
                // Get original file extension
                $extension = $imageFile->getClientOriginalExtension();
                
                // Generate a unique filename with the original extension
                $filename = Str::uuid() . '.' . $extension;
                
                // Store the file with the custom filename
                $path = $imageFile->storeAs('projects', $filename, 'public');
                
                // Verify the file was stored successfully
                if (!Storage::disk('public')->exists($path)) {
                    continue; // Skip if file wasn't stored properly
                }
                
                $project->images()->create([
                    'image_path' => $path,
                    'is_featured' => false,
                    'display_order' => $nextOrder + $index,
                ]);
            }
        }

        // Handle setting featured image
        if ($request->filled('featured_image_id')) {
            $project->images()->update(['is_featured' => false]); // Unset others
            ProjectImage::where('id', $request->featured_image_id)
                      ->where('project_id', $project->id)
                      ->update(['is_featured' => true]);
        }

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project): RedirectResponse
    {
        // Delete associated images from storage
        foreach ($project->images as $image) {
            $this->deleteImageFile($image->image_path);
        }
        
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully.');
    }

    private function deleteImageFile(?string $imagePath): void
    {
        if ($imagePath && Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
    }

    public function deleteImage(Request $request): RedirectResponse
    {
        $request->validate([
            'image_id' => 'required|exists:project_images,id'
        ]);
        
        $image = ProjectImage::findOrFail($request->image_id);
        
        // Delete the image file
        $this->deleteImageFile($image->image_path);
        
        // Delete the database record
        $image->delete();

        return back()->with('success', 'Image deleted successfully.');
    }
} 