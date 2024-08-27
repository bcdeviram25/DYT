{{-- resources/views/admin/banners/edit.blade.php --}}
@extends('admin.layouts.base')

@section('content')
<div class="container">
    <h1>Edit Testimonial</h1>

    <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $testimonial->name }}" required>
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea name="message" id="message" class="form-control" rows="3" required>{{ $testimonial->message }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}" width="100" class="mt-2">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection