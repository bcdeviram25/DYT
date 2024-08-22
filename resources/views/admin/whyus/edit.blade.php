@extends('admin.layouts.base')

@section('content')
<div class="container mt-5">
    <h1>Edit Why Us Item</h1>

    <form action="{{ route('whyus.update', $whyU->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $whyU->title }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="5" required>{{ $whyU->description }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($whyU->image)
            <img src="{{ asset('images/' . $whyU->image) }}" alt="{{ $whyU->title }}" width="100" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-success">Update Why Us Item</button>
    </form>
</div>
@endsection