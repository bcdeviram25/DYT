<section class="banner">
    <div class="slider">

        @foreach($bannerImage as $data)

        <div class="slide active" style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.3)), url({{ asset('banners/', $data->image ) }});">
            <div class="banner-content">
                <h1>{{ $data->banner_short_description }}</h1>
                <p>{{ $data->title }}</p>
            </div>
        </div>

        @endforeach
    </div>
    <div class="slider-dots">
        <span class="dot active" data-slide="0"></span>
        <span class="dot" data-slide="1"></span>
        <span class="dot" data-slide="2"></span>
    </div>
</section>