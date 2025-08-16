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

    <!-- Add Rating Card -->
    <div class="card shadow-sm border-0 mt-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="fw-bold mb-0">Add Rating</h4>
      </div>
      <div class="card-body">
        <form class="mb-4">
          <div class="row">
            <div class="col-md-3">
              <select name="successor_id" class="form-control" required>
                <option value="">Select Successor</option>
                <option>John Doe</option>
                <option>Jane Smith</option>
              </select>
            </div>
            <div class="col-md-2">
              <select name="readiness_level" class="form-control" required>
                <option value="">Readiness Level</option>
                <option>High</option>
                <option>Medium</option>
                <option>Low</option>
              </select>
            </div>
            <div class="col-md-2">
              <input type="number" name="rating_score" placeholder="Score" class="form-control" min="1" max="100" required>
            </div>
            <div class="col-md-2">
              <input type="date" name="rating_date" class="form-control" required>
            </div>
            <div class="col-md-2">
              <input type="text" name="rated_by" placeholder="Rated By" class="form-control" required>
            </div>
            <div class="col-md-1">
              <button class="btn btn-primary w-100">Add</button>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-md-12">
              <textarea name="comments" class="form-control" placeholder="Comments" rows="2"></textarea>
            </div>
          </div>
        </form>

        <!-- Ratings Table -->
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Successor</th>
              <th>Readiness Level</th>
              <th>Rating Score</th>
              <th>Rating Date</th>
              <th>Rated By</th>
              <th>Comments</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>John Doe</td>
              <td>
                <span class="badge bg-success">High</span>
              </td>
              <td>95</td>
              <td>2025-08-14</td>
              <td>HR Manager</td>
              <td>Excellent potential</td>
              <td>
                <button class="btn btn-warning btn-sm">Edit</button>
                <button class="btn btn-danger btn-sm">Delete</button>
              </td>
            </tr>
            <tr>
              <td>Jane Smith</td>
              <td>
                <span class="badge bg-warning text-dark">Medium</span>
              </td>
              <td>75</td>
              <td>2025-08-10</td>
              <td>Department Head</td>
              <td>Needs more leadership training</td>
              <td>
                <button class="btn btn-warning btn-sm">Edit</button>
                <button class="btn btn-danger btn-sm">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
