<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jetlouge Travels Admin - Course Management</title>
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
            <h2 class="fw-bold mb-1">Course Management</h2>
            <p class="text-muted mb-0">Manage and view all available courses.</p>
          </div>
        </div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin_dashboard') }}" class="text-decoration-none">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Course Management</li>
          </ol>
        </nav>
      </div>
    </div>

    <!-- Add Course Card -->
    <div class="card shadow-sm border-0 mt-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="fw-bold mb-0">Add New Course</h4>
      </div>
      <div class="card-body">
        <form class="mb-4">
          <div class="row g-3">
            <div class="col-md-3">
              <label class="form-label small text-muted">Course Name</label>
              <input type="text" name="course_name" class="form-control" placeholder="Enter course name" required>
            </div>
            <div class="col-md-3">
              <label class="form-label small text-muted">Category</label>
              <input type="text" name="category" class="form-control" placeholder="Enter category" required>
            </div>
            <div class="col-md-2">
              <label class="form-label small text-muted">Duration</label>
              <input type="text" name="duration" class="form-control" placeholder="e.g. 2 weeks" required>
            </div>
            <div class="col-md-2">
              <label class="form-label small text-muted">Status</label>
              <select name="status" class="form-select" required>
                <option value="">Select status</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </select>
            </div>
            <div class="col-md-2 d-flex align-items-end">
              <button type="submit" class="btn btn-primary w-100">
                <i class="bi bi-plus-lg me-1"></i> Add
              </button>
            </div>
            <div class="col-12">
              <label class="form-label small text-muted">Description</label>
              <textarea name="description" class="form-control" placeholder="Course description..." rows="2"></textarea>
            </div>
          </div>
        </form>

        <!-- Courses Table -->
        <div class="table-responsive">
          <table class="table table-bordered table-hover mb-0">
            <thead class="table-light">
              <tr>
                <th width="5%">ID</th>
                <th width="20%">Course Name</th>
                <th width="30%">Description</th>
                <th width="15%">Category</th>
                <th width="10%">Duration</th>
                <th width="10%">Status</th>
                <th width="10%">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($courses as $course)
              <tr>
                <td>{{ $course->id }}</td>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="avatar-sm me-2">
                      <div class="avatar-title bg-primary bg-opacity-10 rounded">
                        <i class="bi bi-book text-primary"></i>
                      </div>
                    </div>
                    <div>
                      <h6 class="mb-0">{{ $course->course_name }}</h6>
                    </div>
                  </div>
                </td>
                <td class="text-truncate" style="max-width: 300px;">{{ $course->description }}</td>
                <td>{{ $course->category }}</td>
                <td>{{ $course->duration }}</td>
                <td>
                  @if($course->status == 'Active')
                    <span class="badge bg-success">{{ $course->status }}</span>
                  @else
                    <span class="badge bg-secondary">{{ $course->status }}</span>
                  @endif
                </td>
                <td>
                  <button class="btn btn-sm btn-outline-warning me-1">
                    <i class="bi bi-pencil"></i>
                  </button>
                  <button class="btn btn-sm btn-outline-danger">
                    <i class="bi bi-trash"></i>
                  </button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-between align-items-center mt-3">
          <div class="text-muted small">
            Showing <span class="fw-semibold">1</span> to <span class="fw-semibold">5</span> of <span class="fw-semibold">{{ count($courses) }}</span> entries
          </div>
          <nav>
            <ul class="pagination pagination-sm mb-0">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
              </li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item">
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
