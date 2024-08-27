{{-- resources/views/admin/testimonials/index.blade.php --}}
@extends('admin.layouts.base')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Testimonials</h1>
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">Add Testimonial</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Message</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($testimonials as $testimonial)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $testimonial->name }}</td>
                <td>{{ $testimonial->message }}</td>
                <td><img src="{{ asset('banners/' . $testimonial->image) }}" alt="{{ $testimonial->name }}" width="50"></td>
                <td>
                    <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.testimonials.toggle', $testimonial->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn {{ $testimonial->is_visible ? 'btn-secondary' : 'btn-success' }}">
                            {{ $testimonial->is_visible ? 'Hide' : 'Show' }}
                        </button>
                    </form>
                    <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection