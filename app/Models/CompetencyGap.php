<?php
// app/Models/CompetencyGap.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CompetencyLibrary; // Ensure you have this model imported

class CompetencyGap extends Model
{
    protected $fillable = [
        'employee_id', 'competency_id', 'required_level', 'current_level', 'gap'
    ];


    public function employee()
    {
        // Use Employee model and correct PK
        return $this->belongsTo(\App\Models\Employee::class, 'employee_id', 'employee_id');
    }

    public function competency()
    {
        return $this->belongsTo(CompetencyLibrary::class, 'competency_id', 'id');
    }
}
