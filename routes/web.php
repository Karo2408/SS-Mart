<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerAddressController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| LARAVOLT LOOKUP (WAJIB DI LUAR AUTH)
|--------------------------------------------------------------------------
*/

Route::get('/cities/{province_code}', function ($province_code) {
    return DB::table('indonesia_cities')
        ->where('province_code', $province_code)
        ->orderBy('name')
        ->get();
});

Route::get('/districts/{city_code}', function ($city_code) {
    return DB::table('indonesia_districts')
        ->where('city_code', $city_code)
        ->orderBy('name')
        ->get();
});

Route::get('/villages/{district_code}', function ($district_code) {
    return DB::table('indonesia_villages')
        ->where('district_code', $district_code)
        ->orderBy('name')
        ->get();
});

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'is_admin'])->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    // Users
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/create', [UserController::class, 'create']);
    Route::post('/users', [UserController::class, 'store']);
    Route::get('/users/{user}/edit', [UserController::class, 'edit']);
    Route::put('/users/{user}', [UserController::class, 'update']);
    Route::delete('/users/{user}', [UserController::class, 'destroy']);

    // Categories
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/create', [CategoryController::class, 'create']);
    Route::post('/categories', [CategoryController::class, 'store']);
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit']);
    Route::put('/categories/{category}', [CategoryController::class, 'update']);
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);

    // Products
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/create', [ProductController::class, 'create']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products/{product}/edit', [ProductController::class, 'edit']);
    Route::put('/products/{product}', [ProductController::class, 'update']);
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);
});

/*
|--------------------------------------------------------------------------
| CUSTOMER
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add/{product}', [CartController::class, 'add']);
    Route::delete('/cart/{id}', [CartController::class, 'remove']);

    Route::get('/addresses', [CustomerAddressController::class, 'index']);
    Route::get('/addresses/create', [CustomerAddressController::class, 'create']);
    Route::post('/addresses', [CustomerAddressController::class, 'store']);
    Route::get('/addresses/{id}/edit', [CustomerAddressController::class, 'edit'])->name('addresses.edit');
    Route::put('/addresses/{id}', [CustomerAddressController::class, 'update'])->name('addresses.update');
    Route::put('/addresses/{id}/default', [CustomerAddressController::class, 'setDefault'])->name('addresses.default')->middleware('auth');
});
