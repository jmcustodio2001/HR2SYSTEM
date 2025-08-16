<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeAuthController;
use App\Http\Controllers\EmployeeProfileController;
use App\Http\Controllers\CompetencyLibraryController;
use App\Http\Controllers\EmployeeCompetencyProfileController;
use App\Http\Controllers\CompetencyGapAnalysisController;
// --- Admin routes ---
Route::get('/admin_login', [AuthController::class, 'showAdminLoginForm'])->name('admin_login');
Route::post('/admin_login', [AuthController::class, 'admin_login'])->name('admin_login.post');

Route::get('/admin/dashboard', function () {
    return view('admin_dashboard');
})->name('admin_dashboard');

Route::post('/admin/logout', function () {
    Auth::logout();
    return redirect()->route('admin_login');
})->name('admin_logout');

// --- Employee routes ---
// Login / Logout
Route::get('/employee_login', [EmployeeAuthController::class, 'showLoginForm'])->name('employee_portal.employee_login');
Route::post('/employee_login', [EmployeeAuthController::class, 'login'])->name('employee_portal.employee_login.post');
Route::post('/employee_logout', [EmployeeAuthController::class, 'logout'])->name('employee_portal.employee_logout');

// Dashboard
Route::get('/employee_dashboard', function () {
    return view('employee_ess_modules.employee_dashboard');
})->middleware('auth:employee')->name('employee_portal.employee_dashboard');

// Profile Picture Upload
Route::post('/employee/profile-picture-upload', [EmployeeProfileController::class, 'uploadPicture'])
    ->middleware('auth:employee')
    ->name('employee.profile.picture.upload');

// Fallback login route
Route::get('/login', function () {
    return redirect()->route('employee_portal.employee_login');
})->name('login');

// Competency Library Resource Routes
Route::resource('competency_library', CompetencyLibraryController::class);

// Employee Competency Profile Routes
Route::resource('employee_competency_profiles', EmployeeCompetencyProfileController::class);

// Competency Gap Analysis Routes
Route::resource('competency_gap_analysis', CompetencyGapAnalysisController::class);
Route::post('competency_gap_analysis/export', [CompetencyGapAnalysisController::class, 'export'])->name('competency_gap_analysis.export');

// --- Course Management Route (UI only, no DB yet) ---
Route::get('/courses', function () {
    $courses = [
        (object)[
            'id' => 1,
            'course_name' => 'Introduction to Programming',
            'description' => 'Basic programming concepts and logic building.',
            'category' => 'Computer Science',
            'duration' => '3 Months',
            'status' => 'Active'
        ],
        (object)[
            'id' => 2,
            'course_name' => 'Business Communication',
            'description' => 'Effective communication in a business environment.',
            'category' => 'Business',
            'duration' => '2 Months',
            'status' => 'Inactive'
        ]
    ];
    return view('learning_management.course_management', compact('courses'));
})->name('course_management');

// Employee Training Management (UI only, no DB yet)
Route::get('/employee/training', function () {
    // Sample data for preview
    $trainings = [
        (object)[
            'id' => 1,
            'employee_id' => 101,
            'course_id' => 1,
            'status' => 'Ongoing',
            'start_date' => '2025-08-01',
            'end_date' => '2025-10-01'
        ],
        (object)[
            'id' => 2,
            'employee_id' => 102,
            'course_id' => 2,
            'status' => 'Completed',
            'start_date' => '2025-05-01',
            'end_date' => '2025-07-01'
        ]
    ];

    // Sample employees & courses for dropdowns
    $employees = [
        (object)['employee_id' => 101, 'name' => 'John Doe'],
        (object)['employee_id' => 102, 'name' => 'Jane Smith']
    ];

    $courses = [
        (object)['id' => 1, 'course_name' => 'Introduction to Programming'],
        (object)['id' => 2, 'course_name' => 'Business Communication']
    ];

    return view('learning_management.employee_training_dashboard', compact('trainings', 'employees', 'courses'));
})->name('employee_training_dashboard');

