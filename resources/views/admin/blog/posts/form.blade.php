@csrf

<div class="row">
    {{-- Main Content Area --}}
    <div class="col-md-8">
        {{-- Title --}}
        <div class="mb-3">
            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title ?? '') }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Slug --}}
        <div class="mb-3">
            <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $post->slug ?? '') }}" required>
            @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Content (Rich Text Editor Recommended) --}}
        <div class="mb-3">
            <label for="content" class="form-label">Content <span class="text-danger">*</span></label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="15" required>{{ old('content', $post->content ?? '') }}</textarea>
             @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <small class="form-text text-muted">Use a rich text editor for better formatting (e.g., TinyMCE).</small>
        </div>

         {{-- Meta Description --}}
        <div class="mb-3">
            <label for="meta_description" class="form-label">Meta Description (SEO)</label>
            <textarea class="form-control @error('meta_description') is-invalid @enderror" id="meta_description" name="meta_description" rows="3" maxlength="160">{{ old('meta_description', $post->meta_description ?? '') }}</textarea>
             @error('meta_description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <small class="form-text text-muted">Max 160 characters. Used for search engine results.</small>
        </div>

         {{-- Images Upload --}}
        <div class="mb-3">
            <label for="images" class="form-label">Add Images</label>
            <input type="file" class="form-control @error('images.*') is-invalid @enderror @error('images') is-invalid @enderror" id="images" name="images[]" multiple accept="image/*">
             @error('images.*') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
             @error('images') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
             <small class="form-text text-muted">You can select multiple images.</small>
        </div>

        {{-- Existing Images --}}
        @if(isset($post) && $post->images && $post->images->isNotEmpty())
            <div class="mb-3">
                <label class="form-label">Existing Images</label>
                <div class="row">
                    @foreach($post->images()->orderBy('display_order')->get() as $image)
                        <div class="col-md-3 mb-3 text-center existing-image-container">
                            <img src="{{ $image->image_url }}" alt="Post Image" class="img-thumbnail mb-2" style="max-height: 100px;">
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="featured_image_id" id="featured_image_{{ $image->id }}" value="{{ $image->id }}" {{ $image->is_featured ? 'checked' : '' }}>
                                    <label class="form-check-label" for="featured_image_{{ $image->id }}">Featured</label>
                                </div>
                                <button type="button" class="btn btn-danger btn-sm delete-image-btn" data-image-id="{{ $image->id }}" data-delete-url="{{ route('admin.blog.delete-image') }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Featured Image for New Posts --}}
        @if(!isset($post) || !$post->images || $post->images->isEmpty())
           <div class="mb-3">
                <label for="featured_image_index" class="form-label">Featured Image (Select from uploaded)</label>
                <select class="form-select" id="featured_image_index" name="featured_image_index">
                    <option value="-1">None</option>
                    {{-- Options will be populated by JS --}}
                </select>
                <small class="form-text text-muted">Select which uploaded image should be the main featured image.</small>
           </div>
        @endif

    </div>

    {{-- Sidebar Area --}}
    <div class="col-md-4">
         {{-- Status --}}
        <div class="mb-3">
            <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
            <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                <option value="draft" {{ old('status', $post->status ?? 'draft') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="published" {{ old('status', $post->status ?? 'draft') == 'published' ? 'selected' : '' }}>Published</option>
            </select>
             @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Categories (Multi-select) --}}
        <div class="mb-3">
            <label for="category_ids" class="form-label">Categories</label>
            <select class="form-select @error('category_ids') is-invalid @enderror" id="category_ids" name="category_ids[]" multiple size="5"> 
                {{-- Add 'size' attribute for better multi-select UI without JS --}}
                {{-- Consider using Select2/TomSelect for better UX --}}
                 @foreach($categories as $id => $name)
                    <option value="{{ $id }}" {{ in_array($id, old('category_ids', isset($post) ? $post->categories->pluck('id')->toArray() : [])) ? 'selected' : '' }}>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
             @error('category_ids')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @error('category_ids.*')
                 <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tags (Multi-select or Tag Input) --}}
        <div class="mb-3">
            <label for="tag_ids" class="form-label">Tags</label>
            <select class="form-select @error('tag_ids') is-invalid @enderror" id="tag_ids" name="tag_ids[]" multiple size="5">
                 {{-- Consider using Select2/TomSelect with tagging enabled --}}
                 @foreach($tags as $id => $name)
                    <option value="{{ $id }}" {{ in_array($id, old('tag_ids', isset($post) ? $post->tags->pluck('id')->toArray() : [])) ? 'selected' : '' }}>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
             @error('tag_ids')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
             @error('tag_ids.*')
                 <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
        
        {{-- Display Author (Readonly) --}}
        @if(isset($post))
        <div class="mb-3">
            <label class="form-label">Author</label>
            <input type="text" class="form-control" value="{{ $post->author?->name ?? 'N/A' }}" readonly disabled>
        </div>
         <div class="mb-3">
            <label class="form-label">Created At</label>
            <input type="text" class="form-control" value="{{ $post->created_at->format('Y-m-d H:i:s') }}" readonly disabled>
        </div>
         <div class="mb-3">
            <label class="form-label">Last Updated</label>
            <input type="text" class="form-control" value="{{ $post->updated_at->format('Y-m-d H:i:s') }}" readonly disabled>
        </div>
        @endif

    </div>
</div>

<hr>

<button type="submit" class="btn btn-primary">{{ isset($post) ? 'Update Post' : 'Create Post' }}</button>
<a href="{{ route('admin.blog-posts.index') }}" class="btn btn-secondary">Cancel</a>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Slug generation
        const titleInput = document.getElementById('title');
        const slugInput = document.getElementById('slug');
        if (titleInput && slugInput && !slugInput.value) { // Only auto-slug if slug is empty
            titleInput.addEventListener('keyup', function() {
                slugInput.value = this.value.toLowerCase().replace(/\s+/g, '-').replace(/[^\w-]+/g, '');
            });
        }

        // Image Deletion AJAX
        document.querySelectorAll('.delete-image-btn').forEach(button => {
            button.addEventListener('click', function () {
                if (!confirm('Are you sure you want to delete this image?')) return;
                const imageId = this.dataset.imageId;
                const deleteUrl = this.dataset.deleteUrl;
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const container = this.closest('.existing-image-container');

                fetch(deleteUrl, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                    body: JSON.stringify({ image_id: imageId })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        if (container) container.remove();
                    } else { alert('Failed to delete image.'); }
                })
                .catch(error => { console.error('Error:', error); alert('Error deleting image.'); });
            });
        });

        // Handle image upload preview and featured image selection
        const imagesInput = document.getElementById('images');
        const featuredImageSelect = document.getElementById('featured_image_index');
        if (imagesInput && featuredImageSelect) {
            imagesInput.addEventListener('change', function() {
                // Clear existing options except "None"
                while (featuredImageSelect.options.length > 1) {
                    featuredImageSelect.remove(1);
                }
                // Add new options
                Array.from(this.files).forEach((file, index) => {
                    const option = new Option(`Image ${index + 1}`, index);
                    featuredImageSelect.add(option);
                });
            });
        }
    });
</script>
@endpush 