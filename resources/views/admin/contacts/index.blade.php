@extends('admin.layouts.base')

@section('content')
<div class="container">
    <h1>Contacts</h1>
    <a href="{{ route('admin.contacts.create') }}" class="btn btn-primary mb-3">Add New Contact</a>
    <table class="table">
        <thead>
            <tr>
                <th>Address</th>
                <th>Email</th>
                <th>Phone No.</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->address }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->phone_no }}</td>
                <td>{{ $contact->status ? 'Visible' : 'Hidden' }}</td>
                <td>
                    <a href="{{ route('admin.contacts.edit', $contact->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <form action="{{ route('admin.contacts.toggleStatus', $contact->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-secondary">
                            {{ $contact->status ? 'Hide' : 'Show' }}
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection