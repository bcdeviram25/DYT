// JavaScript to handle menu toggle
const menuIcon = document.getElementById('menu-icon');
const closeIcon = document.getElementById('close-icon');
const navItems = document.querySelector('.nav-items ul');

// Show navigation menu when menu icon is clicked
menuIcon.addEventListener('click', () => {
    navItems.classList.add('active');
    menuIcon.style.display = 'none'; // Hide the menu icon
    closeIcon.style.display = 'block'; // Show the close icon
});

// Hide navigation menu when close icon is clicked
closeIcon.addEventListener('click', () => {
    navItems.classList.remove('active');
    menuIcon.style.display = 'block'; // Show the menu icon
    closeIcon.style.display = 'none'; // Hide the close icon
});

//for scrolling of services cards
$(document).ready(function(){
    const slider = $('.slider-track');
    const totalItems = $('.card').length;
    const itemsToShow = 3;
    const itemWidthPercentage = 100 / itemsToShow;
    let currentIndex = 0;

    function slideItems() {
        currentIndex = (currentIndex + 1) % totalItems;
        slider.css('transform', `translateX(-${currentIndex * itemWidthPercentage}%)`);
    }

    setInterval(slideItems, 3000); // Change slide every 3 seconds
});

document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.querySelector('.hamburger');
    const mobileMenu = document.querySelector('.mobile-menu');

    hamburger.addEventListener('click', function() {
        mobileMenu.style.display = mobileMenu.style.display === 'block' ? 'none' : 'block';
        this.classList.toggle('active');
    });
});