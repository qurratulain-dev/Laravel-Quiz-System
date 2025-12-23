<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//route for admin login
Route::view('admin_login', 'admin_login');
//route to handle admin login
Route::post('admin_login', [App\Http\Controllers\AdminController::class, 'admin_login']);
//route for admin home
Route::view('admin_home', 'admin_home');