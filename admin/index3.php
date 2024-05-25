<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Control Panel</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist1/css/adminlte.min.css">
  <!-- scripts -->
  <!-- jQuery -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/dist1/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="assets/dist1/js/demo.js"></script> -->
  <!--  -->
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="assets/public/images/Fruit-Olive-Green-icon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="logo-lg" id="index"> Quản trị hệ thống</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/dist1/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">DƯƠNG MỘNG KHÁNH</a>
        </div>
      </div>

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
              Quản lý
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">2</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./quanlythongtinnguoidung.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Quản lý thông tin người dùng</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./quanlynhanvien.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Quản lý thông tin nhân viên</p>
              </a>
            </li>

          </ul>
        </li>


        <!-- Quản lí -->


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
              <a href="./thongkeadmin.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Thống kê</p>
              </a>
            </li>

          </ul>
        </li>

        <!-- Phân quyền + thống kê báo cáo -->





        <!-- Duyệt Bài đăng   -->
          
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Duyệt bài
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">2</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="./duyetbainongsan.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Duyệt bài đăng nông sản</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./duyettinnhucau.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Duyệt bài đăng nhu cầu</p>
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý khách hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
              <li class="breadcrumb-item active">Quản lý khách hàng</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">


            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Danh sách thông tin khách hàng</h3>  | <a href="#">Thêm khách hàng mới</a>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Mã khách hàng</th>
                      <th>Tên khách hàng</th>
                      <th>Số điện thoại</th>
                      <th>Email</th>
                      <th>Fax</th>
                      <th>Địa chỉ</th>
                      <th>Hình</th>
                      <th>Tên tài khoản</th>
                      <th>Mã đơn hàng</th>
                      <th>Tác vụ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>012345667</td>
                      <td>johndoe@gmail.com</td>
                      <td>3421312</td>
                      <td>123 Washington DC</td>
                      <td>
                        <img src="./dist/img/avatar4.png" alt="">
                      </td>
                      <td> User1</td>
                      <td>#0001</td>
                      <td>
                        <a href="#"><i class="fa fa-pen" aria-hidden="true"></i></a> |
                        <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
                      </td>

                    </tr>
                  
                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>012345667</td>
                      <td>johndoe@gmail.com</td>
                      <td>3421312</td>
                      <td>123 Washington DC</td>
                      <td>
                        <img src="./dist/img/avatar4.png" alt="">
                      </td>
                      <td> User1</td>
                      <td>#0001</td>
                      <td>
                        <a href="#"><i class="fa fa-pen" aria-hidden="true"></i></a> |
                        <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
                      </td>

                    </tr>
                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>012345667</td>
                      <td>johndoe@gmail.com</td>
                      <td>3421312</td>
                      <td>123 Washington DC</td>
                      <td>
                        <img src="./dist/img/avatar4.png" alt="">
                      </td>
                      <td> User1</td>
                      <td>#0001</td>
                      <td>
                        <a href="#"><i class="fa fa-pen" aria-hidden="true"></i></a> |
                        <a href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
                      </td>

                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>IUH</b> 2022
    </div>
    <h5>Hệ thống phân phối nông sản sạch</h1>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


</body>
</html>
