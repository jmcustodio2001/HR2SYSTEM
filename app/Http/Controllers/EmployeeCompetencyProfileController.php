<?php

namespace App\Http\Controllers;

use App\Models\EmployeeCompetencyProfile;
use App\Models\Employee;
use App\Models\CompetencyLibrary;
use Illuminate\Http\Request;

class EmployeeCompetencyProfileController extends Controller
{
    public function index()
    {
        $profiles = EmployeeCompetencyProfile::with(['employee', 'competency'])->orderBy('id')->get();
        $employees = Employee::all();
        $competencylibrary = CompetencyLibrary::all();
return view('competency_management.employee_competency_profiles', compact('profiles', 'employees', 'competencylibrary'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,employee_id',
            'competency_id' => 'required|exists:competency_library,id',
            'proficiency_level' => 'required|string|max:255',
            'assessment_date' => 'required|date',
        ]);

        EmployeeCompetencyProfile::create($validated);

        return redirect()->route('employee_competency_profiles.index')->with('success', 'Profile added successfully!');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'employee_id' => 'required|exists:employees,employee_id',
            'competency_id' => 'required|exists:competency_library,id',
            'proficiency_level' => 'required|string|max:255',
            'assessment_date' => 'required|date',
        ]);

        $profile = EmployeeCompetencyProfile::findOrFail($id);
        $profile->update($validated);

        return redirect()->route('employee_competency_profiles.index')->with('success', 'Profile updated successfully!');
    }

    public function destroy($id)
    {
        $profile = EmployeeCompetencyProfile::findOrFail($id);
        $profile->delete();

        return redirect()->route('employee_competency_profiles.index')->with('success', 'Profile deleted successfully!');
    }
}
