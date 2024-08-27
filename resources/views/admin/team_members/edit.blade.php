@extends('admin.layouts.base')

@section('content')
<div class="container">
    <h2>Edit Team Member</h2>
    <form action="{{ route('admin.team_members.update', $teamMember) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $teamMember->name }}" required>
        </div>
        <div class="form-group">
            <label for="position">Position</label>
            <input type="text" name="position" id="position" class="form-control" value="{{ $teamMember->position }}" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" id="address" class="form-control" required>{{ $teamMember->address }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control-file">
            @if($teamMember->image)
            <img src="{{ asset('team_members/' . $teamMember->image) }}" width="150" alt="Team Member Image">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update Team Member</button>
    </form>
</div>
@endsection