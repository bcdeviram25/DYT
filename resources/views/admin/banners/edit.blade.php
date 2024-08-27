@extends('admin.layouts.base')

@section('content')
<div class="container">
    <h2>Edit Banner</h2>
    <form action="{{ route('admin.banners.update', $banner) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $banner->title }}" required>
        </div>
        <div class="form-group">
            <label for="banner_short_description">Short Description</label>
            <textarea name="banner_short_description" id="banner_short_description" class="form-control" required>{{ $banner->banner_short_description }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control-file">
            @if($banner->image)
            <img src="{{ asset('banners/' . $banner->image) }}" width="150" alt="Banner Image">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update Banner</button>
    </form>
</div>
@endsection