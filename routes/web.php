<?php

use App\Http\Controllers\CartController;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Livewire\Cart;

Route::get('/', [FrontController::class, 'index'])->name('homepage');

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/profile/{id}', [FrontController::class, 'profile'])->name('profile')->middleware('auth');
Route::get('/profile/{id}/update', [FrontController::class, 'updateProfile'])->name('updateProfile')->middleware('auth');

Route::post('/reviews/{productId}', [ReviewController::class, 'store'])->name('reviews.store')->middleware('auth');

Route::get('/search', [FrontController::class, 'search'])->name('search');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');