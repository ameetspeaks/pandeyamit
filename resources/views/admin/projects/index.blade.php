@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Projects</h3>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Add New Project</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Featured</th>
                        <th>Image Count</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->category?->name ?? 'N/A' }}</td>
                            <td><span class="badge bg-{{ $project->status == 'completed' ? 'success' : 'warning' }}">{{ ucfirst($project->status) }}</span></td>
                            <td>{!! $project->is_featured ? '<i class="fas fa-check-circle text-success"></i>' : '<i class="fas fa-times-circle text-danger"></i>' !!}</td>
                            <td>{{ $project->images_count }}</td> {{-- Use images_count loaded via withCount --}}
                            <td>{{ $project->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{ route('projects.show', $project) }}" class="btn btn-sm btn-secondary" target="_blank">View</a>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this project and its images?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No projects found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                {{ $projects->links() }}
            </div>
        </div>
    </div>
</div>
@endsection 