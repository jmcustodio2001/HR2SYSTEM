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
  <link rel="stylesheet" href="{{ asset('assets/css/admin_dashboard-style.css') }}">

  <style>
    /* Make modal dialog truly full-screen for fill-up box */
    .modal-dialog {
      max-width: 200vw !important;
      width: 100vw !important;
      height: 100% !important;
      margin: auto !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
    }
    .modal-content {
      width: 300% !important;
      height: 100% !important;
      overflow-y: auto !important;
      border-radius: 0.5 !important;
      display: flex !important;
      flex-direction: column !important;
      justify-content: center !important;
    }
    /* Remove modal backdrop */
    .modal-backdrop {
      display: none !important;
    }
    @media (max-width: 991px) {
      .modal-dialog, .modal-content {
        max-width: 100vw !important;
        width: 100vw !important;
        height: 100vh !important;
      }
    }
    .star-rating {
      display: flex;
      flex-direction: row-reverse;
      justify-content: flex-end;
    }
    .star-rating input {
      display: none;
    }
    .star-rating label {
      font-size: 1.5rem;
      color: #ccc;
      cursor: pointer;
      padding: 0 0.1rem;
    }
    .star-rating input:checked ~ label,
    .star-rating input:hover ~ label {
      color: #ffc107;
    }
    /* New styles for improved form layout */
    .form-section {
      background-color: #f8f9fa;
      border-radius: 8px;
      padding: 20px;
      margin-bottom: 20px;
    }
    .form-section h6 {
      color: #495057;
      border-bottom: 1px solid #dee2e6;
      padding-bottom: 8px;
      margin-bottom: 15px;
    }
    .form-label {
      font-weight: 500;
      color: #495057;
    }
    .form-control, .form-select {
      border-radius: 6px;
      padding: 10px 15px;
    }
    .table-actions {
      display: flex;
      gap: 5px;
    }
    .table-actions .btn {
      padding: 0.25rem 0.5rem;
      font-size: 0.875rem;
    }
    .table th {
      background-color: #f1f3f5;
      font-weight: 600;
    }
    /* New styles for the modal forms */
    .modal-form-header {
      font-size: 1.25rem;
      font-weight: 600;
      margin-bottom: 1.5rem;
    }
    .modal-form-section {
      margin-bottom: 1.5rem;
    }
    .modal-form-section-title {
      font-weight: 600;
      margin-bottom: 1rem;
      color: #495057;
    }
    .star-rating-container {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .rating-text {
      margin-left: 10px;
      font-size: 0.9rem;
      color: #6c757d;
    }
    .form-required::after {
      content: " *";
      color: #dc3545;
    }
  </style>
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
