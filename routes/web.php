<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\ValidAdmin;

Route::get('/', function () {
    return view('welcome');
});

// ================= ADMIN ROUTES =================

Route::group([], function () {

    // Register
    Route::get('register', function () {
        return view('register');
    })->name('register');

    Route::post('registerSave', [AdminController::class, 'register'])
        ->name('registerSave');

    // Login page;
Route::view('admin_login', 'admin_login')->name('login');
// Login submit (POST)
Route::post('loginMatch', [AdminController::class, 'login'])
    ->name('loginMatch');



//     /// middleware protected routes group
//     Route::middleware([ValidAdmin::class])->group(function () {
//         Route::get('dashboard', [AdminController::class, 'dashboardPage'])
//     ->name('dashboard');
// // Categories page
//    Route::get('categories', [AdminController::class, 'categories'])
//         ->name('categories');
//     });



// Dashboard page
Route::get('dashboard', [AdminController::class, 'dashboardPage'])
    ->name('dashboard')->Middleware(["auth"]);
// Categories page
   Route::get('categories', [AdminController::class, 'categories'])
        ->name('categories')->Middleware(["auth"]);
   Route::post('categories', [AdminController::class, 'addCategory'])
        ->name('addCategory') ->Middleware(["auth"]);
    Route::delete('categories/{id}', [AdminController::class, 'deleteCategory'])
    ->name('deleteCategory')
    ->middleware(['auth']);
    

// Logout
    Route::get('logout', [AdminController::class, 'logout'])
        ->name('logout');
});