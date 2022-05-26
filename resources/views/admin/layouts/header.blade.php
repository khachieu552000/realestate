<header class="navbar navbar-expand-md navbar-light d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href=".">
                <img src="{{ asset('images/header-logo.7a6f7de8.svg') }}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
            </a>
        </h1>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="./index.html">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <polyline points="5 12 3 12 12 3 21 12 19 12" />
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                        </svg>
                    </span>
                    <span class="nav-link-title">Trang chủ</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside" role="button" aria-expanded="false">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/package -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
                            <line x1="12" y1="12" x2="20" y2="7.5" />
                            <line x1="12" y1="12" x2="12" y2="21" />
                            <line x1="12" y1="12" x2="4" y2="7.5" />
                            <line x1="16" y1="5.25" x2="8" y2="9.75" />
                        </svg>
                    </span>
                    <span class="nav-link-title">Hệ thống</span>
                </a>
                <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                        <div class="dropdown-menu-column">
                            <a class="dropdown-item" href="{{ route('slide-index') }}">
                                Quản lý slide
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./form-elements.html">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <polyline points="9 11 12 14 20 6" />
                            <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                        </svg>
                    </span>
                    <span class="nav-link-title">
                        Tin tức
                    </span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside" role="button" aria-expanded="false">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                        </svg>
                    </span>
                    <span class="nav-link-title">
                        Khu vực
                    </span>
                </a>
                <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                        <div class="dropdown-menu-column">
                            <a class="dropdown-item" href="./activity.html">
                                Activity
                            </a>
                        </div>
                        <div class="dropdown-menu-column">
                            <a class="dropdown-item" href="./license.html">
                                License
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside" role="button" aria-expanded="false">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <rect x="4" y="4" width="6" height="5" rx="2" />
                            <rect x="4" y="13" width="6" height="7" rx="2" />
                            <rect x="14" y="4" width="6" height="7" rx="2" />
                            <rect x="14" y="15" width="6" height="5" rx="2" />
                        </svg>
                    </span>
                    <span class="nav-link-title">
                        Bất động sản
                    </span>
                </a>
                <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                        <div class="dropdown-menu-column">
                            <a class="dropdown-item" href="./layout-horizontal.html">
                                Horizontal
                            </a>
                            <a class="dropdown-item" href="./layout-boxed.html">
                                Boxed
                                <span class="badge badge-sm bg-green text-uppercase ms-2">New</span>
                            </a>
                            <a class="dropdown-item" href="./layout-vertical.html">
                                Vertical
                            </a>
                            <a class="dropdown-item" href="./layout-vertical-transparent.html">
                                Vertical transparent
                            </a>
                            <a class="dropdown-item" href="./layout-vertical-right.html">
                                Right vertical
                            </a>
                            <a class="dropdown-item" href="./layout-condensed.html">
                                Condensed
                            </a>
                            <a class="dropdown-item" href="./layout-combo.html">
                                Combined
                            </a>
                        </div>
                        <div class="dropdown-menu-column">
                            <a class="dropdown-item" href="./layout-navbar-dark.html">
                                Navbar dark
                            </a>
                            <a class="dropdown-item" href="./layout-navbar-sticky.html">
                                Navbar sticky
                            </a>
                            <a class="dropdown-item" href="./layout-navbar-overlap.html">
                                Navbar overlap
                            </a>
                            <a class="dropdown-item" href="./layout-rtl.html">
                                RTL mode
                            </a>
                            <a class="dropdown-item active" href="./layout-fluid.html">
                                Fluid
                            </a>
                            <a class="dropdown-item" href="./layout-fluid-vertical.html">
                                Fluid vertical
                            </a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./icons.html">
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7" />
                            <line x1="10" y1="10" x2="10.01" y2="10" />
                            <line x1="14" y1="10" x2="14.01" y2="10" />
                            <path d="M10 14a3.5 3.5 0 0 0 4 0" />
                        </svg>
                    </span>
                    <span class="nav-link-title">
                        Khách hàng
                    </span>
                </a>
            </li>
        </ul>
        <div class="navbar-nav flex-row order-md-last">
            <div class="d-none d-md-flex">
                <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode"
                    data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                    </svg>
                </a>
                <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode"
                    data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="12" cy="12" r="4" />
                        <path
                            d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                    </svg>
                </a>

                <div class="nav-item dropdown d-none d-md-flex me-3">
                    <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                        aria-label="Show notifications">
                        <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                            <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                        </svg>
                        <span class="badge bg-red"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Last updates</h3>
                            </div>
                            <div class="list-group list-group-flush list-group-hoverable">
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto"><span
                                                class="status-dot status-dot-animated bg-red d-block"></span>
                                        </div>
                                        <div class="col text-truncate">
                                            <a href="#" class="text-body d-block">Example 1</a>
                                            <div class="d-block text-muted text-truncate mt-n1">
                                                Change deprecated html tags to text decoration classes (#29604)
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="list-group-item-actions">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted"
                                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto"><span class="status-dot d-block"></span>
                                        </div>
                                        <div class="col text-truncate">
                                            <a href="#" class="text-body d-block">Example 2</a>
                                            <div class="d-block text-muted text-truncate mt-n1">
                                                justify-content:between ⇒ justify-content:space-between (#29734)
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="list-group-item-actions show">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon text-yellow" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto"><span class="status-dot d-block"></span>
                                        </div>
                                        <div class="col text-truncate">
                                            <a href="#" class="text-body d-block">Example 3</a>
                                            <div class="d-block text-muted text-truncate mt-n1">
                                                Update change-version.js (#29736)
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="list-group-item-actions">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted"
                                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto"><span
                                                class="status-dot status-dot-animated bg-green d-block"></span>
                                        </div>
                                        <div class="col text-truncate">
                                            <a href="#" class="text-body d-block">Example 4</a>
                                            <div class="d-block text-muted text-truncate mt-n1">
                                                Regenerate package-lock.json (#29730)
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="#" class="list-group-item-actions">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted"
                                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(Session('login'))
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <span class="avatar avatar-sm"
                        style="background-image: url(./static/avatars/000m.jpg)"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ Session('user_name') }}</div>
                        <div class="mt-1 small text-muted">{{ Session('role') }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="{{ route('profile-information') }}" class="dropdown-item">Thông tin cá nhân</a>
                    <a href="{{ route('change-password') }}" class="dropdown-item">Thay đổi mật khẩu</a>
                    <a href="{{ route('password-level-two') }}" class="dropdown-item">Đặt mật khẩu cấp 2</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item">Đăng xuất</a>
                </div>
            </div>
            @elseif (Auth::check())
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <span class="avatar avatar-sm"
                        style="background-image: url(./static/avatars/000m.jpg)"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ Auth::user()->user_info->name }}</div>
                        <div class="mt-1 small text-muted">{{ Auth::user()->role }}</div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="{{ route('profile-information') }}" class="dropdown-item">Thông tin cá nhân</a>
                    <a href="{{ route('change-password') }}" class="dropdown-item">Thay đổi mật khẩu</a>
                    <a href="{{ route('password-level-two') }}" class="dropdown-item">Đặt mật khẩu cấp 2</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item">Đăng xuất</a>
                </div>
            </div>
            @endif
        </div>
    </div>
</header>
