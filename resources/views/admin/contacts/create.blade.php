@extends('admin.layouts.base')

@section('content')
<div class="container">
    <h1>Add New Contact</h1>
    <form action="{{ route('admin.contacts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone_no">Phone No.</label>
            <input type="text" name="phone_no" id="phone_no" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Add Contact</button>
    </form>
</div>
@endsection