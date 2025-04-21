
<aside class="app-sidebar bg-secondary-subtle shadow " data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand ">
          <!--begin::Brand Link-->
         <span style="color: #ffffff; font-size: 26px; text-align:center; font-weight:600 ;">POS BUMDES
        </span>
           
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
            <!-- start akses admin dan superadmin -->
              <li class="nav-item " >
                <a <?php if($module=="dashboard" && $action == "main"){
                  echo "class='nav-link active'";
                }?> href='<?php echo BASE_URL . "index.php?&module=dashboard&action=index"; ?>' class="nav-link" >
                <i class="fas fa-tachometer-alt" style="color: #ffffff;"></i>
                  <p>
                    Dashboard
                  
                  </p>
                </a>
              </li>

          
              <!-- end:akses -->
              <li class="nav-item <?php if($module=="salesCashier" || $module=="salesRiwayatHistory"){
                echo "menu-open";
              }
              ?>" >
                <a href="#" class="nav-link ">
                <i class="fas fa-cart-plus" style="color: #ffffff;"></i>
                  <p>
                    Sales
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                  <a <?php if($module=="salesCashier" && $action == "list"){
                  echo "class='nav-link active'";
                }?>  href='<?php echo BASE_URL . "index.php?&module=salesCashier&action=list"; ?>' class="nav-link ">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Cashier</p>
                    </a>
                  </li>
                  <li class="nav-item">
                  <a <?php if($module=="salesRiwayatHistory" && $action == "list"){
                  echo "class='nav-link active'";
                }?>  href='<?php echo BASE_URL . "index.php?&module=salesRiwayatHistory&action=list"; ?>' class="nav-link ">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Transaction History</p>
                    </a>
                  </li>
                </ul>
              </li>
             

              <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'superadmin' ) : ?>
              <li class="nav-item <?php if($module=="product" || $module=="productCategory" || $module=="productStock" || $module=="productExpired"){
                echo "menu-open";
              }
              ?>" >
                <a href="#" class="nav-link ">
                <i class="fas fa-boxes" style="color: #ffffff;"></i>
                  <p>
                    Products
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item ">
                    <a <?php if($module=="product" && $action == "list"){
                  echo "class='nav-link active'";
                }?>  href='<?php echo BASE_URL . "index.php?&module=product&action=list"; ?>' class="nav-link ">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Product List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a <?php if($module=="productCategory" && $action == "list"){
                  echo "class='nav-link active'";
                }?>  href='<?php echo BASE_URL . "index.php?&module=productCategory&action=list"; ?>' class="nav-link ">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Product Category </p>
                    </a>
                  </li>
                  <li class="nav-item">
                  <a <?php if($module=="productStock" && $action == "list"){
                  echo "class='nav-link active'";
                }?>  href='<?php echo BASE_URL . "index.php?&module=productStock&action=list"; ?>' class="nav-link ">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Product Stock </p>
                    </a>
                  </li>
                  <li class="nav-item">
                  <a <?php if($module=="productExpired" && $action == "list"){
                  echo "class='nav-link active'";
                }?>  href='<?php echo BASE_URL . "index.php?&module=productExpired&action=list"; ?>' class="nav-link ">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Product Expired</p>
                    </a>
                  </li>
                </ul>
              </li>
              <?php endif; ?>


              <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'superadmin' ) : ?>
              <li class="nav-item <?php if($module=="salesReport" || $module=="productReport"){
                echo "menu-open";
              }
              ?>" >
                <a href="#" class="nav-link ">
                <i class="fas fa-print" style="color: #ffffff;"></i>
                  <p>
                    Reports
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                  <a <?php if($module=="salesReport" && $action == "list"){
                  echo "class='nav-link active'";
                }?>  href='<?php echo BASE_URL . "index.php?&module=salesReport&action=list"; ?>' class="nav-link ">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Sales Report</p>
                    </a>
                  </li>
                 
                </ul>
              </li>
              <?php endif; ?>

              <?php if ($_SESSION['role'] == 'superadmin' ) : ?>
              <li class="nav-item <?php if($module=="users" || $module=="cashierManagement" || $module=="cashierLoguser" || $module=="backup_database"){
                echo "menu-open";
              }
              ?>" >
                <a href="#" class="nav-link ">
                <i class="fas fa-cogs" style="color: #ffffff;"></i>
                  <p>
                    Settings
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                  <a <?php if($module=="users" && $action == "list"){
                  echo "class='nav-link active'";
                }?>  href='<?php echo BASE_URL . "index.php?&module=users&action=list"; ?>' class="nav-link ">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Users Management</p>
                    </a>  
                    <a <?php if($module=="cashierManagement" && $action == "form"){
                  echo "class='nav-link active'";
                }?>  href='<?php echo BASE_URL . "index.php?&module=cashierManagement&action=form"; ?>' class="nav-link ">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Cashier Management</p>
                    </a>
                    <a <?php if($module=="cashierLoguser" && $action == "list"){
                  echo "class='nav-link active'";
                }?>  href='<?php echo BASE_URL . "index.php?&module=cashierLoguser&action=list"; ?>' class="nav-link ">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Log Activity Users</p>
                    </a>
                    <a <?php if($module=="backup_database" && $action == "list"){
                  echo "class='nav-link active'";
                }?>  href='<?php echo BASE_URL . "index.php?&module=backupdb&action=backup_database"; ?>' class="nav-link ">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Backup database</p>
                    </a>
                  </li>
                </ul>
              </li>
              <?php endif; ?>

              <li>
              <a href="logout.php" class="nav-link ">
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