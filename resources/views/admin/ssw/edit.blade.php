@extends('admin.layouts.base')

@section('content')
<div class="container">
    <h1>Edit SSW Item</h1>
    <form action="{{ route('admin.ssw.update', $ssw->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $ssw->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $ssw->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update SSW Item</button>
    </form>
</div>
@endsection