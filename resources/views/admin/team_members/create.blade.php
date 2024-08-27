@extends('admin.layouts.base')

@section('content')
<div class="container">
    <h2>Create Team Member</h2>
    <form action="{{ route('admin.team_members.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="position">Position</label>
            <input type="text" name="position" id="position" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" id="address" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control-file" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Team Member</button>
    </form>
</div>
@endsection