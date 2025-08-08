<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
// Dashboard module routes
Route::prefix('dashboard')->group(function () {
    Route::view('/competency', 'dashboard_admin.competency')->name('dashboard.competency');
    Route::view('/learning', 'dashboard_admin.learning')->name('dashboard.learning');
    Route::view('/training', 'dashboard_admin.training')->name('dashboard.training');
    Route::view('/self-service', 'dashboard_admin.self-service')->name('dashboard.self-service');
    Route::view('/succession', 'dashboard_admin.succession')->name('dashboard.succession');
});


// Admin Sign In Page Route
Route::get('/', fn () => view('dashboard_admin.admin-sign-in'))->name('sign-in');
// For backward compatibility, also name this route 'admin-sign-in'
Route::get('/admin-sign-in', function () {
    return view('dashboard_admin.admin-sign-in');
})->name('admin-sign-in');
// Handle admin login POST
Route::post('/admin-sign-in', [AuthController::class, 'login']);

Route::get('/dashboard_admin', function () {
    if (!Auth::check() || strtoupper(Auth::user()->role) !== 'ADMIN') {
        return redirect()->route('admin-sign-in')->withErrors(['email' => 'You must be an admin to access this portal.']);
    }
    return view('dashboard_admin.dashboard_admin');
})->name('dashboard_admin');


// Employee sign-in page
Route::get('/employee-sign-in', function () {
    return view('employee.employee-sign-in');
})->name('employee-sign-in');


// Employee dashboard page
Route::get('/employee_dashboard', function () {
    if (!Auth::check() || strtoupper(Auth::user()->role) !== 'EMPLOYEE') {
        return redirect()->route('employee-sign-in')->withErrors(['email' => 'You must be an employee to access this portal.']);
    }
    return view('employee.employee_dashboard');
})->name('employee_dashboard');
// Employee login POST
Route::post('/employee-sign-in', [AuthController::class, 'loginEmployee'])->name('employee.login');

// Employee Profile Module
use App\Http\Controllers\EmployeeProfileController;
Route::get('/employee/profile', [EmployeeProfileController::class, 'show'])->name('employee_module.profile');
Route::put('/employee/profile', [EmployeeProfileController::class, 'update'])->name('employee_module.profile.update');



