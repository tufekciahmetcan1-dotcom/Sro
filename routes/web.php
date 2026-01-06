<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('seller')->group(function () {
    Route::get('/dashboard', [SellerController::class, 'dashboard'])->name('seller.dashboard');
    Route::get('/listings', [ListingController::class, 'index'])->name('seller.listings');
    Route::get('/orders', [SellerController::class, 'orders'])->name('seller.orders');
    Route::get('/earnings', [SellerController::class, 'earnings'])->name('seller.earnings');
    Route::get('/verification', [SellerController::class, 'verification'])->name('seller.verification');
    Route::get('/store-settings', [SellerController::class, 'storeSettings'])->name('seller.store-settings');
});

Route::get('/listings/create', [ListingController::class, 'create'])->name('listings.create');
Route::post('/listings', [ListingController::class, 'store'])->name('listings.store');

Route::prefix('admin')->group(function () {
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/moderation', [AdminController::class, 'moderation'])->name('admin.moderation');
    Route::get('/disputes', [AdminController::class, 'disputes'])->name('admin.disputes');
    Route::get('/commissions', [AdminController::class, 'commissions'])->name('admin.commissions');
    Route::get('/categories', [AdminController::class, 'categories'])->name('admin.categories');
});
