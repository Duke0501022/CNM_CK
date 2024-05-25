<?php
  include_once("controller/NhanVienPhanPhoi/cnvphanphoi.php");
  include_once("controller/TaiKhoan/ctaikhoan.php");
  
 ?>
 <script>
$(document).ready(function(){
    function kiemten(){
        var ten = $("#tencv").val();
        if(ten.trim() === ""){
            $("#TenChuyenVien").html("Vui lòng nhập tên chuyên viên");
            return false;
        } else {
            $("#TenChuyenVien").html("");
            return true;
        }
    }

    function kiememail(){
        var email = $("#email").val();
        var regemail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if(!regemail.test(email)){
            $("#Email").html("Email không hợp lệ");
            return false;
        } else {
            $("#Email").html("");
            return true;
        }
    }

   

    function kiemusername(){
        var username = $("#username").val();
        if(username.trim() === ""){
            $("#Username").html("Vui lòng nhập tên đăng nhập");
            return false;
        } else {
            $("#Username").html("");
            return true;
        }
    }

    $("#tencv").blur(kiemten);
    $("#email").blur(kiememail);
    
    $("#username").blur(kiemusername);

    $("#tencv").on("click", kiemten);
    $("#email").on("click", kiememail);
   
    $("#username").on("click", kiemusername);
});
</script>
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý Thông Tin Chuyên Viên</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
              <li class="breadcrumb-item active">Quản lý chuyên viên</li>
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
                <!-- <h3 class="card-title">Danh sách thông tin khách hàng</h3>  | <a href="#">Thêm khách hàng mới</a> -->

                <!-- <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>-->
              <!-- /.card-header -->
              <h3 style="text-align:center">Thêm Chuyên Viên</h3>
              <form action="#" method="post" enctype="multipart/form-data">
                <div class="row">
                  <div class="col">
                   
                    <td>Tên chuyên viên</td>
                    <input type="text" class="form-control" id="tencv" placeholder="Enter Tên chuyên viên" name="tencv" required=""></br>
                    <td>Số điện thoại</td>
                    <input type="text" class="form-control" id="Sodienthoai" placeholder="Enter Số điện thoại chuyên viên" name="sdt" required=""></br>
                   
                    <td>Mô Tả</td>
                    <input type="text" class="form-control" id="diachi" placeholder="Enter mô tả chuyên viên" name="mota" ></br>
                    <td>Ngày sinh</td>
                    <td><input type='date' class='form-control' name='ngaysinh' value=""></td>
                  </div>
                  <div class="col">
                    
                    <td>Email</td>
                    <input type="mail" class="form-control" id="email" placeholder="Enter Email" name="email" required=""></br>
                    <td>Giới tính</td>
                    <td>
                    <select name="gioitinh" id="gioitinh" class="form-control" required="">
                      <option value="0">Nam</option>
                      <option value="1">Nữ</option>
                    </select>
                    </td>
                    </br>
                    <td>Hình Ảnh</td>
                    <input type="file" class="form-control" id="hinhAnh" placeholder="" name="hinhAnh" required="">
                    <span id="hinhAnh" style="color:red;"></span></br>
                    
                    <td>Username</td>
                    <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username"></br>                    
                  </div>
                    
                  <!-- <div class="col">    -->
                    <!-- <td>Hình ảnh</td>
                    <input type="file" class="form-control" id="hinhanh" placeholder="Chọn hình ảnh" name="hinhanh"></br> -->
                    <!-- <td>Trung tâm phân phối</td> -->
                    <!-- <input type="text" class="form-control" id="mattpp" placeholder="Enter Mã trung tâm phân phối" name="mattpp"></br> -->
                     <!-- <select name="mattpp" id="mattpp" class="form-control" required="">  -->
                      <!-- <option value="">Chọn trung tâm phân phối -->
                
                    
                    
                    <!-- <td>Password</td> -->
                    <!-- <input type="text" class="form-control" id="password" placeholder="Enter Username" name="password"></br> -->
                        


                  <!-- </div> -->

                   
                    <!--  -->
                 
                </div>
                <button type="submit" class="btn btn-primary" name="submit" style="margin-left:43%">Thêm chuyên viên</button>
                <button type="reset" class="btn btn-secondary" name="reset">Hủy</button>
                <!-- <input type="submit" value="Thêm Doanh Nghiệp" style="text-align:center"> -->
              </form>
              
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
<?php
 if (isset($_REQUEST["submit"])){
  $hoTen=$_REQUEST["tencv"];
  $soDienThoai=$_REQUEST["sdt"];
  $email=$_REQUEST["email"];
  $moTa=$_REQUEST["mota"];
  $gioiTinh=$_REQUEST["gioitinh"];
  $username=$_REQUEST["username"];
  $ngaySinh=$_REQUEST["ngaysinh"];
  $hinhAnh = $_FILES['hinhAnh']['name'];
  $hinhAnh_tmp = $_FILES['hinhAnh']['tmp_name'];
  $uploads_dir = 'admin/assets/uploads/images/';  // Corrected path
  $Role = 3;
  // Create directory if it doesn't exist
  if (!is_dir($uploads_dir)) {
      mkdir($uploads_dir, 0777, true);
  }

  if(move_uploaded_file($hinhAnh_tmp, $uploads_dir.$hinhAnh)){
      // File uploaded successfully, now proceed with database insertion
      $tk= new ctaikhoan();
      $nvpp= new cNVPP();
      
      if ($username =="") {
          $insert=$nvpp-> add_NVPP($hoTen, $soDienThoai, $email, $hinhAnh,$moTa,$gioiTinh,$ngaySinh,$username);
          if ($insert ==1){
              echo "<script>alert('Thêm thành công');</script>";
              echo "<script>window.location.href='?qlcv'</script>";
          } else {
              echo "<script>alert('Thêm không thành công');</script>";
              echo "<script>window.location.href='?qlcv'</script>";
          }
      } else {
          $check_user_kh = $tk ->check_user_chuyenvien($username);
          if(mysqli_num_rows($check_user_kh)>0){
            echo "<script>alert('Tài khoản mới đã tồn tại trong bảng người dùng');</script>";
          }else{    
                $insert=$nvpp-> add_NVPP($hoTen, $soDienThoai, $email, $hinhAnh,$moTa,$gioiTinh,$ngaySinh,$username);
                  if ($insert=1) {
 
                      echo "<script>alert('Thêm thành công');</script>";
                      echo "<script>window.location.href='?qlcv'</script>";
                  
                  }
              // echo "XỬ LÍ CẬP NHẬT TÀI KHOẢN VÀ MK";
              }
  
      }
  } else {
      echo "<script>alert('Upload ảnh không thành công');</script>";
  }
}
?>