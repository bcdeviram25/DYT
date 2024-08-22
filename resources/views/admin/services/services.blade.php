@extends('admin.layouts.base')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between mb-3">
        <h1>Services</h1>
        <a href="{{ route('services.create') }}" class="btn btn-primary">Add Service</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Service Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $service->service_title }}</td>
                <td>{{ $service->description }}</td>
                <td>
                    @if($service->image)
                    <img src="{{ asset('images/' . $service->image) }}" alt="{{ $service->service_title }}" width="100">
                    @endif
                </td>
                <td><a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="{{ route('services.destroy', $service->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection