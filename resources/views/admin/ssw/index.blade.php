@extends('admin.layouts.base')

@section('content')
<div class="container">
    <h1>SSW Items</h1>
    <a href="{{ route('admin.ssw.create') }}" class="btn btn-primary mb-3">Add New SSW Item</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ssws as $ssw)
            <tr>
                <td>{{ $ssw->title }}</td>
                <td>{{ $ssw->description }}</td>
                <td>{{ $ssw->status ? 'Visible' : 'Hidden' }}</td>
                <td>
                    <a href="{{ route('admin.ssw.edit', $ssw->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.ssw.destroy', $ssw->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <form action="{{ route('admin.ssw.toggleStatus', $ssw->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-secondary">
                            {{ $ssw->status ? 'Hide' : 'Show' }}
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection