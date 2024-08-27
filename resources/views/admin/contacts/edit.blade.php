@extends('admin.layouts.base')

@section('content')
<div class="container">
    <h1>Edit Contact</h1>
    <form action="{{ route('admin.contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $contact->address }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $contact->email }}" required>
        </div>
        <div class="form-group">
            <label for="phone_no">Phone No.</label>
            <input type="text" name="phone_no" id="phone_no" class="form-control" value="{{ $contact->phone_no }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update Contact</button>
    </form>
</div>
@endsection