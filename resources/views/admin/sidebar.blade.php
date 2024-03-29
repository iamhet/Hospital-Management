<nav class="sidebar sidebar-offcanvas container" id="sidebar" style="margin-left: -50px;">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a href="home">
            <h1 class="mb-0 font-weight-normal">Devine </h1>
        </a>
        <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="admin/assets/images/logo-mini.svg"
                alt="logo" /></a>
    </div>
    <div>
        <ul class="nav">
            <li class="nav-item profile">
                <div class="profile-desc">
                    <div class="profile-pic">
                        <div class="count-indicator">
                            <img class="img-xs rounded-circle " src="{{ asset('admin/assets/images/faces/face15.jpg') }}"
                                alt="">
                            <span class="count bg-success"></span>
                        </div>
                        <div class="profile-name">
                            <h5 class="mb-0 font-weight-normal">Het Patel</h5>
                            <span>Gold Member</span>
                        </div>
                    </div>
                    <a href="#" id="profile-dropdown" data-bs-toggle="dropdown">
                        <i class="mdi mdi-dots-vertical"></i></a>
                    <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list"
                        aria-labelledby="profile-dropdown">
                        <a href="#" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-settings text-primary"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-onepassword  text-info"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-dark rounded-circle">
                                    <i class="mdi mdi-calendar-today text-success"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                            </div>
                        </a>
                    </div>
                </div>
            </li>
            <li class="nav-item menu-items">
                <a class="nav-link" href="{{ url('home') }}">
                    <span class="menu-icon">
                        <i class="mdi mdi-file-document-box"></i>
                    </span>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>

            @can('role_management')
                <li class="nav-item menu-items">
                    <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false"
                        aria-controls="auth">
                        <span class="menu-icon">
                            <i class="mdi mdi-file-document-box"></i>
                        </span>
                        <span class="menu-title">Role Management </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="auth">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{ route('roles.create') }}">Add
                                    Role</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('roles.index') }}">Manage
                                    Role</a></li>
                        </ul>
                    </div>
                </li>
            @endcan
            @can('user_management')
                <li class="nav-item menu-items">
                    <a class="nav-link" data-bs-toggle="collapse" href="#user" aria-expanded="false"
                        aria-controls="auth">
                        <span class="menu-icon">
                            <i class="mdi mdi-file-document-box"></i>
                        </span>
                        <span class="menu-title">User Management </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="user">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{ route('users.create') }}">Add
                                User</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('users.index') }}">Manage
                                    User</a></li>
                        </ul>
                    </div>
                </li>
            @endcan

            @can('doctor_management')
                <li class="nav-item menu-items">
                    <a class="nav-link" data-bs-toggle="collapse" href="#doctor" aria-expanded="false"
                        aria-controls="auth">
                        <span class="menu-icon">
                            <i class="mdi mdi-security"></i>
                        </span>
                        <span class="menu-title">Doctor Management</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="doctor">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{ url('doctor_index') }}"> Manage
                                    Doctor </a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('doctor.create') }}"> Add
                                    Doctor </a></li>
                        </ul>
                    </div>
                </li>
            @endcan

            @can('appointment_management')
                <li class="nav-item menu-items">
                    <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false"
                        aria-controls="auth">
                        <span class="menu-icon">
                            <i class="mdi mdi-file-document-box"></i>
                        </span>
                        <span class="menu-title">Appointment </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="auth">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link"
                                    href="{{ route('appointment.index') }}">Appointment</a></li>
                            <li class="nav-item"> <a class="nav-link"
                                    href="{{ url('approve_appointment') }}">Approved Appointment</a></li>
                            <li class="nav-item"> <a class="nav-link"
                                    href="{{ url('cancled_appointment') }}">Cancled Appointment</a></li>
                        </ul>
                    </div>
                </li>
            @endcan
            @can('appointment_management')
                <li class="nav-item menu-items">
                    <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false"
                        aria-controls="auth">
                        <span class="menu-icon">
                            <i class="mdi mdi-file-document-box"></i>
                        </span>
                        <span class="menu-title">News Management </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="auth">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{ route('news.create') }}">Add
                                    News</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('news.index') }}">News
                                    List</a></li>
                        </ul>
                    </div>
                </li>
            @endcan

        </ul>
    </div>
</nav>



@include('admin.script')