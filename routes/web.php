<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController\DashboardController;
use App\Http\Controllers\AdminController\ServiceController;
use App\Http\Controllers\AdminController\WhyUsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Home route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Dashboard route, protected by authentication
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    //Routes for services
    Route::get('services', [ServiceController::class, 'index'])->name('services.index');
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
