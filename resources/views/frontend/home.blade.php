@extends('layouts.auth')

@section('content')
<div class="card-heading" id="our-services">
    <h2>OUR SERVICES</h2>
</div>

<div class="card-container">
    @foreach($services as $service)
    <div class="card">
        <img src="{{ asset('images/' . $service->image) }}" alt="{{ $service->service_title }}">
        <div class="card-content">
            <h1>{{ $service->service_title }}</h1>
            <p>{{ $service->description }}</p>
            <a href="{{ $service->link ? route($service->link) : '#' }}" class="btn btn-primary">Learn More</a>
        </div>
    </div>
    @endforeach
</div>


<div class="section">
    <div class="head">
        <h2>Specified Skilled Worker VISA (SSW) Japan</h2>
    </div>
    <div class="lists">
        <h3>Agriculture</h3>
        <h3>Nursing</h3>
        <h3>Cleaning</h3>
        <h3>Construction</h3>
        <h3>Hotel and Restaurant</h3>
        <h3>Packaging</h3>
        <h3>Food Services</h3>
    </div>
    <button class="know">Know More</button>
</div>

<div class="about" id="about-us">
    <div class="left-section">
        <h1>About Us</h1>
        <p>Destiny You Meet Immigration and Consultancy (DYMIC) is one of the best consultancy firms in Nepal for Japan, located in Putali Sadak, Kathmandu, Nepal. We have extensive expertise and experience in providing counseling services for studying, working, and processing visas for Japan.</p>
        <button class="know-more">Know More</button>
    </div>
    <div class="right-section">
        <img class="imgs" src="{{ asset('Assets/Images/img.jpg') }}" alt="About Us Image">
    </div>
</div>

<div class="testomonials">
    <h1 class="why">Why Us?</h1>
    <div class="row">
        @foreach($whyus as $data)
        <div class="testomonial-col">
            <img src="{{ asset('images/' . $data->image) }}" alt="">
            <div>
                <h2>{{ $data->title }}</h2>
                <p>{{ $data->description }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="row">
    <!-- Contact Section: 6 columns -->
    <div class="col-md-6 contact-section" id="contact-us">
        <div class="contents">
            <div class="left-side">
                <div class="address details">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="topic">Address</div>
                    <div class="text-one">Putali Sadak</div>
                    <div class="text-two">Opposite Shankar Dev Campus</div>
                </div>
                <div class="phone details">
                    <i class="fas fa-phone-alt"></i>
                    <div class="topic">Phone</div>
                    <div class="text-one">+9779841506563</div>
                    <div class="text-two">+977014168265</div>
                </div>
                <div class="email details">
                    <i class="fas fa-envelope"></i>
                    <div class="topic">Email</div>
                    <div class="text-one">destinyyoumeet@gmail.com</div>
                </div>
            </div>
            <div class="right-side">
                <div class="topic-text">Send us a message</div>
                <p>If you have any queries or work that you need assistance with, feel free to contact us. It's our pleasure to help you.</p>
                <form action="#">
                    <div class="input-box">
                        <input type="text" placeholder="Enter your name">
                    </div>
                    <div class="input-box">
                        <input type="text" placeholder="Enter your Email">
                    </div>
                    <div class="input-box message-box">
                        <textarea placeholder="Leave us a message"></textarea>
                    </div>
                    <div class="button">
                        <input type="button" value="Send Now">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Image Section: 6 columns -->
    <div class="col-md-6">
        <img src="{{ asset('assets/Images/contact-image.jpg') }}" class="img-fluid" alt="Contact Image">
    </div>
</div>

@endsection