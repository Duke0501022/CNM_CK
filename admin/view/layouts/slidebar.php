  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="admin/assets/uploads/images/440943120_2188963681457292_7383826080244805221_n.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="logo-lg" id="index">Hệ thống ChildCare</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      
        <div class="info">
         
          <!-- <ul class="dropdown-menu">
            <li class="user-header">
              <img src="assets/public/images/alert_cart.jpg" class="img-circle" alt="User Image">
              <p>Khánh<small>CC</small></p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="admin/useradmin/update/" class="btn btn-default btn-flat">Chi tiết</a>
              </div>
              <div class="pull-right">
                <a href="admin/user/logout.html" class="btn btn-default btn-flat">Thoát</a>
              </div>
            </li>
          </ul> -->
        </div>
      </div>
      <!-- <li class="dropdown user user-menu" style="height: 52px; padding: 0px">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="public/images/admin/" class="user-image" alt="User Image">
          <span class="hidden-xs">Khánh</span>
        </a>
        <ul class="dropdown-menu">
          <li class="user-header">
            <img src="public/images/admin/" class="img-circle" alt="User Image">
            <p>Khánh<small>CC</small></p>
          </li>
          <li class="user-footer">
            <div class="pull-left">
                <a href="admin/useradmin/update/" class="btn btn-default btn-flat">Chi tiết</a>
            </div>
            <div class="pull-right">
                <a href="admin/user/logout.html" class="btn btn-default btn-flat">Thoát</a>
            </div>
          </li>
        </ul>
      </li> -->
      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

     <!-- Sidebar Menu -->
     <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Quản lí  -->

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Quản lý người dùng
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="?qlkhdn" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Quản lý phụ huynh</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?qlcv" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Quản lý chuyên viên</p>
              </a>
            </li>
            <li clas="nav-item">
              <a href="?qltk" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Quản lý tài khoản</p>
              </a>

            </li>
            <!-- <li clas="nav-item">
              <a href="?qlttpp" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Quản lý trung tâm phân phối</p>
              </a>

            </li> -->

          </ul>
        </li>


        <!-- Phân Quyền + Thống kê báo cáo -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Khác
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">1</span>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="?thongke" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thống kê</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?chatbot" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh mục chatbot</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?thongtin" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thông tin tài khoản</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="?hotro" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Trợ giúp</p>
              </a>
            </li>
          

          </ul>
        </li>

        <!-- Phân quyền + thống kê báo cáo -->


         <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Thông tin liên hệ
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">1</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?phanhoi" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Phản hồi</p>
              </a>
            </li>
           

          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Tư vấn phụ huynh
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">1</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?tuvan" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh sách phụ huynh</p>
              </a>
            </li>
           

          </ul>
        </li>



        <!-- Duyệt Bài đăng   -->
          
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Quản lí bài test
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">2</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="?qlbt" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Danh mục câu hỏi</p>
              </a>
            </li>

          </ul>
          
        </li>
        
        <!-- Duyệt bài đăng -->
      </ul>
    </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
