@props(['project' => null, 'categories'])

<form action="{{ $project ? route('admin.projects.update', $project) : route('admin.projects.store') }}"
      method="POST"
      enctype="multipart/form-data"
      class="space-y-6">
    @csrf
    @if($project)
        @method('PUT')
    @endif

    <div class="row">
        <div class="col-md-8">
            {{-- Title --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $project->title ?? '') }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Description --}}
            <div class="mb-3">
                <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="10" required>{{ old('description', $project->description ?? '') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Technologies Used --}}
            <div class="mb-3">
                <label for="technologies_used" class="form-label">Technologies Used (comma-separated)</label>
                <input type="text" class="form-control @error('technologies_used') is-invalid @enderror" id="technologies_used" name="technologies_used" value="{{ old('technologies_used', is_array($project->technologies_used ?? null) ? implode(',', $project->technologies_used) : ($project->technologies_used ?? '')) }}">
                 @error('technologies_used')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="form-text text-muted">e.g., Laravel, Vue.js, MySQL, Docker</small>
            </div>

            {{-- Project Images Upload --}}
            <div class="mb-3">
                <label for="images" class="form-label">Add Project Images</label>
                <div class="custom-file-upload">
                    <input type="file" class="form-control @error('images.*') is-invalid @enderror @error('images') is-invalid @enderror" 
                           id="images" name="images[]" multiple accept="image/*"
                           onchange="handleImagePreview(this)">
                    <div id="image-preview-container" class="mt-3 row g-2">
                        {{-- Preview images will be inserted here --}}
                    </div>
                </div>
                @error('images.*')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                @error('images')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                <small class="form-text text-muted">You can select multiple images. Supported formats: JPEG, PNG, JPG, GIF, SVG, WEBP. Max size: 2MB per image.</small>
            </div>

            {{-- Existing Images --}}
            @if(isset($project) && $project->images && $project->images->isNotEmpty())
                <div class="mb-3">
                    <label class="form-label">Existing Images</label>
                    <div class="row g-3" id="existing-images-container">
                        @foreach($project->images as $image)
                            <div class="col-md-4 existing-image-container">
                                <div class="card h-100">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" 
                                         alt="Project Image" 
                                         class="card-img-top"
                                         style="height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" 
                                                   type="radio" 
                                                   name="featured_image_id" 
                                                   id="featured_image_{{ $image->id }}" 
                                                   value="{{ $image->id }}" 
                                                   {{ $image->is_featured ? 'checked' : '' }}>
                                            <label class="form-check-label" for="featured_image_{{ $image->id }}">
                                                Set as Featured
                                            </label>
                                        </div>
                                        <button type="button" 
                                                class="btn btn-danger btn-sm w-100 delete-image-btn" 
                                                data-image-id="{{ $image->id }}" 
                                                data-delete-url="{{ route('admin.projects.delete-image') }}">
                                            <i class="fas fa-trash-alt me-1"></i> Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if(!$project)
                <div class="mb-3">
                    <label for="featured_image_index" class="form-label">Featured Image</label>
                    <select class="form-select" id="featured_image_index" name="featured_image_index">
                        <option value="-1">None</option>
                        {{-- Options will be populated by JS --}}
                    </select>
                    <small class="form-text text-muted">Select which uploaded image should be the featured image.</small>
                </div>
            @endif
        </div>

        <div class="col-md-4">
            {{-- Category --}}
            <div class="mb-3">
                <label for="category_id" class="form-label">Category <span class="text-danger">*</span></label>
                <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $id => $name)
                        <option value="{{ $id }}" {{ old('category_id', $project->category_id ?? '') == $id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Status --}}
            <div class="mb-3">
                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                    <option value="ongoing" {{ old('status', $project->status ?? 'ongoing') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                    <option value="completed" {{ old('status', $project->status ?? 'ongoing') == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
                 @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Project URL --}}
            <div class="mb-3">
                <label for="project_url" class="form-label">Project URL</label>
                <input type="url" class="form-control @error('project_url') is-invalid @enderror" id="project_url" name="project_url" value="{{ old('project_url', $project->project_url ?? '') }}">
                 @error('project_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Start Date --}}
            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date', isset($project->start_date) ? $project->start_date->format('Y-m-d') : '') }}">
                @error('start_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- End Date --}}
            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date', isset($project->end_date) ? $project->end_date->format('Y-m-d') : '') }}">
                 @error('end_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Is Featured --}}
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="1" id="is_featured" name="is_featured" {{ old('is_featured', $project->is_featured ?? false) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_featured">
                    Featured Project
                </label>
            </div>
        </div>
    </div>

    <hr>

    <div class="pt-5">
        <div class="flex justify-end">
            <a href="{{ route('admin.projects.index') }}"
               class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Cancel
            </a>
            <button type="submit"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ $project ? 'Update Project' : 'Create Project' }}
            </button>
        </div>
    </div>
</form>

@push('styles')
<style>
.custom-file-upload {
    position: relative;
}

.preview-image-container {
    position: relative;
    margin-bottom: 1rem;
}

.preview-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 0.375rem;
}

.preview-remove-btn {
    position: absolute;
    top: 0.5rem;
    right: 0.5rem;
    background-color: rgba(255, 255, 255, 0.9);
    border: none;
    border-radius: 50%;
    width: 2rem;
    height: 2rem;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s;
}

.preview-remove-btn:hover {
    background-color: #dc3545;
    color: white;
}

.featured-badge {
    position: absolute;
    top: 0.5rem;
    left: 0.5rem;
    background-color: rgba(0, 123, 255, 0.9);
    color: white;
    padding: 0.25rem 0.5rem;
    border-radius: 0.25rem;
    font-size: 0.875rem;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Handle deleting existing images via AJAX
    document.querySelectorAll('.delete-image-btn').forEach(button => {
        button.addEventListener('click', function () {
            if (!confirm('Are you sure you want to delete this image?')) {
                return;
            }

            const imageId = this.dataset.imageId;
            const deleteUrl = this.dataset.deleteUrl;
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const container = this.closest('.existing-image-container');

            fetch(deleteUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ image_id: imageId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    container.remove();
                    // Check if there are any remaining featured images
                    const featuredImages = document.querySelectorAll('input[name="featured_image_id"]:checked');
                    if (featuredImages.length === 0) {
                        // Select the first available image as featured if exists
                        const firstImage = document.querySelector('input[name="featured_image_id"]');
                        if (firstImage) {
                            firstImage.checked = true;
                        }
                    }
                } else {
                    alert('Failed to delete image.');
                }
            })
            .catch(error => {
                console.error('Error deleting image:', error);
                alert('An error occurred while deleting the image.');
            });
        });
    });
});

function handleImagePreview(input) {
    const previewContainer = document.getElementById('image-preview-container');
    const featuredImageSelect = document.getElementById('featured_image_index');
    
    // Clear existing previews
    previewContainer.innerHTML = '';
    
    // Reset featured image select
    if (featuredImageSelect) {
        while (featuredImageSelect.options.length > 1) {
            featuredImageSelect.remove(1);
        }
    }

    if (input.files) {
        Array.from(input.files).forEach((file, index) => {
            // Create preview container
            const col = document.createElement('div');
            col.className = 'col-md-4';
            
            // Create card
            const card = document.createElement('div');
            card.className = 'card h-100 preview-image-container';
            
            // Create preview image
            const img = document.createElement('img');
            img.className = 'card-img-top preview-image';
            img.file = file;
            
            // Create remove button
            const removeBtn = document.createElement('button');
            removeBtn.className = 'preview-remove-btn';
            removeBtn.innerHTML = '<i class="fas fa-times"></i>';
            removeBtn.onclick = function() {
                col.remove();
                updateFeaturedImageOptions();
            };
            
            // Add to DOM
            card.appendChild(img);
            card.appendChild(removeBtn);
            col.appendChild(card);
            previewContainer.appendChild(col);
            
            // Create file reader to display preview
            const reader = new FileReader();
            reader.onload = (function(aImg) { 
                return function(e) { 
                    aImg.src = e.target.result; 
                }; 
            })(img);
            reader.readAsDataURL(file);
            
            // Add to featured image select if exists
            if (featuredImageSelect) {
                const option = document.createElement('option');
                option.value = index;
                option.textContent = `Image ${index + 1}: ${file.name}`;
                featuredImageSelect.appendChild(option);
            }
        });
    }
}

function updateFeaturedImageOptions() {
    const featuredImageSelect = document.getElementById('featured_image_index');
    if (!featuredImageSelect) return;
    
    // Clear existing options except "None"
    while (featuredImageSelect.options.length > 1) {
        featuredImageSelect.remove(1);
    }
    
    // Get all preview images
    const previews = document.querySelectorAll('.preview-image-container img');
    previews.forEach((img, index) => {
        const option = document.createElement('option');
        option.value = index;
        option.textContent = `Image ${index + 1}: ${img.file.name}`;
        featuredImageSelect.appendChild(option);
    });
}
</script>
@endpush 