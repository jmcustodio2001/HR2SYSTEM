<!-- Sidebar -->
<aside id="sidebar" class="bg-white border-end p-3 shadow-sm">
  <!-- Profile Section -->
  <div class="profile-section text-center">
    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face"
         alt="Admin Profile" class="profile-img mb-2">
    <h6 class="fw-semibold mb-1">
      @if(Auth::check())
        {{ Auth::user()->name }}
      @else
        Admin
      @endif
    </h6>
    <small class="text-muted">Jetlouge Travels Admin</small>
  </div>

  <!-- Navigation Menu -->
  <ul class="nav flex-column">
   <li class="nav-item">
  <a href="#competencySubmenu" data-bs-toggle="collapse" aria-expanded="false" class="nav-link text-dark d-flex align-items-center">
    <i class="bi bi-bar-chart-line me-2"></i>
    <span>Competency Management</span>
  </a>
  <ul class="collapse list-unstyled ps-4" id="competencySubmenu">
    <li class="nav-item">
  <a href="{{ route('competency_library.index') }}" class="nav-link text-dark">
    <i class="bi bi-collection me-2"></i> Competency Library
</a>
    </li>
    <li class="nav-item">
  <a href="{{ route('employee_competency_profiles.index') }}" class="nav-link text-dark">
        <i class="bi bi-person-badge me-2"></i> Employee Competency Profile
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('competency_gap_analysis.index') }}" class="nav-link text-dark">
        <i class="bi bi-graph-up-arrow me-2"></i> Competency Gap/Analysis
      </a>
    </li>
  </ul>
</li>

<li class="nav-item">
  <a href="#learningSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="nav-link text-dark d-flex align-items-center">
    <i class="bi bi-book me-2"></i>
    <span>Learning Management</span>
  </a>
  <ul class="collapse list-unstyled ps-4" id="learningSubmenu">
    <li class="nav-item">
      <a href="{{ route ('course_management') }}" class="nav-link text-dark">
        <i class="bi bi-journal-text me-2"></i> Course Management
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route ('employee_training_dashboard') }}" class="nav-link text-dark">
        <i class="bi bi-speedometer2 me-2"></i> Employee Training Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('training_certificates') }}" class="nav-link text-dark">
        <i class="bi bi-award me-2"></i> Training Record & Certificate Tracking
      </a>
    </li>
  </ul>
</li>


<li class="nav-item">
  <a href="#trainingSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="nav-link text-dark d-flex align-items-center">
    <i class="bi bi-easel me-2"></i>
    <span>Training Management</span>
  </a>
  <ul class="collapse list-unstyled ps-4" id="trainingSubmenu">
    <li class="nav-item">
      <a href="{{ route('destination_knowledge_training') }}" class="nav-link text-dark">
        <i class="bi bi-geo-alt me-2"></i> Destination Knowledge Training
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route('customer_service_sales_skills_training') }}" class="nav-link text-dark">
        <i class="bi bi-people me-2"></i> Customer Service & Sales Skills Training
      </a>
    </li>
  </ul>
</li>


<li class="nav-item">
  <a href="#essSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="nav-link text-dark d-flex align-items-center">
    <i class="bi bi-person-badge me-2"></i>
    <span>Employee Self-Service</span>
  </a>
  <ul class="collapse list-unstyled ps-4" id="essSubmenu">
    <li class="nav-item">
      <a href="/employee-profile-update" class="nav-link text-dark">
        <i class="bi bi-pencil-square me-2"></i> Profile Update of Employee
      </a>
    </li>
    <li class="nav-item">
      <a href="/employee-request-forms" class="nav-link text-dark">
        <i class="bi bi-file-earmark-text me-2"></i> Request Forms of Employee
      </a>
    </li>
  </ul>
</li>


<li class="nav-item">
  <a href="#successionSubmenu" data-bs-toggle="collapse" aria-expanded="false" class="nav-link text-dark d-flex align-items-center">
    <i class="bi bi-diagram-3 me-2"></i>
    <span>Succession Planning</span>
  </a>
  <ul class="collapse list-unstyled ps-4" id="successionSubmenu">
    <li class="nav-item">
      <a href="{{ route ('potential_successor') }}" class="nav-link text-dark">
        <i class="bi bi-person-plus me-2"></i> Potential Successor Identification
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route ('succession_readiness_rating') }}" class="nav-link text-dark">
        <i class="bi bi-bar-chart me-2"></i> Succession Readiness Rating
      </a>
    </li>
    <li class="nav-item">
      <a href="{{ route ('succession_planning_dashboard') }}" class="nav-link text-dark">
        <i class="bi bi-grid-3x3-gap me-2"></i> Succession Planning Dashboard / Simulation Tools
      </a>
    </li>
  </ul>
</li>
    <li class="nav-item mt-3">
        <a href="{{ route('admin_login') }}" class="nav-link text-danger">
            <i class="bi bi-box-arrow-right me-2"></i> Logout
        </a>
    </li>
  </ul>
</aside>
