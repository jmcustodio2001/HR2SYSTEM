<!-- Employee Sidebar -->
<aside id="sidebar" class="bg-white border-end p-3 shadow-sm">
  <!-- Profile Section -->
  <div class="profile-section text-center">
    <img src="{{ Auth::user()->profile_picture
    ? asset('storage/' . Auth::user()->profile_picture)
    : asset('images/default-profile.png') }}"
    alt="Agent Profile"
    class="profile-img mb-2">
    <h6 class="fw-semibold mb-1">
      {{ trim(Auth::user()->first_name . ' ' . Auth::user()->last_name) ?: 'Employee' }}
    </h6>
    <p class="text-muted">{{ Auth::user()->position ?? 'Position not set' }}</p>
    <div class="mt-2">
      <small class="badge
      {{
          Auth::user()->status == 'Online' ? 'bg-success' :
          (Auth::user()->status == 'Offline' ? 'bg-secondary' :
          (Auth::user()->status == 'Inactive' ? 'bg-danger' : 'bg-info'))
      }}">
        {{ Auth::user()->status ?? 'Unknown' }}
      </small>

      <small class="text-muted d-block mt-1">
        Employee ID: {{ Auth::user()->employee_id ?? 'N/A' }}
      </small>
    </div>
  </div>
  <!-- Navigation Menu -->
  <ul class="nav flex-column">
    <li class="nav-item">
      <a href="#" class="nav-link active">
        <i class="bi bi-speedometer2 me-2"></i> Dashboard
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('employee_leave') }}" class="nav-link">
        <i class="bi bi-calendar-event me-2"></i> Leave Application & Balance
      </a>
    </li>

    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="bi bi-clock-history me-2"></i> Attendance & Time Logs
      </a>
    </li>

    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="bi bi-receipt me-2"></i> Payslip Access
      </a>
    </li>

    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="bi bi-file-earmark-text me-2"></i> Request Forms
      </a>
    </li>

    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="bi bi-journal-text me-2"></i> My Trainings
      </a>
    </li>

    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="bi bi-bar-chart-line me-2"></i> Competency Tracker
      </a>
    </li>

    <li class="nav-item mt-3">
      <a href="{{ route('employee_portal.employee_login') }}" class="nav-link text-danger">
        <i class="bi bi-box-arrow-right me-2"></i> Logout
      </a>
    </li>
  </ul>
</aside>
