<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;

// Home page
Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/user', [UserController::class,'index']);


// ================= AUTH ROUTES =================

// Register page
Route::get('register', function () {
    return view('register');
})->name('register');

// Login page
Route::view('login', 'admin_login')->name('login');

Route::controller(AuthController::class)->group(function(){
    // Register submit
    Route::post('registerSave','register')->name('registerSave');

    // Login submit
    Route::post('loginMatch', 'login')->name('loginMatch');

    // Logout
    Route::get('logout', 'logout')->name('logout')->middleware(['auth']);
});

// ================= PROTECTED ROUTES =================
Route::middleware(['auth'])->group(function(){

    // ---------------- Admin Routes ----------------
 Route::prefix('admin')->middleware(['role:admin'])->group(function () {
 Route::get('/dashboard', [DashboardController::class,'index'])
        ->name('admin.dashboard');


        // Categories
        Route::controller(CategoryController::class)->group(function(){
            Route::get('categories','index')->name('categories');
            Route::post('categories','store')->name('categories.store');
            Route::delete('categories/{id?}', 'destroy')->name('categories.destroy');
            Route::get('/categories/{category}/quizzes', 'categoryQuizzes')->name('categories.questions');
        });

        // Quizzes
        Route::controller(QuizController::class)->group(function(){
            Route::get('quizzes/create','create')->name('quizzes.create');
            Route::post('quizzes', 'store')->name('quizzes.store');
        });

        // Questions
        Route::controller(QuestionController::class)->group(function(){
            Route::get('questions/create/{quiz}','create')->name('questions.create');
            Route::post('questions/{quiz}','store')->name('questions.store');
            Route::get('/quiz/{quiz}/questions','index')->name('questions.index');
            Route::get('/questions/{question}/edit', 'edit')->name('questions.edit');
            Route::put('/questions/{question}', 'update')->name('questions.update');
            Route::delete('/questions/{question}','destroy')->name('questions.destroy');
        });
    });

    // ---------------- User Routes ----------------
    Route::middleware(['role:user'])->group(function () {
        Route::get('/user/dashboard', function () {
            return view('user');
        })->name('user.dashboard');
        
    });

});
