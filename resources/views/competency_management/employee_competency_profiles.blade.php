<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jetlouge Travels Admin</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/admin_dashboard-style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/competency_library-style.css') }}">
</head>
<body style="background-color: #f8f9fa !important;">

  <!-- Navbar -->
  @include('partials.admin_topbar')

  <!-- Sidebar -->
  @include('partials.admin_sidebar')

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
            <h2 class="fw-bold mb-1">Employee Competency</h2>
            <p class="text-muted mb-0">
              Welcome back,
              @if(Auth::check())
                {{ Auth::user()->name }}
              @else
                Admin
              @endif
              ! Here's your Employee Competency dashboard.
            </p>
          </div>
        </div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route ('admin_dashboard') }}" class="text-decoration-none">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
          </ol>
        </nav>
      </div>
    </div>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Employee Competency Profile Section -->
    <div class="card shadow-sm border-0 mt-4">
      <!-- Card Header -->
      <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="fw-bold mb-0">Employee Competency Profile</h4>
      </div>

      <!-- Card Body -->
      <div class="card-body">

        <!-- Add Profile Form -->
        <form action="{{ route('employee_competency_profiles.store') }}" method="POST" class="mb-4">
          @csrf
          <div class="row">
            <div class="col-md-3">
              <select name="employee_id" class="form-control" required>
                <option value="">Select Employee</option>
                @foreach($employees as $employee)
                  <option value="{{ $employee->employee_id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-3">
              <select name="competency_id" class="form-control" required>
                <option value="">Select Competency</option>
                @foreach($competencylibrary as $competency)
                  <option value="{{ $competency->id }}">{{ $competency->competency_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-2">
              <input type="number" name="proficiency_level" placeholder="Proficiency Level" class="form-control" min="1" max="5" required>
            </div>
            <div class="col-md-2">
              <input type="date" name="assessment_date" class="form-control" required>
            </div>
            <div class="col-md-2">
              <button class="btn btn-primary w-100">Add</button>
            </div>
          </div>
        </form>

        <!-- Profiles Table -->
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Employee</th>
              <th>Competency</th>
              <th>Proficiency Level</th>
              <th>Assessment Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($profiles as $profile)
            <tr>
              <td>{{ $profile->employee->first_name ?? '' }} {{ $profile->employee->last_name ?? '' }}</td>
              <td>{{ $profile->competency->competency_name }}</td>
              <td>{{ $profile->proficiency_level }}</td>
              <td>{{ date('d/m/Y', strtotime($profile->assessment_date)) }}</td>
              <td>
                <!-- Edit Button -->
                <button class="btn btn-warning btn-sm edit-btn"
                        data-id="{{ $profile->id }}"
                        data-employee-id="{{ $profile->employee_id }}"
                        data-competency-id="{{ $profile->competency_id }}"
                        data-proficiency="{{ $profile->proficiency_level }}"
                        data-assessment-date="{{ $profile->assessment_date }}">
                  Edit
                </button>

                <!-- Delete Button -->
                <form action="{{ route('employee_competency_profiles.destroy', $profile->id) }}" method="POST" style="display:inline-block;">
                  @csrf @method('DELETE')
                  <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this profile?')">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div> <!-- End card-body -->
    </div> <!-- End card -->
  </main> <!-- End main -->

  <!-- Edit Modal OUTSIDE main -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Competency Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="editForm" method="POST">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Employee</label>
              <select name="employee_id" class="form-control" required>
                <option value="">Select Employee</option>
                @foreach($employees as $employee)
                  <option value="{{ $employee->employee_id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Competency</label>
              <select name="competency_id" class="form-control" required>
                <option value="">Select Competency</option>
                @foreach($competencylibrary as $competency)
                  <option value="{{ $competency->id }}">{{ $competency->competency_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Proficiency Level (1-5)</label>
              <input type="number" name="proficiency_level" class="form-control" min="1" max="5" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Assessment Date</label>
              <input type="date" name="assessment_date" class="form-control" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Modal Script -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const editButtons = document.querySelectorAll('.edit-btn');
      const editModal = new bootstrap.Modal(document.getElementById('editModal'));
      const editForm = document.getElementById('editForm');

      editButtons.forEach(button => {
        button.addEventListener('click', function() {
          // Hide overlay if it's active
          document.getElementById('overlay').style.display = 'none';

          // Get data from the button's data attributes
          const id = this.getAttribute('data-id');
          const employeeId = this.getAttribute('data-employee-id');
          const competencyId = this.getAttribute('data-competency-id');
          const proficiency = this.getAttribute('data-proficiency');
          const assessmentDate = this.getAttribute('data-assessment-date');

          // Set form action URL
          editForm.action = `/employee_competency_profiles/${id}`;

          // Set form values
          editForm.querySelector('select[name="employee_id"]').value = employeeId;
          editForm.querySelector('select[name="competency_id"]').value = competencyId;
          editForm.querySelector('input[name="proficiency_level"]').value = proficiency;
          editForm.querySelector('input[name="assessment_date"]').value = assessmentDate;

          // Show the modal
          editModal.show();
        });
      });
    });
  </script>
</body>
</html>
