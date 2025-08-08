<!DOCTYPE html>
<html lang="en">

<head>
    <title>JetLouge Travels Admin Portal</title>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <!-- Meta -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="description" content="Sign in to the Travel & Tours admin dashboard to manage bookings, customers, and travel packages." />
      <meta name="keywords" content="travel, tours, admin, dashboard, booking, vacation, holiday, management" />
      <meta name="author" content="Travel & Tours" />
      <!-- Favicon icon -->

      <link rel="icon" href="{{ asset('assets/images/hr2logo.png') }}" type="image/x-icon">
      <!-- Google font-->
      <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
      <!-- Required Fremwork -->
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap/css/bootstrap.min.css') }}">
      <!-- waves.css -->
      <link rel="stylesheet" href="{{ asset('assets/pages/waves/css/waves.min.css') }}" type="text/css" media="all">
      <!-- themify-icons line icon -->
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/themify-icons/themify-icons.css') }}">
      <!-- ico font -->
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/icofont/css/icofont.css') }}">
      <!-- Font Awesome -->
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/font-awesome/css/font-awesome.min.css') }}">
      <!-- Style.css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
  </head>

  <body themebg-pattern="theme1">
  <!-- Pre-loader start -->
  <div class="theme-loader">
      <div class="loader-track">
          <div class="preloader-wrapper">
              <div class="spinner-layer spinner-blue">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
              <div class="spinner-layer spinner-red">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>

              <div class="spinner-layer spinner-yellow">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>

              <div class="spinner-layer spinner-green">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Pre-loader end -->

    <section class="login-block">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
                <div class="col-md-7 col-lg-6">
                    <!-- Authentication card start -->
                    <form class="md-float-material form-material" method="POST" action="{{ url('/admin-sign-in') }}">
                        @csrf
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="text-center mb-4">
                                <img src="{{ asset('assets/images/hr2logo.png') }}" alt="Travelogix Logo" style="max-width: 250px; width: 60%; height: auto; min-width: 180px; min-height: 120px;">
                                </div>
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center">Jetlouge Travels Admin Portal</h3>
                                    </div>
                                </div>
                                @if ($errors->has('email'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                                <div class="form-group form-primary">
                                    <input type="text" id="email" name="email" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label" for="email">Email Address</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="password" id="password" name="password" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label" for="password">Password</label>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-10">Sign In</button>
                                    </div>
                                </div>
                                <hr/>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- JS login removed: classic form submit for session-based login -->
                    <!-- end of form -->
                </div>
            </div>
        </div>
        <!-- end of container-fluid -->
    </section>
<!-- Warning Section Ends -->
<!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>     <script type="text/javascript" src="{{ asset('assets/js/jquery-ui/jquery-ui.min.js') }} "></script>     <script type="text/javascript" src="{{ asset('assets/js/popper.js/popper.min.js') }}"></script>     <script type="text/javascript" src="{{ asset('assets/js/bootstrap/js/bootstrap.min.js') }} "></script>
<!-- waves js -->
<script src="{{ asset('assets/pages/waves/js/waves.min.js') }}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{ asset('assets/js/jquery-slimscroll/jquery.slimscroll.js') }} "></script>
<!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('assets/js/SmoothScroll.js') }}"></script>     <script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }} "></script>
<!-- i18next.min.js -->
<script type="text/javascript" src="{{ asset('assets/js/common-pages.js') }}"></script>
</body>
</html>
