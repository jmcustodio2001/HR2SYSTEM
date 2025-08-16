<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // extends Authenticatable for auth
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'employee_id'; // custom PK

    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone_number',
        'hire_date', 'department_id', 'position', 'status', 'password',
        'profile_picture'   // <-- add this here
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'hire_date' => 'date',
    ];
}


