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
                <img class="img-80 img-radius" src="assets/images/avatar-4.jpg" alt="User-Profile">
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
            <li>
                <a href="/dashboard/competency_admin" title="Competency Management" class="waves-effect waves-dark" style="font-size: 1rem; font-weight: normal;">
                    <span class="pcoded-micon"><i class="ti-star"></i></span>
<span class="pcoded-mtext" style="white-space: normal;">Competency Management</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="/dashboard/learning_admin" title="Learning Management" class="waves-effect waves-dark" style="font-size: 100%; font-weight: normal;">
                    <span class="pcoded-micon"><i class="ti-book"></i></span>
<span class="pcoded-mtext" style="white-space: normal;">Learning Management</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="/dashboard/training_admin" title="Training Management" class="waves-effect waves-dark" style="font-size: 1rem; font-weight: normal;">
                    <span class="pcoded-micon"><i class="ti-blackboard"></i></span>
<span class="pcoded-mtext" style="white-space: normal;">Training Management</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="/dashboard/self-service_admin" title="Employee Self-Service" class="waves-effect waves-dark" style="font-size: 1rem; font-weight: normal;">
                    <span class="pcoded-micon"><i class="ti-user"></i></span>
<span class="pcoded-mtext" style="white-space: normal;">Employee Self-Service</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="/dashboard/succession_admin" title="Succession Planning" class="waves-effect waves-dark" style="font-size: 1rem; font-weight: normal;">
                    <span class="pcoded-micon"><i class="ti-crown"></i></span>
<span class="pcoded-mtext" style="white-space: normal;">Succession Planning</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
    </div>
</nav>
