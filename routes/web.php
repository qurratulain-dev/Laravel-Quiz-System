<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;

// ================= HOME =================
Route::get('/', [UserController::class, 'home'])->name('home');

// ================= AUTH =================
Route::get('register', function () {
    return view('register');
})->name('register');

Route::view('login', 'admin_login')->name('login');

Route::controller(AuthController::class)->group(function(){
    Route::post('registerSave','register')->name('registerSave');
    Route::post('loginMatch', 'login')->name('loginMatch');
    Route::get('logout', 'logout')->name('logout')->middleware('auth');
});

// ================= USER =================
Route::middleware(['auth','role:user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user');
    })->name('user.dashboard');
});

// ================= CATEGORY (LOGIN REQUIRED) =================
Route::middleware('auth')->group(function () {
    Route::get('/categories/{category}/quizzes',
        [CategoryController::class, 'categoryQuizzes']
    )->name('categories.questions');
});

// ================= ADMIN =================
Route::middleware(['auth','role:admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class,'index'])
        ->name('admin.dashboard');

    Route::controller(CategoryController::class)->group(function(){
        Route::get('categories','index')->name('categories');
        Route::post('categories','store')->name('categories.store');
        Route::delete('categories/{id}', 'destroy')->name('categories.destroy');
    });

    Route::controller(QuizController::class)->group(function(){
        Route::get('quizzes/create','create')->name('quizzes.create');
        Route::post('quizzes', 'store')->name('quizzes.store');
    });

    Route::controller(QuestionController::class)->group(function(){
        Route::get('questions/create/{quiz}','create')->name('questions.create');
        Route::post('questions/{quiz}','store')->name('questions.store');
        Route::get('/quiz/{quiz}/questions','index')->name('questions.index');
        Route::get('/questions/{question}/edit', 'edit')->name('questions.edit');
        Route::put('/questions/{question}', 'update')->name('questions.update');
        Route::delete('/questions/{question}','destroy')->name('questions.destroy');
    });
});