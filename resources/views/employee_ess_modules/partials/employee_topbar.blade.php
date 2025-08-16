<!-- Employee Topbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: var(--jetlouge-primary);" aria-label="Main Navigation">
  <div class="container-fluid">
    <button class="sidebar-toggle desktop-toggle me-3" id="desktop-toggle" title="Toggle Sidebar">
      <i class="bi bi-list fs-5"></i>
    </button>
    <a class="navbar-brand fw-bold" href="#">
      <i class="bi bi-person-badge me-2"></i>Jetlouge Agent Portal
    </a>
    <div class="d-flex align-items-center">
      <div class="dropdown me-3">
        <button class="btn btn-outline-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">
          <i class="bi bi-bell"></i>
          <span class="badge bg-danger ms-1">3</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><h6 class="dropdown-header">Notifications</h6></li>
          <li><a class="dropdown-item" href="#"><i class="bi bi-calendar-check me-2"></i>New booking request</a></li>
          <li><a class="dropdown-item" href="#"><i class="bi bi-person-plus me-2"></i>Customer inquiry</a></li>
          <li><a class="dropdown-item" href="#"><i class="bi bi-exclamation-triangle me-2"></i>Payment pending</a></li>
        </ul>
      </div>
      <button class="sidebar-toggle mobile-toggle" id="menu-btn" title="Open Menu">
        <i class="bi bi-list fs-5"></i>
      </button>
    </div>
  </div>
</nav>
