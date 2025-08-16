<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Jetlouge Travels Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('assets/css/admin_dashboard-style.css') }}">
  <style>
    .modal-table {
      width: 100%;
    }
    .modal-table .form-label {
      font-weight: 500;
      margin-bottom: 0.25rem;
    }
    .modal-table .form-control,
    .modal-table .form-select {
      padding: 0.375rem 0.75rem;
      font-size: 0.875rem;
    }
    .modal-table .row {
      margin-bottom: 0.75rem;
    }
    .modal-table .gap-calc-fields {
      background-color: #f8f9fa;
      padding: 1rem;
      border-radius: 0.375rem;
    }
    .modal-table .readonly-field {
      background-color: #e9ecef;
    }
    /* Star Rating Styles */
    .star-rating {
      display: inline-flex;
      align-items: center;
    }
    .star-rating .bi {
      color: #e4e5e9;
      font-size: 1rem;
    }
    .star-rating .bi-star-fill.active {
      color: #ffc107;
    }
    .star-rating .rating-text {
      margin-left: 5px;
      font-size: 0.9rem;
    }

  </style>
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
            <h2 class="fw-bold mb-1">Competency Gap/Analysis</h2>
            <p class="text-muted mb-0">
              Welcome back,
              @if(Auth::check())
                {{ Auth::user()->name }}
              @else
                Admin
              @endif
              ! Here's your Competency Gap/Analysis.
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

   <!-- Competency List Section -->
<div class="card shadow-sm border-0">
  <!-- Card Header -->
  <div class="card-header d-flex justify-content-between align-items-center">
    <h4 class="fw-bold mb-0">Competency List</h4>
  </div>

  <!-- Card Body -->
  <div class="card-body p-3 bg-light rounded shadow-sm">
    <div class="table-responsive">
      <table class="table table-hover">
        <thead class="table-light">
          <tr>
            <th>ID</th>
            <th>Competency Name</th>
            <th>Description</th>
            <th>Category</th>
            <th>Rate</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($competencies as $index => $comp)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $comp->competency_name }}</td>
              <td>{{ $comp->description }}</td>
              <td>{{ $comp->category }}</td>
              <td>
                <div class="star-rating">
                  @for($i = 1; $i <= 5; $i++)
                    <i class="bi bi-star-fill {{ $i <= ($comp->rate ?? 0) ? 'active' : '' }}"></i>
                  @endfor
                  <span class="rating-text">{{ $comp->rate ?? 0 }}/5</span>
                </div>
              </td>
              <td>
                <button class="btn btn-warning btn-sm edit-competency-btn"
                        data-id="{{ $comp->id }}"
                        data-name="{{ $comp->competency_name }}"
                        data-description="{{ $comp->description }}"
                        data-category="{{ $comp->category }}"
                        data-rate="{{ $comp->rate }}">
                  <i class="bi bi-pencil"></i>
                </button>
                <form action="{{ route('competency_library.destroy', $comp->id) }}" method="POST" style="display:inline-block;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this competency?')">
                    <i class="bi bi-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center">No competencies found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>


   <!-- Gap List Section -->
