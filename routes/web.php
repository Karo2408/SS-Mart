<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\CustomerAddressController;
use App\Http\Controllers\Customer\ProfileController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/cities/{province_code}', function ($province_code) {
    return DB::table('indonesia_cities')->where('province_code', $province_code)->orderBy('name')->get();
});

Route::get('/districts/{city_code}', function ($city_code) {
    return DB::table('indonesia_districts')->where('city_code', $city_code)->orderBy('name')->get();
});

Route::get('/villages/{district_code}', function ($district_code) {
    return DB::table('indonesia_villages')->where('district_code', $district_code)->orderBy('name')->get();
});

// AUTH

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

// ADMIN

Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // USERS
        Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [AdminUserController::class, 'create'])->name('users.create');
        Route::post('/users', [AdminUserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit', [AdminUserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [AdminUserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [AdminUserController::class, 'destroy'])->name('users.destroy');

        // CATEGORIES
        Route::get('/categories', [AdminCategoryController::class, 'index'])->name('categories.index');
        Route::get('/categories/create', [AdminCategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories', [AdminCategoryController::class, 'store'])->name('categories.store');
        Route::get('/categories/{category}/edit', [AdminCategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/categories/{category}', [AdminCategoryController::class, 'update'])->name('categories.update');
        Route::delete('/categories/{category}', [AdminCategoryController::class, 'destroy'])->name('categories.destroy');

        // PRODUCTS
        Route::get('/products', [AdminProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
        Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('products.update');
        Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy');
    });

// CUSTOMER

Route::middleware('auth')->prefix('customer')->name('customer.')->group(function () {

        // PROFILE
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // CART
        Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
        Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
        Route::post('/cart/{item}/increase', [CartController::class, 'increase'])->name('cart.increase');
        Route::post('/cart/{item}/decrease', [CartController::class, 'decrease'])->name('cart.decrease');
        Route::delete('/cart/{item}', [CartController::class, 'remove'])->name('cart.remove');

        // ADDRESSES
        Route::get('/addresses', [CustomerAddressController::class, 'index'])->name('addresses.index');
        Route::get('/addresses/create', [CustomerAddressController::class, 'create'])->name('addresses.create');
        Route::post('/addresses', [CustomerAddressController::class, 'store'])->name('addresses.store');
        Route::get('/addresses/{id}/edit', [CustomerAddressController::class, 'edit'])->name('addresses.edit');
        Route::put('/addresses/{id}', [CustomerAddressController::class, 'update'])->name('addresses.update');
        Route::delete('/addresses/{id}', [CustomerAddressController::class, 'destroy'])->name('addresses.destroy');
        Route::put('/addresses/{id}/default', [CustomerAddressController::class, 'setDefault'])->name('addresses.default');
    });
