@extends('admin.layouts.base')

@section('content')
<div class="container">
    <h1>Add New Image</h1>
    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Image Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">Image File</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Add Image</button>
    </form>
</div>
@endsection