<div class="card shadow-sm border-0 mt-4">
  <!-- Card Header -->
  <div class="card-header d-flex justify-content-between align-items-center">
    <h4 class="fw-bold mb-0">Competency Gap List</h4>
    <div class="d-flex gap-2">
      <form method="POST" action="{{ route('competency_gap_analysis.export') }}">
        @csrf
        <button type="submit" class="btn btn-success btn-sm" title="Export">
          <i class="bi bi-download"></i> Export
        </button>
      </form>
      <input type="text" id="gap-search" class="form-control form-control-sm" placeholder="Search employee..." style="width: 180px;">
      <button class="btn btn-primary btn-sm" id="addGapBtn">
        <i class="bi bi-plus-circle"></i> Add Gap Record
      </button>
    </div>
  </div>

  <!-- Card Body -->
  <div class="card-body p-3 bg-light rounded shadow-sm">
    <div class="table-responsive">
      <table class="table table-hover align-middle">
        <thead class="table-light">
          <tr>
            <th>ID</th>
            <th>Employee</th>
            <th>Competency</th>
            <th>Rate</th>
            <th>Required Level</th>
            <th>Current Level</th>
            <th>Gap</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($gaps as $index => $gap)
            <tr class="gap-row">
              <td>{{ $index + 1 }}</td>
              <td class="gap-employee">
                @if($gap->employee)
                  {{ $gap->employee->first_name }} {{ $gap->employee->last_name }}
                @else
                  N/A
                @endif
              </td>
              <td>
                @if($gap->competency)
                  {{ $gap->competency->competency_name }}
                @else
                  N/A
                @endif
              </td>
              <td>
                <div class="star-rating">
                  @for($i = 1; $i <= 5; $i++)
                    <i class="bi bi-star-fill {{ $i <= ($gap->competency->rate ?? 0) ? 'active' : '' }}"></i>
                  @endfor
                  <span class="rating-text">{{ $gap->competency->rate ?? 0 }}/5</span>
                </div>
              </td>
              <td>
                <div class="star-rating">
                  @for($i = 1; $i <= 5; $i++)
                    <i class="bi bi-star-fill {{ $i <= ($gap->required_level ?? 0) ? 'active' : '' }}"></i>
                  @endfor
                  <span class="rating-text">{{ $gap->required_level ?? 0 }}/5</span>
                </div>
              </td>
              <td>
                <div class="star-rating">
                  @for($i = 1; $i <= 5; $i++)
                    <i class="bi bi-star-fill {{ $i <= ($gap->current_level ?? 0) ? 'active' : '' }}"></i>
                  @endfor
                  <span class="rating-text">{{ $gap->current_level ?? 0 }}/5</span>
                </div>
              </td>
              <td>
                @php
                  $gapValue = $gap->gap ?? 0;
                  $badgeClass = $gapValue > 0 ? 'bg-danger' : 'bg-success';
                  $gapText = $gapValue > 0 ? $gapValue . ' level(s) below' : 'No gap';
                @endphp
                <span class="badge {{ $badgeClass }}">{{ $gapText }}</span>
              </td>
              <td>
                <button class="btn btn-warning btn-sm edit-gap-btn"
                        data-id="{{ $gap->id }}"
                        data-employee-id="{{ $gap->employee_id }}"
                        data-competency-id="{{ $gap->competency_id }}"
                        data-rate="{{ $gap->competency->rate ?? '' }}"
                        data-required-level="{{ $gap->required_level }}"
                        data-current-level="{{ $gap->current_level }}"
                        data-gap="{{ $gap->gap }}">
                  <i class="bi bi-pencil"></i>
                </button>
                <form action="{{ route('competency_gap_analysis.destroy', $gap->id) }}" method="POST" style="display:inline-block;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this record?')">
                    <i class="bi bi-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="8" class="text-center">No gap records found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
