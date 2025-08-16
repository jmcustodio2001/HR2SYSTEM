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
            <h2 class="fw-bold mb-1">Destination Knowledge Training</h2>
            <p class="text-muted mb-0">Manage training details for different destinations.</p>
          </div>
        </div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}" class="text-decoration-none">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Destination Knowledge Training</li>
          </ol>
        </nav>
      </div>
    </div>

    <!-- Training Records Card -->
    <div class="card shadow-sm border-0">
      <div class="card-header bg-white border-0 py-3">
        <div class="d-flex justify-content-between align-items-center">
          <h4 class="fw-semibold mb-0 d-flex align-items-center">
            <i class="bi bi-clipboard2-plus me-2"></i>Training Records
          </h4>
          <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="bi bi-plus-lg me-1"></i> Add Record
          </button>
        </div>
      </div>
      <div class="card-body">
        <!-- Records Table -->
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
              <tr>
                <th width="30%">Employee</th>
                <th width="35%">Training</th>
                <th width="20%">Date Completed</th>
                <th width="15%">Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- Sample Data Row 1 -->
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="avatar-sm me-3">
                      <div class="avatar-title bg-primary bg-opacity-10 rounded-circle">
                        <i class="bi bi-person text-primary"></i>
                      </div>
                    </div>
                    <div>
                      <h6 class="mb-0">John Doe</h6>
                      <small class="text-muted">EMP-1001</small>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="avatar-sm me-3">
                      <div class="avatar-title bg-info bg-opacity-10 rounded-circle">
                        <i class="bi bi-book text-info"></i>
                      </div>
                    </div>
                    <div>
                      <h6 class="mb-0">Basic Customer Service</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <span class="badge bg-light text-dark">
                    <i class="bi bi-calendar-check me-1"></i>
                    Jun 15, 2023
                  </span>
                </td>
                <td>
                  <div class="d-flex">
                    <button class="btn btn-sm btn-outline-warning me-2" data-bs-toggle="modal" data-bs-target="#editModal">
                      <i class="bi bi-pencil"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-danger">
                      <i class="bi bi-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>

              <!-- Sample Data Row 2 -->
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="avatar-sm me-3">
                      <div class="avatar-title bg-primary bg-opacity-10 rounded-circle">
                        <i class="bi bi-person text-primary"></i>
                      </div>
                    </div>
                    <div>
                      <h6 class="mb-0">Jane Smith</h6>
                      <small class="text-muted">EMP-1002</small>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="avatar-sm me-3">
                      <div class="avatar-title bg-info bg-opacity-10 rounded-circle">
                        <i class="bi bi-book text-info"></i>
                      </div>
                    </div>
                    <div>
                      <h6 class="mb-0">Advanced Sales Techniques</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <span class="badge bg-light text-dark">
                    <i class="bi bi-calendar-check me-1"></i>
                    Jul 22, 2023
                  </span>
                </td>
                <td>
                  <div class="d-flex">
                    <button class="btn btn-sm btn-outline-warning me-2" data-bs-toggle="modal" data-bs-target="#editModal">
                      <i class="bi bi-pencil"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-danger">
                      <i class="bi bi-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-between align-items-center mt-3">
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

  <!-- Add Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addModalLabel">Add Training Record</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label class="form-label">Employee</label>
              <select class="form-select">
                <option value="">Select Employee</option>
                <option value="1001">John Doe (EMP-1001)</option>
                <option value="1002">Jane Smith (EMP-1002)</option>
                <option value="1003">Michael Johnson (EMP-1003)</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Training</label>
              <select class="form-select">
                <option value="">Select Training</option>
                <option value="1">Basic Customer Service</option>
                <option value="2">Advanced Sales Techniques</option>
                <option value="3">Conflict Resolution</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Date Completed</label>
              <input type="date" class="form-control">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary">Add Record</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Training Record</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label class="form-label">Employee</label>
              <select class="form-select">
                <option value="">Select Employee</option>
                <option value="1001" selected>John Doe (EMP-1001)</option>
                <option value="1002">Jane Smith (EMP-1002)</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Training</label>
              <select class="form-select">
                <option value="">Select Training</option>
                <option value="1" selected>Basic Customer Service</option>
                <option value="2">Advanced Sales Techniques</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Date Completed</label>
              <input type="date" class="form-control" value="2023-06-15">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save Changes</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
