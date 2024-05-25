<?php 
  require_once("config/config.php");
  include_once("Controller/KhachHangDoanhNghiep/cKhachHangDoanhNghiep.php");
  include_once("Controller/TaiKhoan/cTaikhoan.php"); ?>

<style>
    body {
        font-family: 'Arial', sans-serif;
        background: url(../kindergarten-website-template/img/login.jpg);
    }

    .register-container {
        max-width: 400px;
        margin: 100px auto;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px 0px #000000;
    }

    .header-text {
        margin-bottom: 30px;
        color: #333333;
        text-align: center;
    }

    .custom-btn {
        background-color: #f8b400;
        color: white;
        border: none;
    }

    .custom-btn:hover {
        background-color: #e5a300;
    }

    .form-link {
        color: #333333;
        text-align: center;
        display: block;
        margin-top: 15px;
    }
</style>
</head>

<body>

    <div class="register-container">
        <h2 class="header-text">Đăng ký tài khoản</h2>
        <form action="" method="post">
          <div class="form-group">
            <select class="form-control" name="vaitro" id="slvaitro">
              <option value="">--Chọn loại người dùng--</option>
              <option value="2">Phụ Huynh</option>
           
            </select>
  </div class="form-group">

            <div class="form-group">
                <label for="loginHoTen">Họ và tên</label>
                <input type="hoTen" class="form-control" name="hoTen" id="loginHoTen" placeholder="Họ và tên">
            </div>
            <div class="form-group">
                <label for="loginSDT">Số điện thoại</label>
                <input type="sdt" class="form-control" name="sdt" id="loginSDT" placeholder="Số điện thoại">    
            </div>
            <div class="form-group">
                <label for="loginEmail">Email</label>
                <input type="email" class="form-control" name="email" id="loginEmail" placeholder="Email">
            </div>
            <div class="form-group">
              <select class="form-control" id="slgioitinh" name="slgioitinh" required>
              <option value=""> Chọn giới tính</option>
              <option value="0">Nam</option>
              <option value="1">Nữ</option>
            </select>
            </div>
            <div class="form-group">
                <label for="registerHinhAnh">Hình Ảnh</label>
                <input type="file" class="form-control" id="hinhAnh" placeholder="" name="hinhAnh" required="">
            </div>
            <div class="form-group">

                <label for="loginUsername">Tên đăng nhập</label>
                <input type="username" class="form-control" name="username" id="loginUsername" placeholder="Tên đăng nhập" name="username">
            </div>
            <div class="form-group">
                <label for="registerPassword">Mật khẩu</label>
                <input type="password" class="form-control" id="registerPassword" placeholder="Mật khẩu" name ="password">
            </div>
            <div class="form-group">
                <label for="confirmPassword">Nhập lại mật khẩu</label>
                <input type="password" class="form-control" id="confirmPassword" placeholder=" Nhập lại mật khẩu">
            </div>
            
            <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="dangky">Đăng Ký</button>
          </div>
            <a href="index.php?login" class="form-link">Bạn đã có tài khoản? Đăng nhập</a>
        </form>
    </div>


</body>
<?php
if (isset($_POST['dangky'])) {
  if ($_POST['vaitro'] == 2) { 
     //người dùng 
        //----------------------------------------------------
        //----------------------------------------------------
        //----------------------------------------------------
        //------------------ĐĂNG KÝ TÀI KHOẢN NGƯỜI DÙNG 
        //----------------------------------------------------
        //----------------------------------------------------
        //----------------------------------------------------
          $hoTen = $_POST['hoTen'];
          $soDienThoai = $_POST['sdt'];
          $hinhAnh = $_POST['hinhAnh'];
          
          $email = $_POST['email'];
          $gioiTinh= $_POST['slgioitinh'];
          $Role = $_POST['vaitro'];
          $username = $_POST['username'];
          $password = $_POST['password'];
         

          $dk = new cTaiKhoan();
          $user_dn = new cKHDN();
          $insert = $dk -> them_taikhoan($username,$password,$Role);
          if ($insert == 1) {
            $ins_khdn = $user_dn -> add_DN($email,$hinhAnh,$hoTen,$soDienThoai,$gioiTinh, $username);
            if ($ins_khdn == 1) {
              echo "<script>alert('Đăng ký thành công');</script>";
              echo "<script>window.location.href = 'index?login.php';</script>";
            } else {
              echo "<script>alert('Đăng ký thất bại');</script>";
              echo "<script>window.location.href = 'index.php?register.php';</script>";
            }
            
          }else {
            echo "<script>alert('Đăng ký thất bại');</script>";
            echo "<script>window.location.href = 'index.php?register.php';</script>";
          }
        }
      }
    else{
        echo "<br>";
    }

 ?>