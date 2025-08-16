<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompetencyGap;
use App\Models\Employee;
use App\Models\CompetencyLibrary;

class CompetencyGapAnalysisController extends Controller
{
    public function index()
    {
        // Eager load related employee and competency to avoid N+1 problem
        $gaps = CompetencyGap::with(['employee', 'competency'])->get();
        $employees = Employee::all();
        $competencies = CompetencyLibrary::all();

        return view('competency_management.competency_gap', compact('gaps', 'employees', 'competencies'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            // Use correct PK for employees table
            'employee_id'    => 'required|exists:employees,employee_id',
            'competency_id'  => 'required|exists:competency_library,id',
            'required_level' => 'required|integer|min:1|max:5',
            'current_level'  => 'required|integer|min:1|max:5',
            'gap'            => 'required|integer',
        ]);

        CompetencyGap::create($validated);

        return redirect()->back()->with('success', 'Gap record added!');
    }

    public function update(Request $request, $id)
    {
        $gap = CompetencyGap::findOrFail($id);

        $validated = $request->validate([
            'employee_id'    => 'required|exists:employees,employee_id',
            'competency_id'  => 'required|exists:competency_library,id',
            'required_level' => 'required|integer|min:1|max:5',
            'current_level'  => 'required|integer|min:1|max:5',
            'gap'            => 'required|integer',
        ]);

        $gap->update($validated);

        return redirect()->back()->with('success', 'Gap record updated!');
    }

    public function destroy($id)
    {
        $gap = CompetencyGap::findOrFail($id);
        $gap->delete();

        return redirect()->back()->with('success', 'Gap record deleted!');
    }

    // Export gaps to CSV
    public function export()
    {
        $gaps = CompetencyGap::with(['employee', 'competency'])->get();

        $filename = 'competency_gaps_' . date('Ymd_His') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$filename",
        ];

        $columns = [
            'ID', 'Employee', 'Competency', 'Rate', 'Required Level', 'Current Level', 'Gap'
        ];

        $callback = function() use ($gaps, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
            foreach ($gaps as $gap) {
                fputcsv($file, [
                    $gap->id,
                    $gap->employee ? ($gap->employee->first_name . ' ' . $gap->employee->last_name) : 'N/A',
                    $gap->competency ? $gap->competency->competency_name : 'N/A',
                    $gap->competency ? $gap->competency->rate : 'N/A',
                    $gap->required_level,
                    $gap->current_level,
                    $gap->gap,
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
