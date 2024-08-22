@extends('admin.layouts.base')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between mb-3">
        <h1>Why Us</h1>
        <a href="{{ route('whyus.create') }}" class="btn btn-primary">Add Why Us Item</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($whyUs as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->description }}</td>
                <td>
                    @if($item->image)
                    <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->title }}" width="100">
                    @endif
                </td>
                <td><a href="{{ route('whyus.edit', $item->id) }}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="{{ route('whyus.destroy', $item->id) }}" method="POST">
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