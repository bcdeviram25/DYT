<?php

use App\Http\Controllers\AdminController\AdminBannerController;
use App\Http\Controllers\AdminController\AdminContactController;
use App\Http\Controllers\AdminController\AdminGalleryController;
use App\Http\Controllers\AdminController\AdminSSWController;
use App\Http\Controllers\AdminController\AdminTeamMemberController;
use App\Http\Controllers\AdminController\BannerController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController\DashboardController;
use App\Http\Controllers\AdminController\PageController;
use App\Http\Controllers\AdminController\ServiceController;
use App\Http\Controllers\AdminController\WhyUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormDataController;
use Illuminate\Support\Facades\Route;

// Home route
Route::get('/', [HomeController::class, 'index'])->name('home');

// routes/web.php
Route::get('/pages/{id}', [HomeController::class, 'show'])->name('pages.show');

//routes for form control
Route::get('/form-data', [FormDataController::class, 'form'])->name('form');

Route::post('/submit-form-data', [FormDataController::class, 'store'])->name('form_data.store');



// Dashboard route, protected by authentication
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    //Routes for pages
    // Display the list of pages
    Route::get('pages', [PageController::class, 'index'])->name('pages.index');

    // Show the form to create a new page
    Route::get('adminpages/create', [PageController::class, 'create'])->name('pages.create');

    // Store the newly created page
    Route::post('adminpages', [PageController::class, 'store'])->name('pages.store');

    // Show the form to edit an existing page
    Route::get('adminpages/{page}/edit', [PageController::class, 'edit'])->name('pages.edit');

    // Update an existing page
    Route::put('adminpages/{page}', [PageController::class, 'update'])->name('pages.update');

    // Delete an existing page
    Route::delete('adminpages/{page}', [PageController::class, 'destroy'])->name('pages.destroy');

    // Toggle the visibility of a page (show/hide)
    Route::put('adminpages/{page}/toggle-visibility', [PageController::class, 'toggleVisibility'])->name('pages.toggleVisibility');
    Route::put('adminpages/{page}/update-order', [PageController::class, 'updateOrder'])->name('pages.updateOrder');



    //Routes for services
    Route::get('/services/index', [ServiceController::class, 'index'])->name('services.index');
    Route::get('services/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
    Route::put('services/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');

    //Routes for whyus
    Route::get('whyus', [WhyUsController::class, 'index'])->name('whyus.index');
    Route::get('whyus/create', [WhyUsController::class, 'create'])->name('whyus.create');
    Route::post('whyus', [WhyUsController::class, 'store'])->name('whyus.store');
    Route::get('whyus/{whyU}/edit', [WhyUsController::class, 'edit'])->name('whyus.edit');
    Route::put('whyus/{whyU}', [WhyUsController::class, 'update'])->name('whyus.update');
    Route::delete('whyus/{whyU}', [WhyUsController::class, 'destroy'])->name('whyus.destroy');

    // for updating banners

    Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
        // Index and Create routes
        Route::get('testimonials', [BannerController::class, 'index'])->name('testimonials.index');
        Route::get('testimonials/create', [BannerController::class, 'create'])->name('testimonials.create');

        // Store and Update routes
        Route::post('testimonials', [BannerController::class, 'store'])->name('testimonials.store');
        Route::get('testimonials/{testimonial}/edit', [BannerController::class, 'edit'])->name('testimonials.edit');
        Route::put('testimonials/{testimonial}', [BannerController::class, 'update'])->name('testimonials.update');

        // Delete and Toggle routes
        Route::delete('testimonials/{testimonial}', [BannerController::class, 'destroy'])->name('testimonials.destroy');
        Route::patch('testimonials/{testimonial}/toggle', [BannerController::class, 'toggle'])->name('testimonials.toggle');
    });

    //for banners
    Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
        // Index and Create routes
        Route::get('banners', [AdminBannerController::class, 'index'])->name('banners.index');
        Route::get('banners/create', [AdminBannerController::class, 'create'])->name('banners.create');

        // Store and Update routes
        Route::post('banners', [AdminBannerController::class, 'store'])->name('banners.store');
        Route::get('banners/{banner}/edit', [AdminBannerController::class, 'edit'])->name('banners.edit');
        Route::put('banners/{banner}', [AdminBannerController::class, 'update'])->name('banners.update');

        // Delete and Toggle routes
        Route::delete('banners/{banner}', [AdminBannerController::class, 'destroy'])->name('banners.destroy');
        Route::patch('banners/{banner}/toggle', [AdminBannerController::class, 'toggle'])->name('banners.toggle');
    });

    //routes for admin team members
    Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
        // Index and Create routes
        Route::get('team_members', [AdminTeamMemberController::class, 'index'])->name('team_members.index');
        Route::get('team_members/create', [AdminTeamMemberController::class, 'create'])->name('team_members.create');

        // Store and Update routes
        Route::post('team_members', [AdminTeamMemberController::class, 'store'])->name('team_members.store');
        Route::get('team_members/{team_member}/edit', [AdminTeamMemberController::class, 'edit'])->name('team_members.edit');
        Route::put('team_members/{team_member}', [AdminTeamMemberController::class, 'update'])->name('team_members.update');

        // Delete route
        Route::delete('team_members/{team_member}', [AdminTeamMemberController::class, 'destroy'])->name('team_members.destroy');
    });


    //routes for gallery
    Route::get('/admin/gallery', [AdminGalleryController::class, 'index'])->name('admin.gallery.index');
    Route::get('/admin/gallery/create', [AdminGalleryController::class, 'create'])->name('admin.gallery.create');
    Route::post('/admin/gallery/store', [AdminGalleryController::class, 'store'])->name('admin.gallery.store');
    Route::get('/admin/gallery/{id}/edit', [AdminGalleryController::class, 'edit'])->name('admin.gallery.edit');
    Route::put('/admin/gallery/{id}', [AdminGalleryController::class, 'update'])->name('admin.gallery.update');
    Route::delete('/admin/gallery/{id}', [AdminGalleryController::class, 'destroy'])->name('admin.gallery.destroy');
    Route::patch('/admin/gallery/{id}/toggle-status', [AdminGalleryController::class, 'toggleStatus'])->name('admin.gallery.toggleStatus');


    //routes for ssw
    Route::get('/admin/ssw', [AdminSSWController::class, 'index'])->name('admin.ssw.index');
    Route::get('/admin/ssw/create', [AdminSSWController::class, 'create'])->name('admin.ssw.create');
    Route::post('/admin/ssw/store', [AdminSSWController::class, 'store'])->name('admin.ssw.store');
    Route::get('/admin/ssw/{id}/edit', [AdminSSWController::class, 'edit'])->name('admin.ssw.edit');
    Route::put('/admin/ssw/{id}', [AdminSSWController::class, 'update'])->name('admin.ssw.update');
    Route::delete('/admin/ssw/{id}', [AdminSSWController::class, 'destroy'])->name('admin.ssw.destroy');
    Route::patch('/admin/ssw/{id}/toggle-status', [AdminSSWController::class, 'toggleStatus'])->name('admin.ssw.toggleStatus');

    //routes for contacts
    Route::get('/admin/contacts', [AdminContactController::class, 'index'])->name('admin.contacts.index');
    Route::get('/admin/contacts/create', [AdminContactController::class, 'create'])->name('admin.contacts.create');
    Route::post('/admin/contacts/store', [AdminContactController::class, 'store'])->name('admin.contacts.store');
    Route::get('/admin/contacts/{id}/edit', [AdminContactController::class, 'edit'])->name('admin.contacts.edit');
    Route::put('/admin/contacts/{id}', [AdminContactController::class, 'update'])->name('admin.contacts.update');
    Route::delete('/admin/contacts/{id}', [AdminContactController::class, 'destroy'])->name('admin.contacts.destroy');
    Route::patch('/admin/contacts/{id}/toggle-status', [AdminContactController::class, 'toggleStatus'])->name('admin.contacts.toggleStatus');
});

// Override Jetstream's login route to ensure it redirects to the login page
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Redirect after logout to the home page
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logout');
