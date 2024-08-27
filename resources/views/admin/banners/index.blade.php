@extends('admin.layouts.base')

@section('content')
<div class="container">
    <h2>Banners</h2>
    <a href="{{ route('admin.banners.create') }}" class="btn btn-primary mb-3">Add Banner</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Short Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($banners as $banner)
            <tr>
                <td>{{ $banner->title }}</td>
                <td>{{ $banner->banner_short_description }}</td>
                <td><img src="{{ asset('banners/' . $banner->image) }}" width="100" alt="Banner Image"></td>
                <td>
                    <a href="{{ route('admin.banners.edit', $banner) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.banners.destroy', $banner) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <form action="{{ route('admin.banners.toggle', $banner) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-secondary">{{ $banner->is_visible ? 'Hide' : 'Show' }}</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection