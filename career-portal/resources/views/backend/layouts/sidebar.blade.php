<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.') }}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.') }}"
                        class="nav-link  {{ request()->routeIs('admin.') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>
                </li>
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.jobs.index') }}"
                        class="nav-link {{ request()->routeIs('admin.jobs.*') ? 'active' : '' }}">
                        <i class="fa  fa-smile nav-icon"></i>
                        <p>Jobs</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}"
                        class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <i class="fa  fa-users nav-icon"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.categories.index') }}"
                        class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                        <i class="fa fa-tags nav-icon"></i>
                        <p>Categories</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.cvs.index') }}"
                        class="nav-link {{ request()->routeIs('admin.cvs.*') ? 'active' : '' }}">
                        <i class="fa  fa-book nav-icon"></i>
                        <p>CV</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.coverletters.index') }}"
                        class="nav-link {{ request()->routeIs('admin.coverletters.*') ? 'active' : '' }}">
                        <i class="fa fa-file nav-icon"></i>
                        <p>Cover letter</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.jobtypes.index') }}"
                        class="nav-link {{ request()->routeIs('admin.jobtypes.*') ? 'active' : '' }}">
                        <i class="fa  fa-th-large nav-icon"></i>
                        <p>job Types</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.experticeslevel.index') }}"
                        class="nav-link {{ request()->routeIs('admin.experticeslevel.*') ? 'active' : '' }}">
                        <i class="fa  fa-graduation-cap nav-icon"></i>
                        <p>Expertice Level</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.programs.index') }}"
                        class="nav-link {{ request()->routeIs('admin.programs.*') ? 'active' : '' }}">
                        <i class="fa fa-industry nav-icon"></i>
                        <p>Programs</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.events.index') }}"
                        class="nav-link {{ request()->routeIs('admin.events.*') ? 'active' : '' }}">
                        <i class="fa fa-camera nav-icon"></i>
                        <p>Events</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.carousels.index') }}"
                        class="nav-link {{ request()->routeIs('admin.carousels.*') ? 'active' : '' }}">
                        <i class="fa fa-flag nav-icon"></i>
                        <p>Carousels</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.photos.index') }}"
                        class="nav-link {{ request()->routeIs('admin.photos.*') ? 'active' : '' }}">
                        <i class="fa fa-image nav-icon"></i>
                        <p>Photos</p>
                    </a>
                </li>


        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
