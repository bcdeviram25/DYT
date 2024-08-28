<header class="large-screen-header">
    <div class="container header-container">
        <div class="logo">
            <img src="{{ asset('assets/Images/logo.png') }}" alt="DYMIC">
            <span>DYMIC</span>
        </div>
        <div class="contact-details">
            @foreach($contactus as $contact)
            <div class="address">
                <i class="fas fa-map-marker-alt"></i>
                <span>{{ $contact->address }}</span>
            </div>
            <div class="phone">
                <i class="fas fa-phone-alt"></i>
                <span>{{ $contact->phone_no }}</span>
            </div>
            @endforeach
            <div class="events">
                <a class="start" href="{{route('form')}}">Register</a>
            </div>
        </div>
    </div>
</header>

<nav class="navbar">
    <div class="container">
        <div class="menu-icon">
            <i class="fas fa-bars"></i>
        </div>
        <div class="logo small-screen-logo">
            <img src="{{ asset('assets/Images/logo.png') }}" alt="Dolphin Logo">
            <span>DYMIC</span>
        </div>
        <ul class="nav-menu">
            <li><a href="{{ route('home') }}">Home</a></li>

            <!-- Main Pages -->
            @foreach ($mainPages as $mainPage)
            @if (!$mainPage->is_hidden)
            <li class="dropdown">
                @if ($mainPage->page_style == 'link')
                <a href="{{ $mainPage->link }}" target="_blank">{{ $mainPage->page_name }}</a>
                @else
                <a href="{{ route('pages.show', $mainPage->id) }}">{{ $mainPage->page_name }}</a>
                @endif

                @php
                $relatedSubPages = $subPages->filter(function($subPage) use ($mainPage) {
                return $subPage->related_page == $mainPage->id && !$subPage->is_hidden;
                });
                @endphp

                @if ($relatedSubPages->count() > 0)
                <ul class="dropdown-menu">
                    @foreach ($relatedSubPages as $subPage)
                    <li class="dropdown-submenu">
                        @if ($subPage->page_style == 'link')
                        <a href="{{ $subPage->link }}" target="_blank">{{ $subPage->page_name }}</a>
                        @else
                        <a href="{{ route('pages.show', $subPage->id) }}">{{ $subPage->page_name }}</a>
                        @endif

                        @php
                        $relatedSubSubPages = $subSubPages->filter(function($subSubPage) use ($subPage) {
                        return $subSubPage->related_page == $subPage->id && !$subSubPage->is_hidden;
                        });
                        @endphp

                        @if ($relatedSubSubPages->count() > 0)
                        <ul class="dropdown-menu-right">
                            @foreach ($relatedSubSubPages as $subSubPage)
                            <li>
                                @if ($subSubPage->page_style == 'link')
                                <a href="{{ $subSubPage->link }}" target="_blank">{{ $subSubPage->page_name }}</a>
                                @else
                                <a href="{{ route('pages.show', $subSubPage->id) }}">{{ $subSubPage->page_name }}</a>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endif
            @endforeach

            <!-- Static Pages -->
            <li><a href="{{ route('about') }}">About Us</a></li>
            <li><a href="#testimonials">Testimonials</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>


    </div>
</nav>