<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductStockController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ReviewController;

// Redirect root to login
Route::get('/', function () {
    return redirect()->route('login');
});

// Guest Routes (Login & Registration)
Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.post');
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register'])->name('register.post');
});

// Protect Front Office Routes (Users)
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/home', [App\Http\Controllers\Front\HomeController::class, 'index'])->name('home');
    // Restaurant Routes
    Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants.index'); // View user restaurants
    Route::get('/restaurants/all', [RestaurantController::class, 'allRestaurants'])->name('restaurants.all'); // View all restaurants
    Route::get('/restaurants/create', [RestaurantController::class, 'create'])->name('restaurants.create'); // Form to apply as a restaurant partner
    Route::post('/restaurants', [RestaurantController::class, 'store'])->name('restaurants.store'); // Store restaurant details
    Route::get('/restaurants/{id}', [RestaurantController::class, 'show'])->name('restaurants.show'); // View single restaurant details
    Route::get('/restaurants/{id}/edit', [RestaurantController::class, 'edit'])->name('restaurants.edit'); // Form to edit restaurant
    Route::put('/restaurants/{id}', [RestaurantController::class, 'update'])->name('restaurants.update'); // Update restaurant details
    Route::delete('/restaurants/{id}', [RestaurantController::class, 'destroy'])->name('restaurants.destroy'); // Delete restaurant

    Route::get('/donations', [DonationController::class, 'index'])->name('donations.index'); // View user restaurants
    Route::get('/donations/create', [DonationController::class, 'create'])->name('donations.create'); // Form to apply as a restaurant partner
    Route::post('/donations', [DonationController::class, 'store'])->name('donations.store'); // Store restaurant details
    Route::get('/donations/{id}', [DonationController::class, 'show'])->name('donations.show'); // View single restaurant details
    Route::get('/donations/{id}/edit', [DonationController::class, 'edit'])->name('donations.edit'); // Form to edit restaurant
    Route::put('/donations/{id}', [DonationController::class, 'update'])->name('donations.update'); // Update restaurant details
    Route::delete('/donations/{id}', [DonationController::class, 'destroy'])->name('donations.destroy'); // Delete restaurant
    
    Route::get('reviews', [ReviewController::class, 'index'])->name('reviews.index'); 
    Route::put('reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update'); 
    Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('reviews/{id}/edit', [ReviewController::class, 'edit'])->name('reviews.edit'); 
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

});

// Protect Admin (Back Office) Routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Back\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class);

    Route::get('donations', [DonationController::class, 'adminIndex'])->name('admin.donations.index'); 
    Route::get('donations/{id}/edit', [DonationController::class, 'adminEdit'])->name('admin.donations.edit'); 
    Route::put('donations/{id}', [DonationController::class, 'adminUpdate'])->name('admin.donations.update'); 
    
    Route::get('reviews', [ReviewController::class, 'adminIndex'])->name('admin.reviews.index'); 
    Route::delete('/reviews/{id}', [ReviewController::class, 'adminDestroy'])->name('admin.reviews.destroy'); 

});

// Logout route for both users and admins
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::resource('products', ProductController::class);

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::resource('product_stocks', \App\Http\Controllers\ProductStockController::class);
