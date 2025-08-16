<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jetlouge Travels - Agent Portal</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/employee_dashboard-style.css') }}">


</head>
<body style="background-color: #f8f9fa !important;">

  <!-- Employee Topbar -->
  @include('employee_ess_modules.partials.employee_topbar')

  <!-- Employee Sidebar -->
  @include('employee_ess_modules.partials.employee_sidebar')

  <!-- Overlay for mobile -->
  <div id="overlay" class="position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-50" style="z-index:1040; display: none;"></div>

  <!-- Main Content -->
  <main id="main-content">
    <!-- Page Header -->
    <div class="page-header-container mb-4">
      <div class="d-flex justify-content-between align-items-center page-header">
        <div class="d-flex align-items-center">
          <div class="dashboard-logo me-3">
            <img src="{{ asset('assets/images/jetlouge_logo.png') }}" alt="Jetlouge Travels" class="logo-img">
          </div>
          <div>
            <h2 class="fw-bold mb-1">Employee Portal</h2>
            <p class="text-muted mb-0">
              @php
                $hour = (int)date('H');
                if ($hour >= 5 && $hour < 12) {
                  $greeting = 'Good morning';
                } elseif ($hour >= 12 && $hour < 6) {
                  $greeting = 'Good afternoon';
                } else {
                  $greeting = 'Good evening';
                }
              @endphp
              <h1>
    {{ $greeting }}, {{ trim(Auth::user()->first_name . ' ' . Auth::user()->last_name) ?: 'Employee' }}!
</h1>
            </p>
          </div>
        </div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="{{ route('employee_portal.employee_dashboard') }}" class="text-decoration-none">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Agent Dashboard</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>

    <!-- Statistics Cards -->
 <!-- Statistics Cards -->
<div class="row g-4 mb-4">
  <div class="col-md-3">
    <div class="card stat-card shadow-sm border-0">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="stat-icon bg-primary bg-opacity-10 text-primary me-3">
            <i class="bi bi-calendar-event"></i>
          </div>
          <div>
            <h3 class="fw-bold mb-0">12</h3>
            <p class="text-muted mb-0 small">Pending Leave Requests</p>
            <small class="text-success">+3 from last week</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card stat-card shadow-sm border-0">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="stat-icon bg-success bg-opacity-10 text-success me-3">
            <i class="bi bi-clock-history"></i>
          </div>
          <div>
            <h3 class="fw-bold mb-0">98%</h3>
            <p class="text-muted mb-0 small">Attendance This Month</p>
            <small class="text-success">+2% from last month</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card stat-card shadow-sm border-0">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="stat-icon bg-warning bg-opacity-10 text-warning me-3">
            <i class="bi bi-receipt"></i>
          </div>
          <div>
            <h3 class="fw-bold mb-0">₱28,500</h3>
            <p class="text-muted mb-0 small">Latest Payslip</p>
            <small class="text-muted">July 2025</small>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card stat-card shadow-sm border-0">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="stat-icon bg-info bg-opacity-10 text-info me-3">
            <i class="bi bi-journal-text"></i>
          </div>
          <div>
            <h3 class="fw-bold mb-0">3</h3>
            <p class="text-muted mb-0 small">Upcoming Trainings</p>
            <small class="text-primary">Starts next week</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Recent Activity & Quick Actions -->
<div class="row g-4">
  <div class="col-lg-8">
    <div class="card shadow-sm border-0">
      <div class="card-header border-bottom">
        <h5 class="card-title mb-0">Recent Requests</h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead class="table-light">
              <tr>
                <th>Type</th>
                <th>Date Submitted</th>
                <th>Status</th>
                <th>Remarks</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Leave Application</td>
                <td>Aug 5, 2025</td>
                <td><span class="badge bg-success">Approved</span></td>
                <td>Vacation leave</td>
              </tr>
              <tr>
                <td>Attendance Adjustment</td>
                <td>Aug 3, 2025</td>
                <td><span class="badge bg-warning">Pending</span></td>
                <td>Forgot to log out</td>
              </tr>
              <tr>
                <td>Request Form</td>
                <td>Aug 1, 2025</td>
                <td><span class="badge bg-info">Processing</span></td>
                <td>Equipment request</td>
              </tr>
              <tr>
                <td>Training Enrollment</td>
                <td>Jul 28, 2025</td>
                <td><span class="badge bg-success">Confirmed</span></td>
                <td>Leadership workshop</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card shadow-sm border-0">
      <div class="card-header border-bottom">
        <h5 class="card-title mb-0">Quick Actions</h5>
      </div>
      <div class="card-body">
        <div class="d-grid gap-2">
          <button class="btn btn-primary">
            <i class="bi bi-calendar-plus me-2"></i> Apply for Leave
          </button>
          <button class="btn btn-outline-primary">
            <i class="bi bi-clock me-2"></i> Log Attendance
          </button>
          <button class="btn btn-outline-primary">
            <i class="bi bi-receipt me-2"></i> View Payslip
          </button>
          <button class="btn btn-outline-secondary">
            <i class="bi bi-file-earmark-text me-2"></i> Submit Request Form
          </button>
        </div>
      </div>
    </div>

    <div class="card shadow-sm border-0 mt-4">
      <div class="card-header border-bottom">
        <h5 class="card-title mb-0">My Progress</h5>
      </div>
      <div class="card-body">
        <div class="mb-3">
          <div class="d-flex justify-content-between align-items-center mb-1">
            <span class="small">Competency Goals</span>
            <span class="small text-muted">8 / 10</span>
          </div>
          <div class="progress" style="height: 8px;">
            <div class="progress-bar" style="width: 80%"></div>
          </div>
          <small class="text-muted">80% achieved</small>
        </div>
        <div class="mb-3">
          <div class="d-flex justify-content-between align-items-center mb-1">
            <span class="small">Trainings Completed</span>
            <span class="small text-muted">5 / 7</span>
          </div>
          <div class="progress" style="height: 8px;">
            <div class="progress-bar bg-success" style="width: 71%"></div>
          </div>
          <small class="text-muted">71% completed</small>
        </div>
        <div>
          <div class="d-flex justify-content-between align-items-center mb-1">
            <span class="small">Attendance Rate</span>
            <span class="small text-muted">98%</span>
          </div>
          <div class="progress" style="height: 8px;">
            <div class="progress-bar bg-warning" style="width: 98%"></div>
          </div>
          <small class="text-muted">Excellent</small>
        </div>
      </div>
    </div>
  </div>
</div>

  </main>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="agent-portal-script.js"></script>

</body>
</html>
