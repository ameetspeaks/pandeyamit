@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create New Project Category</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.project-categories.store') }}" method="POST">
                @include('admin.project_categories.form')
            </form>
        </div>
    </div>
</div>
@endsection 