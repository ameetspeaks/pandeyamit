@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Blog Post: {{ $post->title }}</h3>
        </div>
        <div class="card-body">
             <form action="{{ route('admin.blog-posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                 @include('admin.blog.posts.form', [
                    'post' => $post,
                    'categories' => $categories,
                    'tags' => $tags
                 ])
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<script>
    // Initialize TomSelect for categories and tags
    new TomSelect('#category_ids', {
        plugins: ['remove_button'],
        maxItems: null
    });
    
    new TomSelect('#tag_ids', {
        plugins: ['remove_button'],
        maxItems: null,
        create: true // Allow creating new tags
    });
</script>
@endpush 