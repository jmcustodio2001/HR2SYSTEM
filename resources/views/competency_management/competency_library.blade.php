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
            <h2 class="fw-bold mb-1">Competency Library</h2>
            <p class="text-muted mb-0">
              Welcome back,
              @if(Auth::check())
                {{ Auth::user()->name }}
              @else
                Admin
              @endif
              ! Here's your Competency Library.
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

    <!-- Success Flash -->
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <div class="card shadow-sm mb-4">
      <div class="card-header bg-white py-3 px-4 d-flex flex-wrap justify-content-between align-items-center border-bottom">
        <div class="d-flex align-items-center gap-2">
          <h4 class="mb-0 fw-bold text-dark">Competency List</h4>
        </div>
        <div class="d-flex gap-2">
          <button class="btn btn-accent px-3 py-2 d-flex align-items-center gap-2 shadow-sm" data-bs-toggle="modal" data-bs-target="#addCompetencyModal">
            <i class="bi bi-plus-circle fs-5"></i> <span class="fw-semibold">Add Competency</span>
          </button>
        </div>
      </div>
      <div class="card-body px-4 pb-4 pt-3">
        <div class="table-responsive rounded shadow-sm border">
          <table class="table table-hover align-middle mb-0 table-bordered table-striped">
            <thead class="table-light">
              <tr>
                <th class="text-center">ID</th>
                <th>Competency Name</th>
                <th>Description</th>
                <th>Category</th>
                <th class="text-center">Proficiency</th>
                <th class="text-center">Created</th>
                <th class="text-center">Updated</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
              @forelse($competencies as $index => $comp)
                <tr class="align-middle competency-row" data-id="{{ $comp->id }}">
                  <td class="fw-bold text-center">{{ $index + 1 }}</td>
                  <td class="fw-semibold text-dark">{{ $comp->competency_name }}</td>
                  <td class="text-muted">{{ Str::limit($comp->description, 50) }}</td>
                  <td><span class="badge bg-primary px-2 py-1">{{ $comp->category }}</span></td>
                  <td class="text-center">
                    <div class="d-flex align-items-center justify-content-center gap-1">
                      @for($i = 1; $i <= 5; $i++)
                        @if($i <= $comp->rate)
                          <i class="bi bi-star-fill text-warning"></i>
                        @else
                          <i class="bi bi-star text-secondary"></i>
                        @endif
                      @endfor
                      <span class="ms-2 small text-dark">{{ $comp->rate }}/5</span>
                    </div>
                  </td>
                  <td class="small text-center text-muted">{{ $comp->created_at->format('M d, Y') }}</td>
                  <td class="small text-center text-muted">{{ $comp->updated_at->format('M d, Y') }}</td>
                  <td class="text-center">
                    <div class="d-flex justify-content-center gap-2">
                      <button
                        class="btn btn-sm btn-outline-primary d-flex align-items-center gap-1 px-2 py-1"
                        data-bs-toggle="modal"
                        data-bs-target="#editCompetencyModal{{ $comp->id }}"
                        title="Edit Competency"
                        aria-label="Edit Competency"
                      >
                        <i class="bi bi-pencil-square"></i> <span>Edit</span>
                      </button>
                      <form
                        action="{{ route('competency_library.destroy', $comp->id) }}"
                        method="POST"
                        class="d-inline"
                        onsubmit="return confirm('Are you sure you want to delete this competency?');"
                      >
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger d-flex align-items-center gap-1 px-2 py-1" title="Delete Competency" aria-label="Delete Competency">
                          <i class="bi bi-trash"></i> <span>Delete</span>
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="8" class="text-center py-4 text-muted">
                    <i class="bi bi-info-circle-fill me-2"></i>No competencies found. Click "Add Competency" to create one.
                  </td>
                </tr>
              @endforelse
      <!-- Edit Modals: Rendered outside the table for proper overlay -->
      @foreach($competencies as $comp)
        <div class="modal fade" id="editCompetencyModal{{ $comp->id }}" tabindex="-1" aria-labelledby="editCompetencyLabel{{ $comp->id }}" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <form method="POST" action="{{ route('competency_library.update', $comp->id) }}">
              @csrf
              @method('PUT')
              <div class="modal-content" style="display: flex; flex-direction: column; max-height: 90vh;">
                <div class="modal-header modal-header-primary">
                  <h5 class="modal-title text-white" id="editCompetencyLabel{{ $comp->id }}">Edit Competency</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="overflow-y: auto; max-height: 60vh;">
                  <div class="modal-form-header">Competency Details</div>
                  <div class="row modal-form-row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="competency_name_{{ $comp->id }}" class="form-label form-required">Competency Name</label>
                        <input
                          id="competency_name_{{ $comp->id }}"
                          name="competency_name"
                          type="text"
                          class="form-control"
                          value="{{ old('competency_name', $comp->competency_name) }}"
                          required
                          placeholder="Enter competency name"
                        />
                        @error('competency_name')
                          <div class="text-danger small">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="category_{{ $comp->id }}" class="form-label form-required">Category</label>
                        <select
                          id="category_{{ $comp->id }}"
                          name="category"
                          class="form-select"
                          required
                        >
                          <option value="" disabled>Select category</option>
                          <option value="Technical" {{ old('category', $comp->category) == 'Technical' ? 'selected' : '' }}>Technical</option>
                          <option value="Behavioral" {{ old('category', $comp->category) == 'Behavioral' ? 'selected' : '' }}>Behavioral</option>
                          <option value="Leadership" {{ old('category', $comp->category) == 'Leadership' ? 'selected' : '' }}>Leadership</option>
                          <option value="Functional" {{ old('category', $comp->category) == 'Functional' ? 'selected' : '' }}>Functional</option>
                        </select>
                        @error('category')
                          <div class="text-danger small">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="description_{{ $comp->id }}" class="form-label">Description</label>
                    <textarea
                      id="description_{{ $comp->id }}"
                      name="description"
                      class="form-control"
                      rows="3"
                      placeholder="Enter detailed description of the competency"
                    >{{ old('description', $comp->description) }}</textarea>
                    @error('description')
                      <div class="text-danger small">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label class="form-label form-required">Proficiency Level</label>
                    <div class="star-rating-container">
                      <div class="star-rating">
                        @for($i = 5; $i >= 1; $i--)
                          <input
                            type="radio"
                            id="rate_{{ $comp->id }}_{{ $i }}"
                            name="rate"
                            value="{{ $i }}"
                            {{ old('rate', $comp->rate) == $i ? 'checked' : '' }}
                            required
                          >
                          <label for="rate_{{ $comp->id }}_{{ $i }}">★</label>
                        @endfor
                      </div>
                      <span class="rating-text">
                        @if($comp->rate == 1) Basic
                        @elseif($comp->rate == 2) Novice
                        @elseif($comp->rate == 3) Intermediate
                        @elseif($comp->rate == 4) Advanced
                        @else Expert
                        @endif
                      </span>
                    </div>
                    <div class="d-flex justify-content-between mt-2 small text-muted">
                      <span>Basic</span>
                      <span>Expert</span>
                    </div>
                    @error('rate')
                      <div class="text-danger small">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="modal-footer" style="position: sticky; bottom: 0; background: #fff; z-index: 2; box-shadow: 0 -2px 8px rgba(0,0,0,0.04);">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">Update Competency</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addCompetencyModal" tabindex="-1" aria-labelledby="addCompetencyLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form method="POST" action="{{ route('competency_library.store') }}">
            @csrf
            <div class="modal-header modal-header-primary">
              <h5 class="modal-title text-white" id="addCompetencyLabel">Add New Competency</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="modal-form-header">Competency Details</div>

              <div class="row modal-form-row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="competency_name" class="form-label form-required">Competency Name</label>
                    <input
                      id="competency_name"
                      name="competency_name"
                      type="text"
                      class="form-control"
                      value="{{ old('competency_name') }}"
                      required
                      placeholder="Enter competency name"
                    />
                    @error('competency_name')
                      <div class="text-danger small">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="category" class="form-label form-required">Category</label>
                    <select
                      id="category"
                      name="category"
                      class="form-select"
                      required
                    >
                      <option value="" disabled selected>Select category</option>
                      <option value="Technical" {{ old('category') == 'Technical' ? 'selected' : '' }}>Technical</option>
                      <option value="Behavioral" {{ old('category') == 'Behavioral' ? 'selected' : '' }}>Behavioral</option>
                      <option value="Leadership" {{ old('category') == 'Leadership' ? 'selected' : '' }}>Leadership</option>
                      <option value="Functional" {{ old('category') == 'Functional' ? 'selected' : '' }}>Functional</option>
                    </select>
                    @error('category')
                      <div class="text-danger small">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="description" class="form-label">Description</label>
                <textarea
                  id="description"
                  name="description"
                  class="form-control"
                  rows="3"
                  placeholder="Enter detailed description of the competency"
                >{{ old('description') }}</textarea>
                @error('description')
                  <div class="text-danger small">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label class="form-label form-required">Proficiency Level</label>
                <div class="star-rating-container">
                  <div class="star-rating">
                    @for($i = 5; $i >= 1; $i--)
                      <input
                        type="radio"
                        id="rate_{{ $i }}"
                        name="rate"
                        value="{{ $i }}"
                        {{ old('rate') == $i ? 'checked' : '' }}
                        required
                      >
                      <label for="rate_{{ $i }}">★</label>
                    @endfor
                  </div>
                  <span class="rating-text">
                    @if(old('rate') == 1) Basic
                    @elseif(old('rate') == 2) Novice
                    @elseif(old('rate') == 3) Intermediate
                    @elseif(old('rate') == 4) Advanced
                    @elseif(old('rate') == 5) Expert
                    @else Select level
                    @endif
                  </span>
                </div>
                <div class="d-flex justify-content-between mt-2 small text-muted">
                  <span>Basic</span>
                  <span>Expert</span>
                </div>
                @error('rate')
                  <div class="text-danger small">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Create Competency</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Sidebar toggle functionality -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const menuBtn = document.getElementById('menu-btn');
      const desktopToggle = document.getElementById('desktop-toggle');
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('overlay');
      const mainContent = document.getElementById('main-content');

      if (menuBtn && sidebar && overlay) {
        menuBtn.addEventListener('click', (e) => {
          e.preventDefault();
          sidebar.classList.toggle('active');
          overlay.classList.toggle('show');
          document.body.style.overflow = sidebar.classList.contains('active') ? 'hidden' : '';
        });
      }

      if (desktopToggle && sidebar && mainContent) {
        desktopToggle.addEventListener('click', (e) => {
          e.preventDefault();
          sidebar.classList.toggle('collapsed');
          mainContent.classList.toggle('expanded');
          localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
        });
      }

      const savedState = localStorage.getItem('sidebarCollapsed');
      if (savedState === 'true' && sidebar && mainContent) {
        sidebar.classList.add('collapsed');
        mainContent.classList.add('expanded');
      }

      if (overlay) {
        overlay.addEventListener('click', () => {
          sidebar.classList.remove('active');
          overlay.classList.remove('show');
          document.body.style.overflow = '';
        });
      }

      // Hide overlay automatically when any Bootstrap modal is shown
      document.addEventListener('show.bs.modal', function () {
        if (overlay && overlay.classList.contains('show')) {
          overlay.classList.remove('show');
          sidebar.classList.remove('active');
          document.body.style.overflow = '';
        }
      });

      // Star rating hover effect and text update
      document.querySelectorAll('.star-rating').forEach(rating => {
        const stars = rating.querySelectorAll('input[type="radio"]');
        const ratingText = rating.closest('.star-rating-container').querySelector('.rating-text');

        stars.forEach(star => {
          star.addEventListener('change', function() {
            const value = this.value;
            let proficiency = '';
            if (value == 1) proficiency = 'Basic';
            else if (value == 2) proficiency = 'Novice';
            else if (value == 3) proficiency = 'Intermediate';
            else if (value == 4) proficiency = 'Advanced';
            else proficiency = 'Expert';
            ratingText.textContent = proficiency;
          });

          star.addEventListener('mouseover', function() {
            const value = this.value;
            const labels = rating.querySelectorAll('label');
            labels.forEach((label, index) => {
              if (5 - index <= value) {
                label.style.color = '#f39c12';
              }
            });
          });

          star.addEventListener('mouseout', function() {
            const checked = rating.querySelector('input[type="radio"]:checked');
            const labels = rating.querySelectorAll('label');
            labels.forEach((label, index) => {
              if (!checked || 5 - index > checked.value) {
                label.style.color = '#ddd';
              } else {
                label.style.color = '#f39c12';
              }
            });
          });
        });

        // Initialize rating text
        const checked = rating.querySelector('input[type="radio"]:checked');
        if (checked) {
          const value = checked.value;
          let proficiency = '';
          if (value == 1) proficiency = 'Basic';
          else if (value == 2) proficiency = 'Novice';
          else if (value == 3) proficiency = 'Intermediate';
          else if (value == 4) proficiency = 'Advanced';
          else proficiency = 'Expert';
          ratingText.textContent = proficiency;
        }
      });

      // Row selection logic for Edit button
      let selectedCompetencyId = null;
      document.querySelectorAll('.competency-row').forEach(row => {
        row.addEventListener('click', function() {
          document.querySelectorAll('.competency-row').forEach(r => r.classList.remove('table-active'));
          this.classList.add('table-active');
          selectedCompetencyId = this.getAttribute('data-id');
          document.getElementById('editCompetencyBtn').disabled = false;
        });
      });
      document.getElementById('editCompetencyBtn').addEventListener('click', function() {
        if (selectedCompetencyId) {
          const modal = document.getElementById('editCompetencyModal' + selectedCompetencyId);
          if (modal) {
            const modalInstance = new bootstrap.Modal(modal);
            modalInstance.show();
          }
        }
      });
    });
  </script>
</body>
</html>
