@extends('admin.layouts.base')

@section('content')
<div class="container">
    <h2>Team Members</h2>
    <a href="{{ route('admin.team_members.create') }}" class="btn btn-primary mb-3">Add Team Member</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Address</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teamMembers as $teamMember)
            <tr>
                <td>{{ $teamMember->name }}</td>
                <td>{{ $teamMember->position }}</td>
                <td>{{ $teamMember->address }}</td>
                <td><img src="{{ asset('team_members/' . $teamMember->image) }}" width="100" alt="Team Member Image"></td>
                <td>
                    <a href="{{ route('admin.team_members.edit', $teamMember) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.team_members.destroy', $teamMember) }}" method="POST" style="display:inline-block;">
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