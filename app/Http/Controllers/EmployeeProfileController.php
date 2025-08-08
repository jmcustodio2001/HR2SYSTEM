<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeProfileController extends Controller
{
    private const REQUIRED_STRING = 'required|string';
    private const NULLABLE_STRING = 'nullable|string';

    // Show employee profile update form
    public function show(Request $request)
    {
        return view('employee.employee_module.profile_update');
    }

    // Handle employee profile update
    public function update(Request $request)
    {
        $data = $request->validate([
            'mobile_number' => self::REQUIRED_STRING,
            'email' => 'required|email',
            'address' => self::REQUIRED_STRING,
            'emergency_contact_name' => self::REQUIRED_STRING,
            'sss_number' => self::NULLABLE_STRING,
            'philhealth_number' => self::NULLABLE_STRING,
            'pagibig_number' => self::NULLABLE_STRING,
            'tin_number' => self::NULLABLE_STRING,
            'photo' => 'nullable|image|max:2048',
        ]);

        // Handle photo upload if present
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('profile_photos', 'public');
            $data['photo'] = $photoPath;
        }

        $user = Auth::user();
        $user->update($data);
        return redirect()->route('employee_module.profile')->with('success', 'Profile updated successfully.');
    }
}
