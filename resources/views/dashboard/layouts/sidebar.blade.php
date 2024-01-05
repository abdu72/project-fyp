<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-body-tertiary sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : ''}}" aria-current="page" href="/dashboard">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/posts') ? 'active' : ''}}" href="/dashboard/posts">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Wills
                </a>
            </li>
        </ul>

        <h6
            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
            <span>History Calculation</span>


        </h6>




        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/history') ? 'active' : ''}}" href="/dashboard/history">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    History
                </a>
            </li>
        </ul>


        @can('admin')
        <h6
            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
            <span>Admin</span>


        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/post') ? 'active' : ''}}" href="/dashboard/post">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    User Controll
                </a>
            </li>
        </ul>
        @endcan

        @can('admin')
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('/dashboard/user-details') ? 'active' : ''}}"
                    href="/dashboard/user-details">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    User Details
                </a>
            </li>
        </ul>
        @endcan





    </div>
</nav>