<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Portal - Jetlouge Travels Admin</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Login Page Styles -->
  <link rel="stylesheet" href="{{ asset('assets/css/admin_login-style.css') }}">
</head>
<body>
  <div class="login-container">
    <div class="row g-0">
            <!-- Left Side - Welcome -->
            <div class="col-lg-6 login-left">
              <div class="floating-shapes">
                <div class="shape"></div>
                <div class="shape"></div>
                <div class="shape"></div>
              </div>

              <div class="logo-container">
                <div class="logo-box">
                  <img src="{{ asset("assets/images/jetlouge_logo.png") }}" alt="Jetlouge Travels">
                </div>
                <h1 class="brand-text">Jetlouge Travels</h1>
                <p class="brand-subtitle">Admin Portal</p>
              </div>

              <h2 class="welcome-text">Welcome Back!</h2>
              <p class="welcome-subtitle">
                Access your travel management dashboard to monitor bookings,
                manage customers, and grow your travel business.
              </p>

              <ul class="feature-list">
                <li>
                  <i class="bi bi-check"></i>
                  <span>Manage bookings & reservations</span>
                </li>
                <li>
                  <i class="bi bi-check"></i>
                  <span>Track customer interactions</span>
                </li>
                <li>
                  <i class="bi bi-check"></i>
                  <span>Monitor business analytics</span>
                </li>
                <li>
                  <i class="bi bi-check"></i>
                  <span>Secure admin access</span>
                </li>
              </ul>
            </div>

            <!-- Right Side - Login Form -->
            <div class="col-lg-6 login-right">
              <h3 class="text-center mb-4" style="color: var(--jetlouge-primary); font-weight: 700;">
                Sign In to Your Account
              </h3>
              @if($errors->any())
            <div class="alert alert-danger">
              {{ $errors->first() }}
              </div>
             @endif
              <form method="POST" action="{{ route('admin_login.post') }}">
                  @csrf
                  <div class="mb-3">
                    <label for="email" class="form-label fw-semibold">Email Address</label>
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="bi bi-envelope"></i>
                      </span>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label fw-semibold">Password</label>
                    <div class="input-group">
                      <span class="input-group-text">
                        <i class="bi bi-lock"></i>
                      </span>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                      <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                        <i class="bi bi-eye"></i>
                      </button>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-login mb-3">
                    <i class="bi bi-box-arrow-in-right me-2"></i>
                    Sign In
                  </button>
                  <hr class="my-4">
                </form>
            </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Password toggle functionality
      const togglePassword = document.getElementById('togglePassword');
      const passwordInput = document.getElementById('password');

      togglePassword.addEventListener('click', function() {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        const icon = this.querySelector('i');
        icon.classList.toggle('bi-eye');
        icon.classList.toggle('bi-eye-slash');
      });

      // Form submission
      const loginForm = document.getElementById('loginForm');
      loginForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;

        // Show loading state
        submitBtn.innerHTML = '<i class="bi bi-arrow-clockwise me-2"></i>Signing In...';
        submitBtn.disabled = true;

        // Simulate login process
        setTimeout(() => {
          // Redirect to dashboard
          window.location.href = 'index.html';
        }, 2000);
      });

      // Add floating animation to shapes
      const shapes = document.querySelectorAll('.shape');
      shapes.forEach((shape, index) => {
        shape.style.animationDelay = `${index * 2}s`;
      });
    });
  </script>
</body>
</html>
