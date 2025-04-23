<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:project_categories,id',
            'technologies_used' => 'required|array',
            'technologies_used.*' => 'string',
            'project_url' => 'nullable|url',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'is_featured' => 'boolean',
            'status' => 'required|in:ongoing,completed',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
} 