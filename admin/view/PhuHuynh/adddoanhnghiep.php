 <?php
  include_once("controller/TaiKhoan/ctaikhoan.php");
  include_once("controller/PhuHuynh/cdoanhnghiep.php");
  $a=new ctaikhoan();
  //$dn = new cKHDN();
  
 ?>
 <script>
  $(document).ready(function(){
            function kiemsdt(){
                var sdt=$("#sdt").val();
                regsdt=/^\+?(0[389][0-9]{8})$/;

                if(regsdt.test(sdt))
                {
                    $("#Sodienthoai").html("");
                    return true;
                }
                else
                {
                    $("#Sodienthoai").html("Số điện thoại phải đủ 10 chữ số và bắt đầu 03,08,09 ");
                    return false;
                }
            }
            $("#sdt").blur(kiemsdt);

            function kiemsdtndd(){
                var sdt=$("#sdtndd").val();
                regsdt=/^\+?(0[389][0-9]{8})$/;

                if(regsdt.test(sdt))
                {
                    $("#Sodienthoaindd").html("");
                    return true;
                }
                else
                {
                    $("#Sodienthoaindd").html("Số điện thoại phải đủ 10 chữ số và bắt đầu 03,08,09");
                    return false;
                }
            }
            $("#sdtndd").blur(kiemsdtndd);

            function kiemmail(){
                var mail=$("#email").val();
                regmail=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

                if(regmail.test(mail))
                {
                    $("#Email").html(" ");
                    return true;
                }
                else
                {
                    $("#Email").html("Mail không đúng định dạng");
                    return false;
                }
            }
            $("#email").blur(kiemmail);

            
            
            

        })
 </script>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý Thông Tin Khách Hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
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
              <h3 style="text-align:center">Thêm Phụ Huynh</h3>
              <form action="#" method='post' enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-4">
                    <td>Tên Phụ Huynh </td>
                    <input type="text" class="form-control" id="tenkh" placeholder="Enter Tên doanh nghiệp" name="tenkh"  required=""></br>
                    <td>Giới tính</td>
                    <td>
                      <select name="gioitinh" id="gioitinh" class="form-control" required="">
                        <option value="0">Nam</option>
                        <option value="1">Nữ</option>
                      </select>
                      </td> <br>
                    <td>Số điện thoại</td>
                    <input type="text" class="form-control" id="sdt" placeholder="Enter Số điện thoại" name="sdt"  required="">
                    <span id="Sodienthoai" style="color:red;"></span></br>
                    <td>Email</td>
                    <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" required="">
                    <span id="Email" style="color:red;"></span></br></br>
                    <td>Hình Ảnh</td>
                    <input type="file" class="form-control" id="hinhAnh" placeholder="" name="hinhAnh" required="">
                    <span id="hinhAnh" style="color:red;"></span></br>

                    
                  </div>
                  
                  <div class="col-md-4">

                    <td>Username</td>
                    <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username"></br> 
                    <!-- <select name="username" id="username" class="form-control"> -->
                      <!-- <option value="">Chọn username -->
                        <!-- <?php 
                          // if($danhsachtaikhoan){
                            // if(mysqli_num_rows($danhsachtaikhoan)){
                            // while($row1 = mysqli_fetch_assoc($danhsachtaikhoan)){
                                // ?>
                                <option value="<?php echo $row1['username']; ?>" <?php if(isset($_POST['username'])&&$_POST['username']==$row1['username']) echo "selected " ?>><?php echo $row1['username'] ?></option>
                                <?php 
                            // }
                            // }
                        // }
                        ?>
                      </option>
                    </select>-->
                    <!-- <td>Password</td> -->
                    <!-- <input type="text" class="form-control" id="password" placeholder="Enter Password" name="password"></br> -->
                    
                  </div>
                </div>
                <button type="submit" id="button" class="btn btn-primary" name="submit" style="margin-left:45%">Thêm khách hàng</button>
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
    // if(isset($_REQUEST["submit"])){
    //   $TenKH=$_REQUEST["tenkh"];
    //   $DiaChi=$_REQUEST["diachi"];
    //   $SDT=$_REQUEST["sdt"];
    //   $Email=$_REQUEST["email"];
    //   $GioiTinh=$_REQUEST["gioitinh"];
    //   $TenDoanhNghiep=$_REQUEST["tendn"];
    //   $GioiThieu=$_REQUEST["gioithieu"];
    //   $username=$_REQUEST["username"];
    //   // $password=$_REQUEST["password"];
    //   $MaXa=$_REQUEST["xa"];
    //   $MaVaiTro=5;
    //   $tk= new cTaikhoan();
    //   $khdn= new cKHDN();
    //   if($username !=""){
    //     $insert=$tk->add_taikhoan($MaVaiTro, $username);
    //     if($insert==1){
    //       $insert=$khdn->add_DN($TenKH, $DiaChi, $SDT, $Email,$GioiTinh,$TenDoanhNghiep,$GioiThieu,$MaXa, $username);
    //       if($insert==1){
    //         echo "<script>alert('Thêm thành công');</script>";
    //         echo "<script>window.location.href='?qlkhdn'</script>";
    //       }else {
    //         echo "<script>alert('Thêm không thành công');</script>";
    //         echo "<script>window.location.href='?qlkhdn'</script>";
    //       }
          
    //     }

    //   }else{
    //       $insert=$khdn->add_DN($TenKH, $DiaChi, $SDT, $Email,$GioiTinh,$TenDoanhNghiep,$GioiThieu,$MaXa, $username);
    //       if($insert==1){
    //         echo "<script>alert('Thêm thành công');</script>";
    //         echo "<script>window.location.href='?qlkhdn'</script>";
    //       }else {
    //         echo "<script>alert('Thêm không thành công');</script>";
    //         echo "<script>window.location.href='?qlkhdn'</script>";
    //       }
          
    //   }
    // }
    if(isset($_REQUEST["submit"])){
      $hoTen=$_REQUEST["tenkh"];
      $soDienThoai=$_REQUEST["sdt"];
      $email=$_REQUEST["email"];
      $gioiTinh=$_REQUEST["gioitinh"];
      $hinhAnh = $_FILES['hinhAnh']['name'];
      $hinhAnh_tmp = $_FILES['hinhAnh']['tmp_name'];
      $uploads_dir = 'admin/assets/uploads/images/';

      $username=$_REQUEST["username"];
      $Role =2;
      // $password=$_REQUEST["password"];

      if (!is_dir($uploads_dir)) {
        mkdir($uploads_dir, 0777, true);
    }
  
    if(move_uploaded_file($hinhAnh_tmp, $uploads_dir.$hinhAnh)){
        // File uploaded successfully, now proceed with database insertion
        $tk= new ctaikhoan();
        $nvpp= new cKHDN;
        
        if ($username =="") {
            $insert=$nvpp-> add_DN($email,$hinhAnh,$hoTen,$soDienThoai,$gioiTinh, $username);
            if ($insert ==1){
                echo "<script>alert('Thêm thành công');</script>";
                echo "<script>window.location.href='?qlkhdn'</script>";
            } else {
                echo "<script>alert('Thêm không thành công');</script>";
                echo "<script>window.location.href='?qlkhdn'</script>";
            }
        } else {
            $check_user_kh = $tk ->check_user_khachhang($username);
            if(mysqli_num_rows($check_user_kh)>0){
              echo "<script>alert('Tài khoản mới đã tồn tại trong bảng người dùng');</script>";
            }else{    
                  $insert=$nvpp-> add_DN($email,$hinhAnh,$hoTen,$soDienThoai,$gioiTinh, $username);
                    if ($insert=1) {
                      $insert=$tk->add_taikhoan($Role, $username,$password);
                      if ($insert=1) {
                        echo "<script>alert('Thêm thành công');</script>";
                        echo "<script>window.location.href='?qlkhdn'</script>";
                      }else {
                        echo "<script>alert('Thêm không thành công');</script>";
                        echo "<script>window.location.href='?qlkhdn'</script>";
                      }
                    }
                // echo "XỬ LÍ CẬP NHẬT TÀI KHOẢN VÀ MK";
                }
    
        }
    } else {
        echo "<script>alert('Upload ảnh không thành công');</script>";
    }
  }
      
  


  ?>
 