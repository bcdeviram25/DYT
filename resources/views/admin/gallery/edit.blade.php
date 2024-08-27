@extends('admin.layouts.base')

@section('content')
<div class="container">
    <h1>Edit Image</h1>
    <form action="{{ route('admin.gallery.update', $image->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Image Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $image->name }}" required>
        </div>
        <div class="form-group">
            <label for="image">Image File (Optional)</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Update Image</button>
    </form>
</div>
@endsection