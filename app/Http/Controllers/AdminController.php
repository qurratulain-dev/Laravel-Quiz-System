<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function admin_login(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();

        if ($admin && $request->password == $admin->password) {
            return redirect('/admin_home');
        }

        return back()->withErrors(['error' => 'Invalid credentials']);
    }
}
