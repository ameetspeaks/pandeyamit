@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Blog Posts</h3>
            <a href="{{ route('admin.blog-posts.create') }}" class="btn btn-primary">Add New Post</a>
        </div>
        <div class="card-body">
            {{-- Filtering Form (Optional) --}}
            <form method="GET" action="{{ route('admin.blog-posts.index') }}" class="mb-3">
                <div class="row g-2">
                    <div class="col-md-4">
                        <select name="status" class="form-select">
                            <option value="">All Statuses</option>
                            <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select name="category" class="form-select">
                            <option value="">All Categories</option>
                            @foreach($categories as $id => $name)
                                <option value="{{ $id }}" {{ request('category') == $id ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-secondary w-100">Filter</button>
                    </div>
                    <div class="col-md-2">
                         <a href="{{ route('admin.blog-posts.index') }}" class="btn btn-outline-secondary w-100">Reset</a>
                    </div>
                </div>
            </form>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Categories</th>
                        <th>Tags</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ Str::limit($post->title, 40) }}</td>
                            <td>{{ $post->author?->name ?? 'N/A' }}</td>
                            <td>{{ $post->categories->pluck('name')->implode(', ') }}</td>
                            <td>{{ $post->tags->pluck('name')->implode(', ') }}</td>
                            <td><span class="badge bg-{{ $post->status == 'published' ? 'success' : 'secondary' }}">{{ ucfirst($post->status) }}</span></td>
                            <td>{{ $post->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('admin.blog-posts.edit', $post) }}" class="btn btn-sm btn-info">Edit</a>
                                {{-- Add view link if public blog exists --}}
                                {{-- <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-sm btn-secondary" target="_blank">View</a> --}}
                                <form action="{{ route('admin.blog-posts.destroy', $post) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No blog posts found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                {{ $posts->withQueryString()->links() }} {{-- Append query string for pagination --}}
            </div>
        </div>
    </div>
</div>
@endsection 