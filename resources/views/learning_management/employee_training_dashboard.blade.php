<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jetlouge Travels Admin - Employee Training Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/admin_dashboard-style.css') }}">
</head>
<body style="background-color: #f8f9fa !important;">

  @include('partials.admin_topbar')
  @include('partials.admin_sidebar')

  <main id="main-content">
    <div class="page-header-container mb-4">
      <div class="d-flex justify-content-between align-items-center page-header">
        <div class="d-flex align-items-center">
          <div class="dashboard-logo me-3">
            <img src="{{ asset('assets/images/jetlouge_logo.png') }}" alt="Jetlouge Travels" class="logo-img">
          </div>
          <div>
            <h2 class="fw-bold mb-1">Employee Training Dashboard</h2>
            <p class="text-muted mb-0">Track and manage employee training progress</p>
          </div>
        </div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('employee_portal.employee_dashboard') }}" class="text-decoration-none">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Training Management</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="card shadow-sm border-0">
      <div class="card-header bg-white border-0 py-3">
        <h4 class="fw-semibold mb-0 d-flex align-items-center">
          <i class="bi bi-plus-circle me-2"></i>Assign Training
        </h4>
      </div>
      <div class="card-body">
        <form class="row g-3 mb-4">
          <div class="col-md-3">
            <label class="form-label small text-muted">Employee</label>
            <select name="employee_id" class="form-select">
              <option value="">Select Employee</option>
              @foreach($employees as $emp)
                <option value="{{ $emp->employee_id }}">{{ $emp->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-3">
            <label class="form-label small text-muted">Course</label>
            <select name="course_id" class="form-select">
              <option value="">Select Course</option>
              @foreach($courses as $course)
                <option value="{{ $course->id }}">{{ $course->course_name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-2">
            <label class="form-label small text-muted">Status</label>
            <select name="status" class="form-select">
              <option value="">Select Status</option>
              <option value="Ongoing">Ongoing</option>
              <option value="Completed">Completed</option>
              <option value="Pending">Pending</option>
            </select>
          </div>
          <div class="col-md-2">
            <label class="form-label small text-muted">Start Date</label>
            <input type="date" name="start_date" class="form-control">
          </div>
          <div class="col-md-2">
            <label class="form-label small text-muted">End Date</label>
            <input type="date" name="end_date" class="form-control">
          </div>
          <div class="col-md-12 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary px-4">
              <i class="bi bi-plus-lg me-1"></i> Assign Training
            </button>
          </div>
        </form>

        <!-- Training Records Table -->
        <div class="table-responsive">
          <table class="table table-hover mb-0">
            <thead class="table-light">
              <tr>
                <th width="5%">ID</th>
                <th width="20%">Employee</th>
                <th width="25%">Course</th>
                <th width="15%">Status</th>
                <th width="15%">Start Date</th>
                <th width="15%">End Date</th>
                <th width="5%">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($trainings as $training)
              <tr>
                <td>{{ $training->id }}</td>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="avatar-sm me-2">
                      <div class="avatar-title bg-primary bg-opacity-10 rounded-circle">
                        <i class="bi bi-person text-primary"></i>
                      </div>
                    </div>
                    <div>
                      <h6 class="mb-0">{{ collect($employees)->firstWhere('employee_id', $training->employee_id)->name ?? 'N/A' }}</h6>
                      <small class="text-muted">EMP-{{ $training->employee_id }}</small>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="avatar-sm me-2">
                      <div class="avatar-title bg-info bg-opacity-10 rounded-circle">
                        <i class="bi bi-book text-info"></i>
                      </div>
                    </div>
                    <div>
                      <h6 class="mb-0">{{ collect($courses)->firstWhere('id', $training->course_id)->course_name ?? 'N/A' }}</h6>
                    </div>
                  </div>
                </td>
                <td>
                  @if($training->status == 'Completed')
                    <span class="badge bg-success">{{ $training->status }}</span>
                  @elseif($training->status == 'Ongoing')
                    <span class="badge bg-warning text-dark">{{ $training->status }}</span>
                  @else
                    <span class="badge bg-secondary">{{ $training->status }}</span>
                  @endif
                </td>
                <td>{{ date('M d, Y', strtotime($training->start_date)) }}</td>
                <td>{{ $training->end_date ? date('M d, Y', strtotime($training->end_date)) : '-' }}</td>
                <td>
                  <div class="d-flex">
                    <button class="btn btn-sm btn-outline-primary me-1" title="Edit">
                      <i class="bi bi-pencil"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-danger" title="Delete">
                      <i class="bi bi-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-between align-items-center mt-3">
          <div class="text-muted small">
            Showing <span class="fw-semibold">1</span> to <span class="fw-semibold">{{ count($trainings) }}</span> of <span class="fw-semibold">{{ count($trainings) }}</span> entries
          </div>
          <nav>
            <ul class="pagination pagination-sm mb-0">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
              </li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item disabled">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
