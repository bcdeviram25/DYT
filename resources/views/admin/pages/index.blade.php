@extends('admin.layouts.base')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Pages</h1>
    <a href="{{ route('pages.create') }}" class="btn btn-primary mb-3">Add New Page</a>

    <table class="table table-bordered table-fixed">
        <thead>
            <tr>
                <th>S.No</th>
                <th>Page Name</th>
                <th>Show/Hide</th>
                <th>Order Number</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pages as $key => $page)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $page->page_name }}</td>
                <td>
                    <form action="{{ route('pages.toggleVisibility', $page->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-{{ $page->is_visible ? 'success' : 'danger' }}">
                            {{ $page->is_visible ? 'Hide' : 'Show' }}
                        </button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('pages.updateOrder', $page->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="number" name="order_number" value="{{ $page->order_number }}" class="form-control" style="width: 80px;">
                        <button type="submit" class="btn btn-secondary mt-1">Save</button>
                    </form>
                </td>
                <td><a href="{{ route('pages.edit', $page->id) }}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="{{ route('pages.destroy', $page->id) }}" method="POST">
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

<style>
    .table-fixed thead {
        width: 100%;
    }

    .table-fixed tbody {
        height: 400px;
        overflow-y: auto;
        width: 100%;
    }

    .table-fixed thead,
    .table-fixed tbody tr {
        display: table;
        width: 90%;
        table-layout: fixed;
    }
</style>
@endsection