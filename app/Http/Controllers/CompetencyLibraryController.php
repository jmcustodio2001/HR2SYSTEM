<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompetencyLibrary;
use App\Models\Employee;
use App\Models\CompetencyGap;

class CompetencyLibraryController extends Controller
{
    private const NULLABLE_STRING = 'nullable|string';

    public function index()
    {
        $competencies = CompetencyLibrary::orderBy('id', 'desc')->get();
        $employees = Employee::all();
        $gaps = CompetencyGap::with(['employee', 'competency'])->get();

        return view('competency_management.competency_library', compact(
            'competencies',
            'employees',
            'gaps'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'competency_name' => 'required|string|max:255',
            'description' => self::NULLABLE_STRING,
            'category' => self::NULLABLE_STRING,
            'rate' => 'required|integer|min:1|max:5', // ✅ Added validation for rate
        ]);

        CompetencyLibrary::create($request->all());
        return redirect()->route('competency_library.index')->with('success', 'Competency added successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'competency_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'nullable|string',
            'rate' => 'required|integer|min:1|max:5', // ✅ Added validation for rate
        ]);

        $competency = CompetencyLibrary::findOrFail($id);
        $competency->update($request->all());
        return redirect()->route('competency_library.index')->with('success', 'Competency updated successfully!');
    }

    public function destroy($id)
    {
        $competency = CompetencyLibrary::findOrFail($id);
        $competency->delete();
        return redirect()->route('competency_library.index')->with('success', 'Competency deleted successfully!');
    }
}
