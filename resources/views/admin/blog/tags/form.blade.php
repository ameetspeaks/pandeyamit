@csrf

<div class="mb-3">
    <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $tag->name ?? '') }}" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $tag->slug ?? '') }}" required>
    @error('slug')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">{{ isset($tag) ? 'Update Tag' : 'Create Tag' }}</button>
<a href="{{ route('admin.blog.tags.index') }}" class="btn btn-secondary">Cancel</a>

@push('scripts')
<script>
    // Simple slug generation helper (optional)
    document.addEventListener('DOMContentLoaded', function() {
        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');

        if (nameInput && slugInput) {
            nameInput.addEventListener('keyup', function() {
                // Basic slugify - replace spaces with hyphens and convert to lowercase
                slugInput.value = this.value.toLowerCase().replace(/\s+/g, '-').replace(/[^\w-]+/g, '');
            });
        }
    });
</script>
@endpush 