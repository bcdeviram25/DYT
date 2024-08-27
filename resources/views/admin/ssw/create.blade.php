@extends('admin.layouts.base')

@section('content')
<div class="container">
    <h1>Add New SSW Item</h1>
    <form action="{{ route('admin.ssw.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Add SSW Item</button>
    </form>
</div>
@endsection