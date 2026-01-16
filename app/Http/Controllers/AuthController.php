<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
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

    return redirect()
        ->route('login')
        ->with('success', 'Registration successful. Please login.');
}

    // login function
    public function login(Request $request)
    {
        $credentials = $request->validate(
            [
                "email"    => "required|email",
                "password" => "required",
            ]);
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'credentials' => 'Please enter correct email or password',
        ]);
    }
    // logout function
     public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
