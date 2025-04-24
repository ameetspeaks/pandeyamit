@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Testimonials</h3>
            <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">Add New Testimonial</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Client Name</th>
                        <th>Company</th>
                        <th>Rating</th>
                        <th>Status</th>
                        <th>Featured</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $testimonial)
                        <tr>
                            <td>{{ $testimonial->id }}</td>
                            <td>
                                @if($testimonial->client_image)
                                    <img src="{{ $testimonial->client_image }}" alt="{{ $testimonial->client_name }}" style="max-height: 50px; max-width: 50px;" class="img-thumbnail rounded-circle">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>{{ $testimonial->client_name }}</td>
                            <td>{{ $testimonial->client_company }}</td>
                            <td>
                                @if($testimonial->rating)
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star{{ $i <= $testimonial->rating ? ' text-warning' : '-alt text-muted' }}"></i>
                                    @endfor
                                @else
                                   <span class="text-muted"> N/A</span>
                                @endif
                            </td>
                            <td><span class="badge bg-{{ $testimonial->status == 'active' ? 'success' : 'secondary' }}">{{ ucfirst($testimonial->status) }}</span></td>
                            <td>{!! $testimonial->is_featured ? '<i class="fas fa-check-circle text-success"></i>' : '<i class="fas fa-times-circle text-danger"></i>' !!}</td>
                            <td>{{ $testimonial->created_at->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-sm btn-info">Edit</a>
                                <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">No testimonials found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                {{ $testimonials->links() }}
            </div>
        </div>
    </div>
</div>
@endsection 