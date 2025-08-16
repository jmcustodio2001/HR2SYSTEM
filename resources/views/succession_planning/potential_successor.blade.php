<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jetlouge Travels Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/admin_dashboard-style.css') }}">
</head>
<body style="background-color: #f8f9fa !important;">

  @include('partials.admin_topbar')
  @include('partials.admin_sidebar')

  <div id="overlay" class="position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-50" style="z-index:1040; display: none;"></div>

  <main id="main-content">
    <div class="page-header-container mb-4">
      <div class="d-flex justify-content-between align-items-center page-header">
        <div class="d-flex align-items-center">
          <div class="dashboard-logo me-3">
            <img src="{{ asset('assets/images/jetlouge_logo.png') }}" alt="Jetlouge Travels" class="logo-img">
          </div>
          <div>
            <h2 class="fw-bold mb-1">Potential Successor</h2>
            <p class="text-muted mb-0">
              Welcome back,
              Admin! Here's your Potential Successor list.
            </p>
          </div>
        </div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}" class="text-decoration-none">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Potential Successor</li>
          </ol>
        </nav>
      </div>
    </div>

    <!-- Form Section -->
    <div class="card shadow-sm border-0 mb-4">
      <div class="card-header bg-white border-0 py-3">
        <h5 class="fw-semibold mb-0 d-flex align-items-center">
          <i class="bi bi-person-plus me-2"></i>Add Potential Successor
        </h5>
      </div>
      <div class="card-body pt-0">
        <form class="mb-4">
          <div class="row g-3">
            <div class="col-md-3">
              <label class="form-label small text-muted">Employee</label>
              <select name="employee_id" class="form-select" required>
                <option value="">Select Employee</option>
                <option>John Doe</option>
                <option>Jane Smith</option>
              </select>
            </div>
            <div class="col-md-3">
              <label class="form-label small text-muted">Position</label>
              <select name="position_id" class="form-select" required>
                <option value="">Select Position</option>
                <option>Manager</option>
                <option>Supervisor</option>
              </select>
            </div>
            <div class="col-md-2">
              <label class="form-label small text-muted">Date</label>
              <input type="date" name="identification_date" class="form-control" required>
            </div>
            <div class="col-md-2">
              <label class="form-label small text-muted">Identified By</label>
              <input type="text" name="identified_by" placeholder="Name" class="form-control" required>
            </div>
            <div class="col-md-2 d-flex align-items-end">
              <button class="btn btn-primary w-100">
                <i class="bi bi-plus-lg me-1"></i> Add
              </button>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <label class="form-label small text-muted">Notes</label>
              <textarea name="notes" class="form-control" placeholder="Additional notes..." rows="2"></textarea>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Table Section -->
    <div class="card shadow-sm border-0">
      <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
        <h5 class="fw-semibold mb-0 d-flex align-items-center">
          <i class="bi bi-people me-2"></i>Successor List
        </h5>
        <div class="d-flex">
          <input type="text" class="form-control form-control-sm me-2" placeholder="Search..." style="width: 200px;">
          <button class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-funnel"></i> Filter
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-hover mb-0">
            <thead class="table-light">
              <tr>
                <th class="ps-4">Employee</th>
                <th>Position</th>
                <th>Date Identified</th>
                <th>Identified By</th>
                <th>Notes</th>
                <th class="text-end pe-4">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="ps-4">
                  <div class="d-flex align-items-center">
                    <div class="avatar-sm me-3">
                      <div class="avatar-title bg-primary bg-opacity-10 rounded-circle">
                        <i class="bi bi-person text-primary"></i>
                      </div>
                    </div>
                    <div>
                      <h6 class="mb-0">John Doe</h6>
                      <small class="text-muted">EMP-001</small>
                    </div>
                  </div>
                </td>
                <td>
                  <span class="badge bg-success bg-opacity-10 text-success">Manager</span>
                </td>
                <td>Aug 14, 2025</td>
                <td>HR Manager</td>
                <td class="text-truncate" style="max-width: 200px;">Strong leadership skills and team management experience</td>
                <td class="text-end pe-4">
                  <button class="btn btn-sm btn-outline-primary me-1">
                    <i class="bi bi-pencil"></i>
                  </button>
                  <button class="btn btn-sm btn-outline-danger">
                    <i class="bi bi-trash"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td class="ps-4">
                  <div class="d-flex align-items-center">
                    <div class="avatar-sm me-3">
                      <div class="avatar-title bg-warning bg-opacity-10 rounded-circle">
                        <i class="bi bi-person text-warning"></i>
                      </div>
                    </div>
                    <div>
                      <h6 class="mb-0">Jane Smith</h6>
                      <small class="text-muted">EMP-002</small>
                    </div>
                  </div>
                </td>
                <td>
                  <span class="badge bg-info bg-opacity-10 text-info">Supervisor</span>
                </td>
                <td>Jul 28, 2025</td>
                <td>Department Head</td>
                <td class="text-truncate" style="max-width: 200px;">Excellent problem-solving abilities and technical expertise</td>
                <td class="text-end pe-4">
                  <button class="btn btn-sm btn-outline-primary me-1">
                    <i class="bi bi-pencil"></i>
                  </button>
                  <button class="btn btn-sm btn-outline-danger">
                    <i class="bi bi-trash"></i>
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-between align-items-center p-3 border-top">
          <div class="text-muted small">
            Showing <span class="fw-semibold">1</span> to <span class="fw-semibold">2</span> of <span class="fw-semibold">2</span> entries
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
