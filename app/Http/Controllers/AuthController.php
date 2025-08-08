<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    // Admin/Manager login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $response = null;

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            switch (strtoupper($user->role)) {
                case 'ADMIN':
                    $response = redirect()->route('dashboard_admin');
                    break;
                case 'EMPLOYEE':
                    Auth::logout();
                    $response = redirect()->route('admin-sign-in')->withErrors(['email' => 'Employees must log in through the employee portal.']);
                    break;
                default:
                    Auth::logout();
                    $response = redirect()->route('admin-sign-in')->withErrors(['email' => 'Unauthorized role.']);
                    break;
            }
            return $response;
        }
        return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    // Employee login
    public function loginEmployee(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            if (strtoupper($user->role) === 'EMPLOYEE') {
                return redirect()->route('employee_dashboard');
            } else {
                Auth::logout();
                return redirect()->route('employee-sign-in')->withErrors(['email' => 'Only employees can log in here.']);
            }
        }
        return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

}
