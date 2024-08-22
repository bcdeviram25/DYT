<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DYMIC Consultancy</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="home">
            <nav>
                <div class="logo-content">
                    <img src="{{ asset('Assets/Images/logo.png') }}" alt="logo" class="logo">
                    <h2>DYMIC</h2>
                </div>
                <div class="nav-items">
                    <ul>
                        <li><a href="#about-us">About</a></li>
                        <li><a href="#our-services">Services</a></li>
                        <li><a href="#contact-us">Contact</a></li>
                        <li><button class="start">Start Now</button></li>
                    </ul>
                </div>
                <div class="hamburger">☰</div>
                <div class="mobile-menu">
                    <ul>
                        <li><a href="#about-us">About</a></li>
                        <li><a href="#our-services">Services</a></li>
                        <li><a href="#contact-us">Contact</a></li>
                        <li><button class="start">Start Now</button></li>
                    </ul>
                </div>
            </nav>
            <div class="home-content">
                <h1>Destiny You Meet Immigration and Consultancy</h1>
                <p>Study and Work Together</p>
                <button class="contact">Contact Us</button>
                <button class="locate">Locate Us</button>
            </div>
        </div>
    </header>

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
                <button class="read">Learn More</button>
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


    <div class="contact-section" id="contact-us">
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

    <div class="footer">
        <div class="footer-lists">
            <h3>About</h3>
            <h3>Services</h3>
            <h3>Contacts</h3>
            <h3>Works</h3>
        </div>
        <div class="medias">
            <h2>Join Us On</h2>
            <div class="social">
                <a href="#" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                <a href="#" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="#" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                <a href="#" target="_blank"><i class="fa-brands fa-youtube"></i></a>
            </div>
            <p>© Copyright 2024 Dymic - All Rights Reserved
            </p>
        </div>
    </div>

    <script src="{{ asset('assets/Javascript/script.js') }}"></script>
    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('nav a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>

</html>