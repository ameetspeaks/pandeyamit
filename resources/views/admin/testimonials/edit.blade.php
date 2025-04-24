@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Testimonial: {{ $testimonial->client_name }}</h3>
        </div>
        <div class="card-body">
             <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @include('admin.testimonials.form', ['testimonial' => $testimonial])
            </form>
        </div>
    </div>
</div>
@endsection 