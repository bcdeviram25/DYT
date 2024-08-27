@extends('layouts.auth')

@section('content')
<div class="page-content">

    <div class="slide active" style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.3)), url({{ asset('assets/Images/background.jpg') }}); background-size: cover; background-position: center; height: 85vh; display: flex; align-items: center; justify-content: center;">

        <div class="banner-content" style="text-align: center; color: white;">
            <h1 style="margin: 0; font-size: 3rem;">Destiny you meet immigration and Consultancy</h1>
            <p style="font-size: 1.5rem;">Study and Work Together</p>
        </div>
    </div>




    <h1>{{ $page->page_title }}</h1>
    {!! $page->description !!}
</div>
@endsection