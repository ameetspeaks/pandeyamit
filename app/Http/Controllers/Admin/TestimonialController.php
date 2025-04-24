<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::latest()->paginate(15);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create(): View
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_position' => 'nullable|string|max:255',
            'client_company' => 'nullable|string|max:255',
            'testimonial_text' => 'required|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'client_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'status' => 'required|in:active,inactive',
            'is_featured' => 'boolean',
        ]);

        // Convert checkbox value
        $validated['is_featured'] = $request->has('is_featured');

        // Handle image upload
        if ($request->hasFile('client_image')) {
            $path = $request->file('client_image')->store('public/testimonials');
            $validated['client_image'] = Storage::url($path);
        }

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    public function show(Testimonial $testimonial): View
    {
         // Typically redirect to edit for admin
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function edit(Testimonial $testimonial): View
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial): RedirectResponse
    {
         $validated = $request->validate([
            'client_name' => 'required|string|max:255',
            'client_position' => 'nullable|string|max:255',
            'client_company' => 'nullable|string|max:255',
            'testimonial_text' => 'required|string',
            'rating' => 'nullable|integer|min:1|max:5',
            'client_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'status' => 'required|in:active,inactive',
            'is_featured' => 'boolean',
        ]);

        // Convert checkbox value
        $validated['is_featured'] = $request->has('is_featured');

        // Handle image upload
        if ($request->hasFile('client_image')) {
             // Delete old image if it exists
            if ($testimonial->client_image) {
                 $this->deleteImageFile($testimonial->client_image);
            }
            $path = $request->file('client_image')->store('public/testimonials');
            $validated['client_image'] = Storage::url($path);
        }

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        // Delete image file if it exists
        if ($testimonial->client_image) {
            $this->deleteImageFile($testimonial->client_image);
        }
        
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }
    
    private function deleteImageFile(?string $imageUrl): void
    {
        if ($imageUrl) {
            $path = Str::replaceFirst('/storage', 'public', $imageUrl);
            if (Storage::exists($path)) {
                Storage::delete($path);
            }
        }
    }
} 