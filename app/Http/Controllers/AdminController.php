<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class AdminController extends Controller
{
    // register function
    public function register(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:admins,email',
            'password' => 'required|confirmed',
        ]);

        Admin::create($data);

        return redirect()->route('login');
    }

    // login function
    public function login(Request $request)
    {
        $credentials = $request->validate(
            [
                "email"    => "required|email",
                "password" => "required",
            ],
            [
                "email.required"    => "Please enter email",
                "password.required" => "Please enter password",
            ]
        );
        if (Auth::attempt($credentials)) {
            return redirect('dashboard');
        }

        return back()->withErrors([
            'credentials' => 'Please enter correct email or password',
        ]);
    }

    // dashboard page
    public function dashboardPage()
    {
        return view('dashboard');
    }

    // logout function
     public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
 // categories page
    public function categories()
    {
        $categories = Category::latest()->get();
        return view('categories', compact('categories'));
    }

    // add category
    public function addCategory(Request $request)
    {
        $request->validate([
            'category' => 'required|string|unique:categories,name|max:255',
        ], [
            'category.unique' => 'same name category already exists',
        ]);

        Category::create([
            'name'    => $request->category,
            'creator' => Auth::user()->name, 
        ]);

        return redirect()
            ->route('categories')
            ->with('success', 'Category added successfully');
    }
    public function deleteCategory($id)
{
    $category = Category::findOrFail($id);
    $category->delete();

    return redirect()->route('categories')->with('success', 'Category deleted successfully');
}

}
