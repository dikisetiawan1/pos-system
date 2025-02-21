<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="template/dist/assets/img/desktop-solid.svg"
              alt="Pos Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <br>
            <!--end::Brand Text-->
            <span class="brand-text fw-light">POS System</span>
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false"
            > 
              <li class="nav-item ">
                <a href='<?php echo BASE_URL . "index.php?&module=dashboard&action=main"; ?>' class="nav-link">
                <i class="fas fa-tachometer-alt" style="color: #ffffff;"></i>
                  <p>
                    Dashboard
                  
                  </p>
                </a>
              </li>
              <li class="nav-item ">
                <a href="#" class="nav-link ">
                <i class="fas fa-cart-plus" style="color: #ffffff;"></i>
                  <p>
                    Sales
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./index.html" class="nav-link ">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Cashier</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index.html" class="nav-link ">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Transaction History</p>
                    </a>
                  </li>
                  
                </ul>
              </li>
              <li class="nav-item ">
                <a href="#" class="nav-link ">
                <i class="fas fa-boxes" style="color: #ffffff;"></i>
                  <p>
                    Products
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item active">
                    <a href='<?php echo BASE_URL . "index.php?&module=product&action=list"; ?>' class="nav-link ">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Product List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index.html" class="nav-link ">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Product Category </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index.html" class="nav-link ">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Product Stock </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index.html" class="nav-link ">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Discount</p>
                    </a>
                  </li>
                  
                </ul>
              </li>
              <li class="nav-item ">
                <a href="#" class="nav-link ">
                <i class="fas fa-print" style="color: #ffffff;"></i>
                  <p>
                    Reports
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./index.html" class="nav-link ">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Sales Report</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="./index.html" class="nav-link ">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Product Report </p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item ">
                <a href="#" class="nav-link ">
                <i class="fas fa-cogs" style="color: #ffffff;"></i>
                  <p>
                    Settings
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="./index.html" class="nav-link ">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Users Role</p>
                    </a>
                    <a href="./index.html" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Cashier Management</p>
                    </a>
                  </li>
          
                </ul>
              </li>
              <li>
              <a href="./index.html" class="nav-link ">
              <i class="fas fa-sign-out-alt" style="color: #ffffff;"></i>
                      <p>Logout</p>
                    </a>
              </li>
            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>