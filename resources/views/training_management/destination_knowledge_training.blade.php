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

    <div class="card shadow-sm border-0">
      <div class="card-header bg-white border-0 py-3">
        <div class="d-flex justify-content-between align-items-center">
          <h4 class="fw-semibold mb-0 d-flex align-items-center">
            <i class="bi bi-globe2 me-2"></i>Training Programs
          </h4>
          <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="bi bi-plus-lg me-1"></i> Add Training
          </button>
        </div>
      </div>

      <div class="card-body">
        <!-- Trainings Table -->
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
              <tr>
                <th width="10%">ID</th>
                <th width="25%">Training Name</th>
                <th width="35%">Description</th>
                <th width="10%">Status</th>
                <th width="10%">Created</th>
                <th width="10%">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach($trainings as $training)
              <tr>
                <td class="fw-semibold">#{{ $training->training_id }}</td>
                <td>
                  <div class="d-flex align-items-center">
                    <div class="avatar-sm me-3">
                      <div class="avatar-title bg-info bg-opacity-10 rounded-circle">
                        <i class="bi bi-geo-alt text-info"></i>
                      </div>
                    </div>
                    <div>
                      <h6 class="mb-0">{{ $training->training_name }}</h6>
                    </div>
                  </div>
                </td>
                <td class="text-truncate" style="max-width: 300px;">{{ $training->training_description }}</td>
                <td>
                  @if($training->status == 'Active')
                    <span class="badge bg-success">{{ $training->status }}</span>
                  @else
                    <span class="badge bg-secondary">{{ $training->status }}</span>
                  @endif
                </td>
                <td>{{ date('M d, Y', strtotime($training->created_at)) }}</td>
                <td>
                  <div class="d-flex">
                    <button class="btn btn-sm btn-outline-warning me-2 edit-btn"
                            data-bs-toggle="modal"
                            data-bs-target="#editModal"
                            data-id="{{ $training->training_id }}"
                            data-name="{{ $training->training_name }}"
                            data-description="{{ $training->training_description }}"
                            data-status="{{ $training->status }}"
                            title="Edit">
                      <i class="bi bi-pencil"></i>
                    </button>
                    <form action="/destination-knowledge-training/{{ $training->training_id }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this training?')" title="Delete">
                        <i class="bi bi-trash"></i>
                      </button>
                    </form>
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

  <!-- Add Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addModalLabel">Add New Training</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="/destination-knowledge-training" method="POST">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Training Name</label>
              <input type="text" name="training_name" class="form-control" placeholder="Enter training name" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Description</label>
              <textarea name="training_description" class="form-control" rows="3" placeholder="Enter training description" required></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Status</label>
              <select name="status" class="form-select" required>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Add Training</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Training</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form id="editForm" method="POST">
          @csrf
          @method('PUT')
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Training Name</label>
              <input type="text" name="training_name" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Description</label>
              <textarea name="training_description" class="form-control" rows="3" required></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Status</label>
              <select name="status" class="form-select" required>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
              </select>
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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const editModal = document.getElementById('editModal');
      if (editModal) {
        editModal.addEventListener('show.bs.modal', function(event) {
          const button = event.relatedTarget;
          const id = button.getAttribute('data-id');
          const name = button.getAttribute('data-name');
          const description = button.getAttribute('data-description');
          const status = button.getAttribute('data-status');

          const form = editModal.querySelector('#editForm');
          form.action = `/destination-knowledge-training/${id}`;
          form.querySelector('input[name="training_name"]').value = name;
          form.querySelector('textarea[name="training_description"]').value = description;
          form.querySelector('select[name="status"]').value = status;
        });
      }
    });
  </script>
</body>
</html>
