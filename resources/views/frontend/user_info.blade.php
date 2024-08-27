@extends('layouts.auth')

@section('content')
<style>
    .form-container {
        background-color: #f4f7f8;
        border-radius: 8px;
        padding: 30px;
        max-width: 500px;
        margin: 50px auto;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .form-title {
        font-family: 'Arial', sans-serif;
        font-size: 24px;
        margin-bottom: 20px;
        text-align: center;
        color: #333;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        font-size: 16px;
        color: #333;
        display: block;
        margin-bottom: 5px;
    }

    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group textarea {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .form-group textarea {
        resize: vertical;
        min-height: 100px;
    }

    .submit-btn {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        color: #fff;
        background-color: #5cb85c;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
        background-color: #4cae4c;
    }
</style>
<div class="form-container">
    <h2 class="form-title">Registration Form</h2>
    <form method="POST" action="{{ route('form_data.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" placeholder="Enter your address" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
            <label for="phone_no">Phone Number</label>
            <input type="text" id="phone_no" name="phone_no" placeholder="Enter your phone number" required>
        </div>
        <div class="form-group">
            <label for="interested_country">Interested Country</label>
            <input type="text" id="interested_country" name="interested_country" placeholder="Enter your interested country" required>
        </div>
        <div class="form-group">
            <label for="interested_field">Interested Field</label>
            <input type="text" id="interested_field" name="interested_field" placeholder="Enter your interested field" required>
        </div>
        <div class="form-group">
            <label for="work_experience">Work Experience</label>
            <textarea id="work_experience" name="work_experience" placeholder="Describe your work experience" required></textarea>
        </div>
        <button type="submit" class="submit-btn">Submit</button>
    </form>
</div>
@endsection