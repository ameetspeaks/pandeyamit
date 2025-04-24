@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Project Category: {{ $category->name }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.project-categories.update', $category) }}" method="POST">
                @method('PUT')
                @include('admin.project_categories.form', ['category' => $category])
            </form>
        </div>
    </div>
</div>
@endsection 