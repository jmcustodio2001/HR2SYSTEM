<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile Update</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Admin dashboard profile update page">
    <meta name="author" content="codedthemes" />

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/images/hr2logo.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/pages/waves/css/waves.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/icon/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/icon/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
<!-- Pre-loader -->
<div class="theme-loader">
    <div class="loader-track">
        <div class="preloader-wrapper">
            @foreach (['blue', 'red', 'yellow', 'green'] as $color)
                <div class="spinner-layer spinner-{{ $color }}">
                    <div class="circle-clipper left"><div class="circle"></div></div>
                    <div class="gap-patch"><div class="circle"></div></div>
                    <div class="circle-clipper right"><div class="circle"></div></div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
        @include('employee.employee_topbar')

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                @include('employee.employee_sidebar')

                <div class="pcoded-content">
                    <!-- Page-header start -->
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">Profile Update</h5>
                                        <p class="m-b-0">Manage your personal information</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <ul class="breadcrumb-title">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('employee_dashboard') }}"><i class="fa fa-home"></i></a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="{{ route('employee_dashboard') }}">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="{{ route('employee_module.profile') }}">Profile Update</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-header end -->

                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                <div class="page-body">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Update Profile</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('employee_module.profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Full Name (Read-only) -->
    <div class="form-group">
        <label for="name">Full Name</label>
        <input type="text" class="form-control" id="name" value="{{ auth()->user()->name }}" readonly>
    </div>

    <!-- Mobile Number -->
    <div class="form-group mt-3">
        <label for="mobile_number">Mobile Number</label>
        <input type="text" class="form-control" name="mobile_number" id="mobile_number"
            value="{{ old('mobile_number', auth()->user()->mobile_number) }}" required>
    </div>

    <!-- Email -->
    <div class="form-group mt-3">
        <label for="email">Personal Email</label>
        <input type="email" class="form-control" name="email" id="email"
            value="{{ old('email', auth()->user()->email) }}" required>
    </div>

    <!-- Present Address -->
    <div class="form-group mt-3">
        <label for="address">Present Address</label>
        <textarea class="form-control" name="address" id="address" rows="2" required>{{ old('address', auth()->user()->address) }}</textarea>
    </div>

    <!-- Emergency Contact Name -->
    <div class="form-group mt-3">
        <label for="emergency_contact_name">Emergency Contact Name</label>
        <input type="text" class="form-control" name="emergency_contact_name" id="emergency_contact_name"
            value="{{ old('emergency_contact_name', auth()->user()->emergency_contact_name) }}" required>
    </div>

    <!-- Emergency Contact Number -->
    <div class="form-group mt-3">
        <label for="emergency_contact_number">Emergency Contact Number</label>
        <input type="text" class="form-control" name="emergency_contact_number" id="emergency_contact_number"
            value="{{ old('emergency_contact_number', auth()->user()->emergency_contact_number) }}" required>
    </div>

    <!-- Government IDs -->
    <div class="form-group mt-3">
        <label for="sss_number">SSS Number</label>
        <input type="text" class="form-control" name="sss_number" id="sss_number"
            value="{{ old('sss_number', auth()->user()->sss_number) }}">
    </div>
    <div class="form-group mt-3">
        <label for="philhealth_number">PhilHealth Number</label>
        <input type="text" class="form-control" name="philhealth_number" id="philhealth_number"
            value="{{ old('philhealth_number', auth()->user()->philhealth_number) }}">
    </div>
    <div class="form-group mt-3">
        <label for="pagibig_number">Pag-IBIG Number</label>
        <input type="text" class="form-control" name="pagibig_number" id="pagibig_number"
            value="{{ old('pagibig_number', auth()->user()->pagibig_number) }}">
    </div>
    <div class="form-group mt-3">
        <label for="tin_number">TIN</label>
        <input type="text" class="form-control" name="tin_number" id="tin_number"
            value="{{ old('tin_number', auth()->user()->tin_number) }}">
    </div>

    <!-- Profile Photo -->
    <div class="form-group mt-3">
        <label for="photo">Profile Photo</label>
        <input type="file" class="form-control-file" name="photo" id="photo">
    </div>

    <!-- Submit -->
    <div class="form-group mt-4">
        <button type="submit" class="btn btn-primary">Update Profile</button>
    </div>
</form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="styleSelector"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Required JS -->
    <script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/pages/waves/js/waves.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/modernizr/modernizr.js') }}"></script>
    <script src="{{ asset('assets/js/SmoothScroll.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('assets/js/pcoded.min.js') }}"></script>
    <script src="{{ asset('assets/js/vertical-layout.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
