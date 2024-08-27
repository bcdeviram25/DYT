function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('visible');
}
new Swiper('.testimonial-slider', {
    loop: true,
    spaceBetween: 30,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },
});
// Responsive Navigation Menu Toggle

document.addEventListener('DOMContentLoaded', function() {
    const menuIcon = document.querySelector('.menu-icon i');
    const navMenu = document.querySelector('.nav-menu');
    const closeIcon = document.createElement('i');

    closeIcon.classList.add('fas', 'fa-times', 'close-icon');

    menuIcon.addEventListener('click', function() {
        navMenu.classList.toggle('active');

        if (navMenu.classList.contains('active')) {
            menuIcon.classList.remove('fa-bars');
            menuIcon.classList.add('fa-times');
            navMenu.prepend(closeIcon);
        } else {
            menuIcon.classList.remove('fa-times');
            menuIcon.classList.add('fa-bars');
        }
    });

    closeIcon.addEventListener('click', function() {
        navMenu.classList.remove('active');
        menuIcon.classList.remove('fa-times');
        menuIcon.classList.add('fa-bars');
    });

    // Close menu when clicking on any menu item
    document.querySelectorAll('.nav-menu li a').forEach(item => {
        item.addEventListener('click', function() {
            navMenu.classList.remove('active');
            menuIcon.classList.remove('fa-times');
            menuIcon.classList.add('fa-bars');
        });
    });
});
const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll('.dot');
let currentSlide = 0;
const totalSlides = slides.length;

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.classList.remove('active');
        dots[i].classList.remove('active');
        if (i === index) {
            slide.classList.add('active');
            dots[i].classList.add('active');
        }
    });
    currentSlide = index;
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    showSlide(currentSlide);
}

dots.forEach((dot, i) => {
    dot.addEventListener('click', () => {
        showSlide(i);
    });
});

setInterval(nextSlide, 5000);


// Optional: If you want manual control, you can add event listeners for swipe or buttons.


//for dropdown contents
document.querySelectorAll('.dropdown').forEach(dropdown => {
    dropdown.addEventListener('mouseenter', () => {
        const submenu = dropdown.querySelector('.dropdown-menu');
        if (submenu) {
            submenu.style.display = 'block';
        }
    });

    dropdown.addEventListener('mouseleave', () => {
        const submenu = dropdown.querySelector('.dropdown-menu');
        if (submenu) {
            submenu.style.display = 'none';
        }
    });
});

document.querySelectorAll('.dropdown-submenu').forEach(submenu => {
    submenu.addEventListener('mouseenter', () => {
        const submenuRight = submenu.querySelector('.dropdown-menu-right');
        if (submenuRight) {
            submenuRight.style.display = 'block';
        }
    });

    submenu.addEventListener('mouseleave', () => {
        const submenuRight = submenu.querySelector('.dropdown-menu-right');
        if (submenuRight) {
            submenuRight.style.display = 'none';
        }
    });
});
