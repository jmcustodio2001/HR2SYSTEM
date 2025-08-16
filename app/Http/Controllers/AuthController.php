<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    // Show admin login form
    public function showAdminLoginForm()
    {
        return view('admin_login');
    }

    // Show employee login form
    public function showEmployeeLoginForm()
    {
        return view('employee_ess_modules.employee_login');
    }

    // Admin login only
    public function admin_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            if (strtoupper($user->role) === 'ADMIN') {
                return redirect()->route('admin_dashboard')->with('success', 'Login successful');
            } else {
                Auth::logout();
                return redirect()->route('admin_login')->withErrors(['email' => 'Access denied. Admins only.']);
            }
        }
        return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }
}
