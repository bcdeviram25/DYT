@extends('admin.layouts.base')

@section('content')
<div class="container">
    <h1>Gallery Images</h1>
    <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary mb-3">Add New Image</a>
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($images as $image)
            <tr>
                <td><img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $image->name }}" width="100"></td>
                <td>{{ $image->name }}</td>
                <td>{{ $image->status ? 'Visible' : 'Hidden' }}</td>
                <td>
                    <a href="{{ route('admin.gallery.edit', $image->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.gallery.destroy', $image->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <form action="{{ route('admin.gallery.toggleStatus', $image->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-secondary">
                            {{ $image->status ? 'Hide' : 'Show' }}
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection