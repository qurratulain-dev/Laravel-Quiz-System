<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function admin_login(Request $request)
    {
        $request->validate(
            [
                "email" => "required|email",
                "password" => "required",
            ],
            [
                "email.required" => "Please enter email",
                "password.required" => "Please enter password",
            ]
        );

        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || $request->password != $admin->password) {
           return back()->withErrors([
    'credentials' => 'Please enter correct email or password'
]);

        }
        

        // SESSION SET
        session([
            'admin_id'    => $admin->id,
            'admin_email' => $admin->email,
        ]);

        // DASHBOARD
        return redirect('dashboard');
    }

    // categories page
    public function categories()
    {
        return view('categories');
    }
}
