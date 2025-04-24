@extends('layouts.admin')

@section('title', 'Edit Project')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Project: {{ $project->title }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @include('admin.projects.form', ['project' => $project, 'categories' => $categories])
            </form>
        </div>
    </div>
</div>
@endsection 