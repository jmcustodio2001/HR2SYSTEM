<!-- resources/views/succession_planning_dashboard.blade.php -->

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

  <main id="main-content" class="p-4">
    <div class="page-header-container mb-4">
      <div class="d-flex justify-content-between align-items-center page-header">
        <div class="d-flex align-items-center">
          <div class="dashboard-logo me-3">
            <img src="{{ asset('assets/images/jetlouge_logo.png') }}" alt="Jetlouge Travels" class="logo-img">
          </div>
          <div>
            <h2 class="fw-bold mb-1">Succession Planning Dashboard</h2>
            <p class="text-muted mb-0">Manage positions, successors, and readiness levels.</p>
          </div>
        </div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Succession Planning Dashboard</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="card shadow-sm border-0 mt-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="fw-bold mb-0">Add New Entry</h4>
      </div>
      <div class="card-body">
        <form action="#" method="POST" class="mb-4">
          <div class="row">
            <div class="col-md-3">
              <select name="position_id" class="form-control" required>
                <option value="">Select Position</option>
                @foreach($positions as $pos)
                  <option value="{{ $pos['id'] }}">{{ $pos['name'] }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-3">
              <select name="successor_id" class="form-control" required>
                <option value="">Select Successor</option>
                @foreach($successors as $suc)
                  <option value="{{ $suc['id'] }}">{{ $suc['name'] }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-3">
              <select name="readiness_id" class="form-control" required>
                <option value="">Select Readiness</option>
                @foreach($readinessLevels as $read)
                  <option value="{{ $read['id'] }}">{{ $read['name'] }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-2">
              <input type="text" name="simulation_result" placeholder="Simulation Result" class="form-control" required>
            </div>
            <div class="col-md-1">
              <button class="btn btn-primary w-100">Add</button>
            </div>
          </div>
        </form>

        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Position</th>
              <th>Successor</th>
              <th>Readiness</th>
              <th>Simulation Result</th>
              <th>Last Updated</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($dashboards as $item)
            <tr>
              <td>{{ $item['position'] }}</td>
              <td>{{ $item['successor'] }}</td>
              <td>{{ $item['readiness'] }}</td>
              <td>{{ $item['simulation_result'] }}</td>
              <td>{{ date('d/m/Y', strtotime($item['last_updated'])) }}</td>
              <td>
                <button class="btn btn-warning btn-sm">Edit</button>
                <button class="btn btn-danger btn-sm">Delete</button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
