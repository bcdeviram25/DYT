@extends('admin.layouts.base')

@section('content')
<div class="container">
    <h2>Create Banner</h2>
    <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="banner_short_description">Short Description</label>
            <textarea name="banner_short_description" id="banner_short_description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control-file" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Banner</button>
    </form>
</div>
@endsection