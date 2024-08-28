@extends('layouts.auth')

@section('content')

@include('includes.banners')
<!-- <div class="card-heading" id="our-services">
    <h2>OUR SERVICES</h2>
</div>

<div class="card-container">
    @foreach($services as $service)
    <div class="card">
        <img src="{{ asset('images/' . $service->image) }}" alt="{{ $service->service_title }}">
        <div class="card-content">
            <h1>{{ $service->service_title }}</h1>
            <p>{{ $service->description }}</p> <br>
            <a href="{{ $service->link ? url('/ourservices/' . $service->link) : '#' }}"
                style="display: inline-block; padding: 10px 20px; background-color: #2E8B57; color: white; border-radius: 25px; text-align: center; text-decoration: none; font-weight: bold;">
                Learn More
            </a>
        </div>
    </div>
    @endforeach
</div> -->

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


@include('includes.teams')


<div class="main-section">
    <div class="work-section">
        <h1>Specified Skilled Worker VISA (SSW) Japan</h1>
        <div class="work-services">
            <div class="service-card" data-title="Agriculture" data-description="The Agriculture sector offers opportunities to work in Japan's thriving agricultural industry, focusing on crop production, livestock farming, and innovative agricultural practices. Workers can gain hands-on experience with cutting-edge farming techniques and contribute to sustainable food production.">
                <i class="fa-solid fa-tractor"></i>
                <h2>Agriculture</h2>
            </div>
            <div class="service-card" data-title="Nursing" data-description="Nursing provides skilled workers the chance to work in Japan’s healthcare system, offering care to the elderly and those in need. With a focus on compassion and medical expertise, workers will help improve the quality of life for patients in hospitals, nursing homes, and care facilities.">
                <i class="fa-solid fa-user-nurse"></i>
                <h2>Nursing</h2>
            </div>
            <div class="service-card" data-title="Cleaning" data-description="The Cleaning industry in Japan emphasizes precision and attention to detail. Workers will be involved in maintaining cleanliness and hygiene in various settings, including hospitals, hotels, and public facilities, ensuring a safe and sanitary environment for all.">
                <i class="fa-solid fa-broom"></i>
                <h2>Cleaning</h2>
            </div>
            <div class="service-card" data-title="Construction" data-description="The Construction sector offers opportunities to contribute to Japan’s infrastructure projects, including building roads, bridges, and residential structures. Skilled workers will engage in hands-on construction work, ensuring the safety and durability of new developments.">
                <i class="fa-solid fa-wrench"></i>
                <h2>Construction</h2>
            </div>
            <div class="service-card" data-title="Hotels & Restaurants" data-description="In the Hotels & Restaurants sector, workers will provide high-quality hospitality services, including food preparation, customer service, and management. This sector is crucial in maintaining Japan’s reputation for excellent service in the tourism industry.">
                <i class="fa-solid fa-utensils"></i>
                <h2>Hotels</h2>
            </div>
            <div class="service-card" data-title="Packaging" data-description="The Packaging industry involves the careful packing and preparation of goods for shipment. Workers will ensure that products are securely packaged, labeled, and ready for transport, contributing to Japan’s global supply chain and export economy.">
                <i class="fa-solid fa-box-open"></i>
                <h2>Packaging</h2>
            </div>
            <div class="service-card" data-title="Food Services" data-description="Food Services in Japan focus on providing quality meals in a variety of settings, from restaurants to catering services. Workers will be involved in food preparation, cooking, and customer service, maintaining the high standards of Japan’s culinary culture.">
                <i class="fa-solid fa-cookie-bite"></i>
                <h2>Food</h2>
            </div>
        </div>
    </div>

    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close-btn">&times;</span>
            <h2 id="popup-title"></h2>
            <p id="popup-content"></p>
        </div>
    </div>
</div>




@include('includes.testimonials')
<!-- <div class="testomonials">
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
</div> -->

<div class="gallery-section">
    <h2>Gallery</h2>
    <div class="swiper">
        <div class="swiper-wrapper">
            @foreach($gallery as $data)
            <div class="swiper-slide"><img src="{{ asset('storage/' . $data->image_path) }}" alt="Image hasn't been uploaded"></div>

            @endforeach
        </div>
        <!-- Add Pagination -->
        <div class="gallery-pagination swiper-pagination"></div>
    </div>
</div>

<div class="contact-row">
    <!-- First row: Contact Information -->
    <div class="contact-info">
        <div class="details">
            <i class="fas fa-map-marker-alt"></i>
            <div class="topic">Address</div>
            <div class="text-one">Putali Sadak</div>
            <div class="text-two">Opposite Shankar Dev Campus</div>
        </div>
        <div class="details">
            <i class="fas fa-phone-alt"></i>
            <div class="topic">Phone</div>
            <div class="text-one">+9779841506563</div>
            <div class="text-two">+977014168265</div>
        </div>
        <div class="details">
            <i class="fas fa-envelope"></i>
            <div class="topic">Email</div>
            <div class="text-one">destinyyoumeet@gmail.com</div>
        </div>
    </div>

    <!-- Second row: Send Message Form and Image -->
    <div class="contact-content">
        <div class="left-column">
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
        <div class="right-column contact-img">
            <img src="{{ asset('assets/Images/contact-image.jpg')}}" alt="Contact Image">
        </div>
    </div>
</div>


@endsection