</main>

  <!-- Edit Competency Modal (Single Modal) -->
  <div class="modal fade" id="editCompetencyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form id="editCompetencyForm" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title">Edit Competency</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="edit-competency-name" class="form-label">Competency Name*</label>
              <input id="edit-competency-name" type="text" name="competency_name" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="edit-description" class="form-label">Description</label>
              <textarea id="edit-description" name="description" class="form-control" rows="3"></textarea>
            </div>
            <div class="mb-3">
              <label for="edit-category" class="form-label">Category</label>
              <input id="edit-category" type="text" name="category" class="form-control">
            </div>
            <div class="mb-3">
              <label for="edit-rate" class="form-label">Rate*</label>
              <input id="edit-rate" type="number" name="rate" class="form-control" min="1" max="5" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Add Competency Modal -->
  <div class="modal fade" id="addCompetencyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form method="POST" action="{{ route('competency_library.store') }}">
        @csrf
        <div class="modal-content">
          <div class="modal-header bg-success text-white">
            <h5 class="modal-title">Add Competency</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="add-competency-name" class="form-label">Competency Name*</label>
              <input id="add-competency-name" type="text" name="competency_name" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="add-description" class="form-label">Description</label>
              <textarea id="add-description" name="description" class="form-control" rows="3"></textarea>
            </div>
            <div class="mb-3">
              <label for="add-category" class="form-label">Category</label>
              <input id="add-category" type="text" name="category" class="form-control">
            </div>
            <div class="mb-3">
              <label for="add-rate" class="form-label">Rate*</label>
              <input id="add-rate" type="number" name="rate" class="form-control" min="1" max="5" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success">Save Competency</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Edit Gap Modal (Single Modal) -->
  <div class="modal fade" id="editGapModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form id="editGapForm" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title">Edit Gap Record</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="edit-gap-employee-id" class="form-label">Employee*</label>
              <select id="edit-gap-employee-id" name="employee_id" class="form-select" required>
                <option value="">Select Employee</option>
                @foreach($employees as $emp)
                  <option value="{{ $emp->employee_id }}">{{ $emp->first_name }} {{ $emp->last_name }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="edit-gap-competency-id" class="form-label">Competency*</label>
              <select id="edit-gap-competency-id" name="competency_id" class="form-select" required>
                <option value="">Select Competency</option>
                @foreach($competencies as $comp)
                  <option value="{{ $comp->id }}" data-rate="{{ $comp->rate }}">
                    {{ $comp->competency_name }} (Rate: {{ $comp->rate }})
                  </option>
                @endforeach
              </select>
            </div>
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="edit-gap-rate" class="form-label">Rate</label>
                <input id="edit-gap-rate" type="number" class="form-control readonly-field" readonly>
              </div>
              <div class="col-md-4 mb-3">
                <label for="edit-gap-required-level" class="form-label">Required Level*</label>
                <input id="edit-gap-required-level" type="number" name="required_level"
                       class="form-control required-level" min="1" max="5" required>
              </div>
              <div class="col-md-4 mb-3">
                <label for="edit-gap-current-level" class="form-label">Current Level*</label>
                <input id="edit-gap-current-level" type="number" name="current_level"
                       class="form-control current-level" min="1" max="5" required>
              </div>
              <div class="col-md-4 offset-md-8 mb-3">
                <label for="edit-gap-value" class="form-label">Gap</label>
                <input id="edit-gap-value" type="number" name="gap"
                       class="form-control gap-field readonly-field" readonly>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Add Gap Modal -->
  <div class="modal fade" id="addGapModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form method="POST" action="{{ route('competency_gap_analysis.store') }}">
        @csrf
        <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title">Add New Gap Record</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row g-3 mb-4">
              <div class="col-md-6">
                <label for="add-employee-id" class="form-label">Employee*</label>
                <select id="add-employee-id" name="employee_id" class="form-select" required>
                  <option value="">Select Employee</option>
                  @foreach($employees as $emp)
                    <option value="{{ $emp->employee_id }}">{{ $emp->first_name }} {{ $emp->last_name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label for="add-competency-id" class="form-label">Competency*</label>
                <select id="add-competency-id" name="competency_id" class="form-select" required>
                  <option value="">Select Competency</option>
                  @foreach($competencies as $comp)
                    <option value="{{ $comp->id }}" data-rate="{{ $comp->rate }}">
                      {{ $comp->competency_name }} (Rate: {{ $comp->rate }})
                    </option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="gap-calc-fields">
              <div class="row g-3 align-items-end">
                <div class="col-md-4">
                  <label for="add-rate" class="form-label">Competency Rate</label>
                  <input id="add-rate" type="number" class="form-control readonly-field" readonly>
                </div>
                <div class="col-md-4">
                  <label for="add-required-level" class="form-label">Required Level*</label>
                  <input id="add-required-level" type="number" name="required_level"
                    class="form-control required-level" min="1" max="5" value="5" required>
                </div>
                <div class="col-md-4">
                  <label for="add-current-level" class="form-label">Current Level*</label>
                  <input id="add-current-level" type="number" name="current_level"
                    class="form-control current-level" min="1" max="5" required>
                </div>
                <div class="col-md-4 offset-md-8">
                  <label for="add-gap" class="form-label">Gap</label>
                  <input id="add-gap" type="number" name="gap"
                    class="form-control gap-field readonly-field" readonly>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save Record</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Initialize Bootstrap modals
      const editCompetencyModal = new bootstrap.Modal(document.getElementById('editCompetencyModal'));
      const editGapModal = new bootstrap.Modal(document.getElementById('editGapModal'));
      const addGapModal = new bootstrap.Modal(document.getElementById('addGapModal'));
      const addCompetencyModal = new bootstrap.Modal(document.getElementById('addCompetencyModal'));

      // ========== COMPETENCY EDIT FUNCTIONALITY ==========
      document.querySelectorAll('.edit-competency-btn').forEach(btn => {
        btn.addEventListener('click', function() {
          const id = this.getAttribute('data-id');
          const name = this.getAttribute('data-name');
          const description = this.getAttribute('data-description');
          const category = this.getAttribute('data-category');
          const rate = this.getAttribute('data-rate');

          // Set form action URL
          document.getElementById('editCompetencyForm').action = `/competency_library/${id}`;

          // Populate form fields
          document.getElementById('edit-competency-name').value = name;
          document.getElementById('edit-description').value = description;
          document.getElementById('edit-category').value = category;
          document.getElementById('edit-rate').value = rate;

          // Show modal
          editCompetencyModal.show();
        });
      });

      // ========== GAP EDIT FUNCTIONALITY ==========
      document.querySelectorAll('.edit-gap-btn').forEach(btn => {
        btn.addEventListener('click', function() {
          const id = this.getAttribute('data-id');
          const employeeId = this.getAttribute('data-employee-id');
          const competencyId = this.getAttribute('data-competency-id');
          const rate = this.getAttribute('data-rate');
          const requiredLevel = this.getAttribute('data-required-level');
          const currentLevel = this.getAttribute('data-current-level');
          const gap = this.getAttribute('data-gap');

          // Set form action URL
          document.getElementById('editGapForm').action = `/competency_gap_analysis/${id}`;

          // Populate form fields
          document.getElementById('edit-gap-employee-id').value = employeeId;
          document.getElementById('edit-gap-competency-id').value = competencyId;
          document.getElementById('edit-gap-rate').value = rate;
          document.getElementById('edit-gap-required-level').value = requiredLevel;
          document.getElementById('edit-gap-current-level').value = currentLevel;
          document.getElementById('edit-gap-value').value = gap;

          // Show modal
          editGapModal.show();
        });
      });

      // ========== ADD GAP BUTTON ==========
      document.getElementById('addGapBtn')?.addEventListener('click', function() {
        addGapModal.show();
      });

      // ========== GAP CALCULATION ==========
      const calculateGap = (inputElement) => {
        const container = inputElement.closest('.modal-body') || inputElement.closest('.gap-calc-fields');
        if (!container) return;

        const requiredInput = container.querySelector('.required-level');
        const currentInput = container.querySelector('.current-level');
        const gapField = container.querySelector('.gap-field');
        const rateInput = container.querySelector('[id$="-rate"]');

        if (!requiredInput || !currentInput || !gapField) return;

        const required = parseInt(requiredInput.value) || 0;
        const current = parseInt(currentInput.value) || 0;
        const maxRate = parseInt(rateInput?.value) || 5;

        // Ensure current level doesn't exceed max rate
        if (currentInput.value > maxRate) {
          currentInput.value = maxRate;
        }

        gapField.value = required - current;
      };

      document.addEventListener('input', (e) => {
        if (e.target.classList.contains('required-level') || e.target.classList.contains('current-level')) {
          calculateGap(e.target);
        }
      });

      // ========== RATE AUTO-FILL ==========
      document.querySelectorAll('[id$="-competency-id"]').forEach(select => {
        select.addEventListener('change', function() {
          const selectedOption = this.options[this.selectedIndex];
          const rate = selectedOption?.getAttribute('data-rate') || '';
          const modalBody = this.closest('.modal-body');

          if (modalBody) {
            const rateInput = modalBody.querySelector('[id$="-rate"]');
            if (rateInput) rateInput.value = rate;

            // Update max values for level inputs
            const requiredInput = modalBody.querySelector('.required-level');
            const currentInput = modalBody.querySelector('.current-level');
            if (requiredInput) requiredInput.max = rate;
            if (currentInput) currentInput.max = rate;
          }
        });
      });

      // ========== SEARCH FUNCTIONALITY ==========
      const gapSearch = document.getElementById('gap-search');
      if (gapSearch) {
        gapSearch.addEventListener('input', function() {
          const searchValue = this.value.trim().toLowerCase();
          document.querySelectorAll('.gap-row').forEach(row => {
            const employeeCell = row.querySelector('.gap-employee');
            const shouldShow = employeeCell && employeeCell.textContent.toLowerCase().includes(searchValue);
            row.style.display = shouldShow ? '' : 'none';
          });
        });
      }

      // Initialize gap calculation for any pre-filled values
      document.querySelectorAll('.required-level, .current-level').forEach(input => {
        calculateGap(input);
      });
    });
  </script>
</body>
</html>
