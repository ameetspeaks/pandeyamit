@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Newsletter Subscribers</h3>
            <a href="{{ route('admin.newsletter-subscribers.export') }}" class="btn btn-success">Export CSV</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Subscribed At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subscribers as $subscriber)
                        <tr>
                            <td>{{ $subscriber->id }}</td>
                            <td>{{ $subscriber->name ?? 'N/A' }}</td>
                            <td>{{ $subscriber->email }}</td>
                            <td><span class="badge bg-{{ $subscriber->status == 'subscribed' ? 'success' : 'secondary' }}">{{ ucfirst($subscriber->status) }}</span></td>
                            <td>{{ $subscriber->subscription_date?->format('Y-m-d H:i') ?? 'N/A' }}</td>
                            <td>
                                <form action="{{ route('admin.newsletter-subscribers.destroy', $subscriber) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to remove this subscriber?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No newsletter subscribers found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                {{ $subscribers->links() }}
            </div>
        </div>
    </div>
</div>
@endsection 