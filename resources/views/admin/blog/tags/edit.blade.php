@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Blog Tag</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.blog-tags.update', $tag) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $tag->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="slug">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $tag->slug) }}">
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Leave empty to auto-generate from name</small>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Update Tag</button>
                    <a href="{{ route('admin.blog-tags.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Auto-generate slug from name if slug is empty
    document.getElementById('name').addEventListener('keyup', function() {
        const slugInput = document.getElementById('slug');
        if (slugInput.value === '') {
            let slug = this.value.toLowerCase()
                .replace(/[^\w\s-]/g, '') // Remove special characters
                .replace(/\s+/g, '-')     // Replace spaces with -
                .replace(/-+/g, '-');     // Replace multiple - with single -
            slugInput.value = slug;
        }
    });
</script>
@endpush 