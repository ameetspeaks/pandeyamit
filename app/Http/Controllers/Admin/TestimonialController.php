<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required|max:255',
            'client_position' => 'nullable|max:255',
            'client_company' => 'nullable|max:255',
            'testimonial_text' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'client_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'boolean',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->hasFile('client_image')) {
            $validated['client_image'] = $request->file('client_image')
                ->store('testimonials', 'public');
        }

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'client_name' => 'required|max:255',
            'client_position' => 'nullable|max:255',
            'client_company' => 'nullable|max:255',
            'testimonial_text' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'client_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'boolean',
            'status' => 'required|in:active,inactive',
        ]);

        if ($request->hasFile('client_image')) {
            if ($testimonial->client_image) {
                Storage::disk('public')->delete($testimonial->client_image);
            }
            $validated['client_image'] = $request->file('client_image')
                ->store('testimonials', 'public');
        }

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->client_image) {
            Storage::disk('public')->delete($testimonial->client_image);
        }

        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }
} 