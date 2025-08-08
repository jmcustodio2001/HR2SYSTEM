<link rel="stylesheet" href="{{ asset('assets/pages/waves/css/waves.min.css') }}" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/themify-icons/themify-icons.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.mCustomScrollbar.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
<style>
.pcoded-navbar {
    width: 250px !important;
    min-width: 270px !important;
    max-width: 500px;
    overflow-x: hidden;
}

.pcoded-inner-navbar {
    width: 100%;
}

.pcoded-item li a {
    position: relative;
    white-space: nowrap; /* Force single line */
    overflow: hidden;     /* Hide overflow */
    text-overflow: ellipsis; /* Add ellipsis if text is too long */
    transition: background 0.2s, color 0.2s;
    font-size: 1.05rem !important;
    font-weight: 500;
    line-height: 1.3;
    padding-top: 12px;
    padding-bottom: 12px;
    display: flex;
    align-items: center;
}

.pcoded-mtext {
    white-space: nowrap; /* Prevent wrapping */
    overflow: hidden;
    text-overflow: ellipsis;
    display: inline-block;
    width: 100%;
}
</style>


<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img src="{{ asset('assets/images/avatar-4.jpg') }}" alt="User Avatar">
                <div class="user-details">
                    <span id="more-details">{{ auth()->user()->name }}<i class="fa fa-caret-down"></i></span>
                </div>
            </div>
            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="#"><i class="ti-settings"></i>Settings</a>
                        <a href="{{ route('sign-in') }}"><i class="ti-layout-sidebar-left"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="p-15 p-b-0">
            <form class="form-material">
                <div class="form-group form-primary">
                    <input type="text" id="footer-email" name="footer-email" class="form-control" required="">
                    <span class="form-bar"></span>
                    <label class="float-label" for="footer-email"><i class="fa fa-search m-r-10"></i>Search</label>
                </div>
            </form>
        </div>

        <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Layout</div>
        <ul class="pcoded-item pcoded-left-item">
<li style="margin-bottom: 0.75rem;">
    <a href="#" title="Leave Application & Balance" class="waves-effect waves-dark hover-expand" style="font-size: 1rem; font-weight: normal;">
        <span class="pcoded-micon"><i class="ti-calendar"></i></span>
        <span class="pcoded-mtext" style="white-space: normal; display: inline-block;">Leave & Balance</span>
        <span class="pcoded-mcaret"></span>
    </a>
</li>
<li style="margin-bottom: 0.75rem;">
    <a href="/employee/employee_module/attendance_logs" title="Attendance & Time Logs" class="waves-effect waves-dark hover-expand" style="font-size: 1rem; font-weight: normal;">
        <span class="pcoded-micon"><i class="ti-time"></i></span>
        <span class="pcoded-mtext" style="white-space: normal; display: inline-block;">Attendance & Time Logs</span>
        <span class="pcoded-mcaret"></span>
    </a>
</li>
<li style="margin-bottom: 0.75rem;">
    <a href="/dashboard/training_admin" title="Payslip Access" class="waves-effect waves-dark hover-expand" style="font-size: 1rem; font-weight: normal;">
        <span class="pcoded-micon"><i class="ti-money"></i></span>
        <span class="pcoded-mtext" style="white-space: normal; display: inline-block;">Payslip Access</span>
        <span class="pcoded-mcaret"></span>
    </a>
</li>
<li style="margin-bottom: 0.75rem;">
    <a href="{{ route("employee_module.profile.update") }}" title="Profile Update" class="waves-effect waves-dark hover-expand" style="font-size: 1rem; font-weight: normal;">
        <span class="pcoded-micon"><i class="ti-id-badge"></i></span>
        <span class="pcoded-mtext" style="white-space: normal; display: inline-block;">Profile Update</span>
        <span class="pcoded-mcaret"></span>
    </a>
</li>
<li style="margin-bottom: 0.75rem;">
    <a href="/dashboard/succession_admin" title="Request Forms" class="waves-effect waves-dark hover-expand" style="font-size: 1rem; font-weight: normal;">
        <span class="pcoded-micon"><i class="ti-write"></i></span>
        <span class="pcoded-mtext" style="white-space: normal; display: inline-block;">Request Forms</span>
        <span class="pcoded-mcaret"></span>
    </a>
</li>
<li style="margin-bottom: 0.75rem;">
    <a href="/dashboard/succession_admin" title="My Trainings" class="waves-effect waves-dark hover-expand" style="font-size: 1rem; font-weight: normal;">
        <span class="pcoded-micon"><i class="ti-agenda"></i></span>
        <span class="pcoded-mtext" style="white-space: normal; display: inline-block;">My Trainings</span>
        <span class="pcoded-mcaret"></span>
    </a>
</li>
<li style="margin-bottom: 0.75rem;">
    <a href="/dashboard/succession_admin" title="Competency Progress Tracker" class="waves-effect waves-dark hover-expand" style="font-size: 1rem; font-weight: normal;">
        <span class="pcoded-micon"><i class="ti-bar-chart"></i></span>
        <span class="pcoded-mtext" style="white-space: normal; display: inline-block;">Competency Tracker</span>
        <span class="pcoded-mcaret"></span>
    </a>
</li>

</ul>
    </div>
</nav>
