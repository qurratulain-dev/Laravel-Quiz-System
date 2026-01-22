<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $categories=category::all();
        return view('user',compact('categories'));
    }
}
