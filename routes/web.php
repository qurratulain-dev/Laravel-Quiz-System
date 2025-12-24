<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});


// ================= ADMIN ROUTES GROUP =================
Route::group([], function () {

    Route::view('admin_login', 'admin_login');
    Route::post('admin_login', [App\Http\Controllers\AdminController::class, 'admin_login']);

    Route::get('dashboard', function () {
        if (!session()->has('admin_id')) {
            return redirect('admin_login');
        }
        return view('dashboard');
    });

    Route::get('categories', function () {
        if (!session()->has('admin_id')) {
            return redirect('admin_login');
        }
        return view('categories');
    });

    Route::get('logout', function () {
        session()->forget(['admin_id','admin_email']);
        return redirect('admin_login');
    });

});