// Employee Training Certificate Tracking (UI only)
Route::get('/employee/training-certificates', function () {
    // Sample employees
    $employees = [
        (object)['employee_id' => 101, 'name' => 'John Doe'],
        (object)['employee_id' => 102, 'name' => 'Jane Smith']
    ];

    // Sample courses
    $courses = [
        (object)['id' => 1, 'course_name' => 'Introduction to Programming'],
        (object)['id' => 2, 'course_name' => 'Business Communication']
    ];

    // Sample certificate records
    $certificates = [
        (object)[
            'id' => 1,
            'employee_id' => 101,
            'course_id' => 1,
            'certificate_url' => 'https://example.com/certificates/cert101.pdf',
            'issue_date' => '2025-06-01',
            'expiry_date' => '2027-06-01'
        ],
        (object)[
            'id' => 2,
            'employee_id' => 102,
            'course_id' => 2,
            'certificate_url' => 'https://example.com/certificates/cert102.pdf',
            'issue_date' => '2025-05-15',
            'expiry_date' => '2027-05-15'
        ]
    ];

    return view('learning_management.training_record_certificate_tracking', compact('employees', 'courses', 'certificates'));
})->name('training_certificates');

// --- Customer Service Sales Skills Training (UI only) ---
Route::get('/employee/customer-service-sales-skills-training', function () {
    // Sample employees
    $employees = [
        (object)['employee_id' => 201, 'first_name' => 'Michael', 'last_name' => 'Jordan'],
        (object)['employee_id' => 202, 'first_name' => 'Serena', 'last_name' => 'Williams']
    ];

    // Sample trainings
    $trainings = [
        (object)['id' => 1, 'training_name' => 'Customer Service Basics'],
        (object)['id' => 2, 'training_name' => 'Advanced Sales Skills']
    ];

    // Sample records
    $records = [
        (object)[
            'id' => 1,
            'employee' => (object)['first_name' => 'Michael', 'last_name' => 'Jordan'],
            'training' => (object)['id' => 1, 'training_name' => 'Customer Service Basics'],
            'date_completed' => '2025-08-10'
        ],
        (object)[
            'id' => 2,
            'employee' => (object)['first_name' => 'Serena', 'last_name' => 'Williams'],
            'training' => (object)['id' => 2, 'training_name' => 'Advanced Sales Skills'],
            'date_completed' => '2025-08-12'
        ]
    ];

    return view('training_management.customer_service_sales_skills_training', compact('employees', 'trainings', 'records'));
})->name('customer_service_sales_skills_training');

// Destination Knowledge Training UI (No DB, just view)
Route::get('/destination-knowledge-training', function () {
    // Sample static data to test UI only
    $trainings = [
        (object)[
            'training_id' => 1,
            'training_name' => 'Asia Destinations Overview',
            'training_description' => 'Covers major tourist spots in Asia',
            'status' => 'Active',
            'created_at' => '2025-08-14'
        ],
        (object)[
            'training_id' => 2,
            'training_name' => 'Europe Destinations Deep Dive',
            'training_description' => 'Detailed cultural and travel information about Europe',
            'status' => 'Inactive',
            'created_at' => '2025-08-10'
        ]
    ];

    return view('training_management.destination_knowledge_training', compact('trainings'));
})->name('destination_knowledge_training');

// POTENTIAL SUCCESSOR

Route::get('/potential-successor', function () {
    return view('succession_planning.potential_successor'); // This should be your Blade file path
})->name('potential_successor');

// Succession Readiness Rating UI only (no DB)
Route::get('/succession-readiness-rating', function () {
    return view('succession_planning.succession_readiness_rating'); // This should be your Blade file path
})->name('succession_readiness_rating');

// Succession Planning Dashboard UI only (no DB)
Route::get('/succession-planning-dashboard', function () {
    // Static sample data for viewing only
    $dashboards = [
        [
            'dashboard_id' => 1,
            'position' => 'Sales Manager',
            'successor' => 'John Doe',
            'readiness' => 'Ready Now',
            'simulation_result' => 'Pass',
            'last_updated' => '2025-08-01'
        ],
        [
            'dashboard_id' => 2,
            'position' => 'HR Officer',
            'successor' => 'Jane Smith',
            'readiness' => 'Ready in 1-2 Years',
            'simulation_result' => 'Needs Improvement',
            'last_updated' => '2025-07-20'
        ]
    ];

    return view('succession_planning.succession_planning_dashboard_simulation_tools', [
        'dashboards' => $dashboards
    ]);
})->name('succession_planning_dashboard');
