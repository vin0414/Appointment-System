<header class="navbar navbar-expand-md d-none d-lg-flex d-print-none">
    <div class="container-xl">
        <!-- BEGIN NAVBAR TOGGLER -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
            aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- END NAVBAR TOGGLER -->
        <div class="navbar-nav flex-row order-md-last">
            <div class="d-none d-md-flex">
                <div class="nav-item">
                    <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode"
                        data-bs-toggle="tooltip" data-bs-placement="bottom">
                        <!-- Download SVG icon from http://tabler.io/icons/icon/moon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-1">
                            <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                        </svg>
                    </a>
                    <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode"
                        data-bs-toggle="tooltip" data-bs-placement="bottom">
                        <!-- Download SVG icon from http://tabler.io/icons/icon/sun -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-1">
                            <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                            <path
                                d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                        </svg>
                    </a>
                </div>
                <div class="nav-item dropdown d-none d-md-flex me-3">
                    <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                        aria-label="Show notifications">
                        <!-- Download SVG icon from http://tabler.io/icons/icon/bell -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-1">
                            <path
                                d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                            <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                        </svg>
                        <span class="badge bg-red text-white">0</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Notifications</h3>
                            </div>
                            <div class="list-group list-group-flush list-group-hoverable">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="{{ route("dashboard") }}" class="nav-link d-flex lh-1 p-0 px-2" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <span class="avatar avatar-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="icon icon-tabler icons-tabler-outline icon-tabler-user-circle">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                            <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                            <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                        </svg>
                    </span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ Auth::user()->name }}</div>
                        {{ Auth::user()->email }}
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="{{ route('profile') }}" class="dropdown-item">My Profile</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item">Sign-out</a>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                <!-- BEGIN NAVBAR MENU -->
                <ul class="navbar-nav">
                    <li class="nav-item <?= ($title=="Dashboard") ? 'active' :'' ?>">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-dashboard">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 13m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                    <path d="M13.45 11.55l2.05 -2.05" />
                                    <path d="M6.4 20a9 9 0 1 1 11.2 0z" />
                                </svg>
                            </span>
                            <span class="nav-link-title"> Dashboard </span>
                        </a>
                    </li>
                    <li class="nav-item <?= ($title=="Schools") ? 'active' :'' ?>">
                        <a class="nav-link" href="{{ route('schools') }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-school">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                                    <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" />
                                </svg>
                            </span>
                            <span class="nav-link-title"> Schools </span>
                        </a>
                    </li>
                    <li class="nav-item dropdown <?= ($title=="Records" || $title=="Reports") ? 'active' :'' ?>">
                        <a class="nav-link dropdown-toggle" href="#appointment" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-clock">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M10.5 21h-4.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v3" />
                                    <path d="M16 3v4" />
                                    <path d="M8 3v4" />
                                    <path d="M4 11h10" />
                                    <path d="M14 18a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                    <path d="M18 16.5v1.5l.5 .5" />
                                </svg>
                            </span>
                            <span class="nav-link-title">&nbsp;Appointment</span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item {{ request()->routeIs('appointment/records') ? 'active' : '' }}"
                                href="{{ route('appointment/records') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-brand-databricks">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 17l9 5l9 -5v-3l-9 5l-9 -5v-3l9 5l9 -5v-3l-9 5l-9 -5l9 -5l5.418 3.01" />
                                </svg>
                                Records
                            </a>
                            <a class="dropdown-item {{ request()->routeIs('appointment/reports') ? 'active' : '' }}"
                                href="{{ route('appointment/reports') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-report">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697" />
                                    <path d="M18 14v4h4" />
                                    <path d="M18 11v-4a2 2 0 0 0 -2 -2h-2" />
                                    <path d="M8 5a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2" />
                                    <path d="M14 18a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                    <path d="M8 11h4" />
                                    <path d="M8 15h3" />
                                </svg>
                                Reports
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown <?= ($title=="Career Advancement") ? 'active' :'' ?>">
                        <a class="nav-link dropdown-toggle" href="#classification" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-category">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 4h6v6h-6l0 -6" />
                                    <path d="M14 4h6v6h-6l0 -6" />
                                    <path d="M4 14h6v6h-6l0 -6" />
                                    <path d="M14 17a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                </svg>
                            </span>
                            <span class="nav-link-title">&nbsp;Career Advancement</span>
                        </a>
                        <div class="dropdown-menu">
                            <div class="dropend">
                                <a class="dropdown-item dropdown-toggle" href="#sidebar-ipcrf" data-bs-toggle="dropdown"
                                    data-bs-auto-close="outside" role="button" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-library">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M7 5.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667l0 -8.666" />
                                        <path
                                            d="M4.012 7.26a2.005 2.005 0 0 0 -1.012 1.737v10c0 1.1 .9 2 2 2h10c.75 0 1.158 -.385 1.5 -1" />
                                        <path d="M11 7h5" />
                                        <path d="M11 10h6" />
                                        <path d="M11 13h3" />
                                    </svg>
                                    IPCRF Management
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item {{ request()->routeIs('career-advancement/upload') ? 'active' : '' }}"
                                        href="{{ route('career-advancement/upload') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-cloud-upload">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M7 18a4.6 4.4 0 0 1 0 -9a5 4.5 0 0 1 11 2h1a3.5 3.5 0 0 1 0 7h-1" />
                                            <path d="M9 15l3 -3l3 3" />
                                            <path d="M12 12l0 9" />
                                        </svg>
                                        Upload IPCRF
                                    </a>
                                    <a class="dropdown-item {{ request()->routeIs('career-advancement') ? 'active' : '' }}"
                                        href="{{ route('career-advancement') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-user-search">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                            <path d="M6 21v-2a4 4 0 0 1 4 -4h1.5" />
                                            <path d="M15 18a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                            <path d="M20.2 20.2l1.8 1.8" />
                                        </svg>
                                        Applicants IPCRF's
                                    </a>
                                </div>
                            </div>
                            <div class="dropend">
                                <a class="dropdown-item dropdown-toggle" href="#sidebar-reports"
                                    data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button"
                                    aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-report">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M8 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h5.697" />
                                        <path d="M18 14v4h4" />
                                        <path d="M18 11v-4a2 2 0 0 0 -2 -2h-2" />
                                        <path
                                            d="M8 5a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2" />
                                        <path d="M14 18a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                        <path d="M8 11h4" />
                                        <path d="M8 15h3" />
                                    </svg>
                                    Reports & Analytics
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item {{ request()->routeIs('career-advancement/reports/performance') ? 'active' : '' }}"
                                        href="{{ route('career-advancement/reports/performance') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-chart-bar">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M3 13a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1l0 -6" />
                                            <path
                                                d="M15 9a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1l0 -10" />
                                            <path
                                                d="M9 5a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v14a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1l0 -14" />
                                            <path d="M4 20h14" />
                                        </svg>
                                        Performance Rating
                                    </a>
                                    <a class="dropdown-item {{ request()->routeIs('career-advancement/reports/tracking') ? 'active' : '' }}"
                                        href="{{ route('career-advancement/reports/tracking') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-compass">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M8 16l2 -6l6 -2l-2 6l-6 2" />
                                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                            <path d="M12 3l0 2" />
                                            <path d="M12 19l0 2" />
                                            <path d="M3 12l2 0" />
                                            <path d="M19 12l2 0" />
                                        </svg>
                                        Compliance Tracking
                                    </a>
                                </div>
                            </div>
                            <a class="dropdown-item {{ request()->routeIs('career-advancement/documents') ? 'active' : '' }}"
                                href="{{ route('career-advancement/documents') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-folder-open">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M5 19l2.757 -7.351a1 1 0 0 1 .936 -.649h12.307a1 1 0 0 1 .986 1.164l-.996 5.211a2 2 0 0 1 -1.964 1.625h-14.026a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2h4l3 3h7a2 2 0 0 1 2 2v2" />
                                </svg>
                                Document Repositories
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown <?= ($title=="Maintenance") ? 'active' :'' ?>">
                        <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-adjustments-alt">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 8h4v4h-4l0 -4" />
                                    <path d="M6 4l0 4" />
                                    <path d="M6 12l0 8" />
                                    <path d="M10 14h4v4h-4l0 -4" />
                                    <path d="M12 4l0 10" />
                                    <path d="M12 18l0 2" />
                                    <path d="M16 5h4v4h-4l0 -4" />
                                    <path d="M18 4l0 1" />
                                    <path d="M18 9l0 11" />
                                </svg>
                            </span>
                            <span class="nav-link-title">&nbsp;Maintenance </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item {{ request()->routeIs('maintenance/recovery') ? 'active' : '' }}"
                                href="{{ route('maintenance/recovery') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-database-export">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M4 6c0 1.657 3.582 3 8 3s8 -1.343 8 -3s-3.582 -3 -8 -3s-8 1.343 -8 3" />
                                    <path d="M4 6v6c0 1.657 3.582 3 8 3c1.118 0 2.183 -.086 3.15 -.241" />
                                    <path d="M20 12v-6" />
                                    <path d="M4 12v6c0 1.657 3.582 3 8 3c.157 0 .312 -.002 .466 -.005" />
                                    <path d="M16 19h6" />
                                    <path d="M19 16l3 3l-3 3" />
                                </svg>
                                System Back-Up
                            </a>
                            <a class="dropdown-item {{ request()->routeIs('maintenance/accounts') ? 'active' : '' }}"
                                href="{{ route('maintenance/accounts') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 7a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                </svg>
                                Accounts
                            </a>
                            <a class="dropdown-item {{ request()->routeIs('maintenance/settings') ? 'active' : '' }}"
                                href="{{ route('maintenance/settings') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="icon icon-tabler icons-tabler-outline icon-tabler-settings">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065" />
                                    <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                </svg>
                                Settings
                            </a>
                        </div>
                    </li>
                </ul>
                <!-- END NAVBAR MENU -->
            </div>
        </div>
    </div>
</header>