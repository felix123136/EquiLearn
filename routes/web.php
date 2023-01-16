<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about-us', [HomeController::class, 'aboutUs']);

Route::get('/courses', [CourseController::class, 'index']);

// Show Create Form
Route::get('/courses/new', [CourseController::class, 'create'])->middleware('admin');

// Store Course Data
Route::post('/courses', [CourseController::class, 'store'])->middleware('admin');

// Show Edit Form
Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->middleware('admin');

// Update Course
Route::put('/courses/{course}', [CourseController::class, 'update'])->middleware('admin');

// Delete Course
Route::delete('/courses/{course}', [CourseController::class, 'delete'])->middleware('admin');

// Show single course
Route::get('/courses/{course}', [CourseController::class, 'show']);

// Add Course to Cart
Route::post('/courses/{course}/add-to-cart', [CourseController::class, 'addToCart'])->name('courses.add-to-cart')->middleware('member');

// Show Add Category Form
Route::get('/categories/new', [CategoryController::class, 'create'])->middleware('admin');

// Store Category Data
Route::post('/categories', [CategoryController::class, 'store'])->middleware('admin');

// Show Register Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->middleware('guest');

// Show User Profile
Route::get('/users/{user}', [UserController::class, 'show'])->middleware('auth');

// Show Edit Profile Form
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('auth');

// Update User Profile
Route::put('/users/{user}', [UserController::class, 'update'])->middleware('auth');

// Show Cart Page
Route::get('/cart', [CartController::class, 'index'])->middleware('member');

// Update Cart Value
Route::post('/cart/{course}', [CartController::class, 'update'])->middleware('member');

// Show Checkout Page
Route::get('/checkout', [CartController::class, 'checkout'])->middleware('member');

// Confirm checkout
Route::post('/checkout/confirm', [CartController::class, 'confirm'])->middleware('member');

// Show Transaction Page
Route::get('/transactions', [TransactionController::class, 'index'])->middleware('member');
