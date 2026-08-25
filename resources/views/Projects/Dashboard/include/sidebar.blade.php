<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand">
      <a href="#" class="brand-link">
        <span class="brand-icon"><i class="fa-solid fa-layer-group"></i></span>
        <span class="brand-text">AdminPro</span>
      </a>
      <button class="btn sidebar-close d-lg-none" id="sidebarClose" type="button"><i class="fa-solid fa-xmark"></i></button>
    </div>

    <div class="sidebar-user">
      <img src="https://github.com/mdo.png" alt="User" class="user-avatar">
      <div class="user-info">
        <strong>Mahmoud Amin</strong>
        <span>Administrator</span>
      </div>
    </div>

    <nav class="sidebar-nav">
      <div class="nav-section-title">MAIN</div>
      <a href="#" class="sidebar-link active"><i class="fa-solid fa-house"></i><span>Dashboard</span></a>
      <a href="#" class="sidebar-link"><i class="fa-solid fa-chart-line"></i><span>Analytics</span></a>

      <button class="sidebar-link sidebar-dropdown-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#ordersMenu" aria-expanded="false">
        <!-- data-bs-target="#ordersMenu" -->
        <span class="d-flex align-items-center gap-3"><i class="fa-solid fa-cart-shopping"></i><span>Orders</span></span>
        <i class="fa-solid fa-chevron-down submenu-arrow"></i>
      </button>
      <div class="collapse sidebar-submenu" id="ordersMenu">
        <!-- id="ordersMenu" -->
        <a href="#">All Orders</a>
        <a href="#">Pending Orders</a>
        <a href="#">Completed</a>
      </div>
      <button class="sidebar-link sidebar-dropdown-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#productsMenu" aria-expanded="false">
        <!-- data-bs-target="#productsMenu" -->
        <span class="d-flex align-items-center gap-3"><i class="fa-solid fa-cart-shopping"></i><span>Products</span></span>
        <i class="fa-solid fa-chevron-down submenu-arrow"></i>
      </button>
      <div class="collapse sidebar-submenu" id="productsMenu">
        <!-- id="productsMenu" -->
        <a href="#">All Products</a>
        <a href="#">Pending Products</a>
        <a href="#">Completed</a>
      </div>

      <div class="nav-section-title mt-3">MANAGEMENT</div>
      <a href="#" class="sidebar-link"><i class="fa-solid fa-users"></i><span>Customers</span></a>
      <a href="#" class="sidebar-link"><i class="fa-solid fa-box-open"></i><span>Products</span></a>
      <a href="#" class="sidebar-link"><i class="fa-solid fa-file-invoice-dollar"></i><span>Invoices</span></a>
      <a href="#" class="sidebar-link"><i class="fa-solid fa-gear"></i><span>Settings</span></a>
    </nav>
</aside>