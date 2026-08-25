<header class="topbar">
    <div class="d-flex align-items-center gap-2">
        <button class="btn btn-icon" id="sidebarToggle" type="button" title="Toggle sidebar">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="topbar-search d-none d-md-flex">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="search" placeholder="Search..." aria-label="Search">
        </div>
    </div>

    <div class="topbar-actions">
    <!-- Language / Direction -->
    <div class="dropdown">
        <button class="btn btn-icon" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false" title="Language / Direction">
            <i class="fa-solid fa-language"></i>
        </button>

        <ul class="dropdown-menu dropdown-menu-end dashboard-dropdown language-dropdown">
            <li>
                <h6 class="dropdown-header"><i class="fa-solid fa-globe me-2"></i>Direction</h6>
            </li>
            <li>
                <button class="dropdown-item direction-option" type="button" data-direction="ltr">
                <span class="flex-grow-1"><i class="fa-solid fa-globe me-2"></i><strong>English / LTR</strong></span>
                </button>
            </li>
            <li>
                <button class="dropdown-item direction-option" type="button" data-direction="rtl">
                <span class="flex-grow-1"><i class="fa-solid fa-globe me-2"></i><strong>العربية / RTL</strong></span>
                </button>
            </li>
        </ul>
    </div>

    <button class="btn btn-icon" id="themeToggle" type="button" title="Dark / Light mode">
        <i class="fa-solid fa-moon"></i>
    </button>

    <div class="dropdown">
        <button class="btn btn-icon notification-btn" data-bs-toggle="dropdown" type="button">
        <i class="fa-regular fa-bell"></i><span class="notification-dot"></span>
        </button>
        <div class="dropdown-menu dropdown-menu-end dashboard-dropdown p-0">
        <div class="dropdown-header-custom">Notifications <span class="badge text-bg-primary">4</span></div>
        <a class="dropdown-item notification-item" href="#">
            <span class="notification-icon bg-primary-subtle text-primary">
                <i class="fa-solid fa-cart-shopping"></i>
            </span>
            <span>
                <strong>New order received</strong><small>2 minutes ago</small>
            </span>
        </a>
        <a class="dropdown-item notification-item" href="#">
            <span class="notification-icon bg-success-subtle text-success">
                <i class="fa-solid fa-user-plus"></i>
            </span>
            <span>
                <strong>New customer joined</strong><small>15 minutes ago</small>
            </span>
        </a>
        <a class="dropdown-item notification-item" href="#">
            <span class="notification-icon bg-warning-subtle text-warning">
                <i class="fa-solid fa-triangle-exclamation"></i>
            </span>
            <span>
                <strong>Low stock alert</strong><small>1 hour ago</small>
            </span>
        </a>
        </div>
    </div>

    <div class="dropdown">
        <button class="btn profile-button" data-bs-toggle="dropdown" type="button">
        <img src="https://github.com/mdo.png" alt="profile">
        <span class="d-none d-sm-inline">Mahmoud</span>
        <i class="fa-solid fa-chevron-down small"></i>
        </button>
        <ul class="dropdown-menu dropdown-menu-end dashboard-dropdown">
        <li><a class="dropdown-item" href="#"><i class="fa-regular fa-user me-2"></i>Profile</a></li>
        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-gear me-2"></i>Settings</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item text-danger" href="#"><i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Logout</a></li>
        </ul>
    </div>
    </div>
</header>