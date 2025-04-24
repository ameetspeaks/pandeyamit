@extends('layouts.admin')

@section('title', 'Create Project')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create New Project</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @include('admin.projects.form', ['categories' => $categories])
            </form>
        </div>
    </div>
</div>
@endsection 