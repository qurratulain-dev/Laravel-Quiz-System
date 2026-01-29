<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class UserController extends Controller
{
     // HOME PAGE (welcome)
    public function home()
    {
        $categories = Category::withCount('quizzes')->get();
        return view('welcome', compact('categories'));
    }

    // USER PAGE
    public function index(){
        $categories = Category::all();
        return view('user', compact('categories'));
    }
}
