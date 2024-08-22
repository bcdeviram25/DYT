@extends('admin.layouts.base')

@section('content')
<div class="container mt-5">
    <h1>Edit Service</h1>

    <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="service_title">Service Title</label>
            <input type="text" class="form-control" id="service_title" name="service_title" value="{{ $service->service_title }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="5" required>{{ $service->description }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($service->image)
            <img src="{{ asset('images/' . $service->image) }}" alt="{{ $service->service_title }}" width="100" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-success">Update Service</button>
    </form>
</div>
@endsection