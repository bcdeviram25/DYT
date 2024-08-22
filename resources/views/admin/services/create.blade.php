@extends('admin.layouts.base')

@section('content')
<div class="container mt-5">
    <h1>Add Service</h1>

    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="service_title">Service Title</label>
            <input type="text" class="form-control" id="service_title" name="service_title" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>

        <button type="submit" class="btn btn-success">Add Service</button>
    </form>
</div>
@endsection