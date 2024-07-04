<?php 
  require_once("config/config.php");
  include_once("Controller/KhachHangDoanhNghiep/cKhachHangDoanhNghiep.php");
  include_once("Controller/TaiKhoan/cTaikhoan.php"); 
  include_once("Model/Connect.php");


// Kiểm tra kết nối

  ?>

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
            background-color: 	
            #00c0f8;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
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

        .button-container {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="register-container">
        <h2 class="header-text">Đăng ký tài khoản</h2>
        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <select class="form-control" name="vaitro" id="slvaitro">
              <option value="">--Chọn loại người dùng--</option>
              <option value="2">Phụ Huynh</option>
           
            </select>
  </div class="form-group" >

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
            
            <div class="button-container">
                <button type="submit" class="btn btn-primary custom-btn" name="dangky" onclick="return validateForm()">Đăng Ký</button>
            </div>
            <a href="index.php?login" class="form-link">Bạn đã có tài khoản? Đăng nhập</a>
        </form>
    </div>


</body>
<?php
include_once("controller/CLASS/clsMailer.php");
$mail = new cPHPMailer();
if (isset($_POST['dangky'])) {
    if ($_POST['vaitro'] == 2) {
        $hoTen = $_POST['hoTen'];
        $soDienThoai = $_POST['sdt'];
        // File upload handling
        $hinhAnh = $_FILES['hinhAnh']['name']; // Name of the uploaded file
        $hinhAnh_tmp = $_FILES['hinhAnh']['tmp_name']; // Temporary location of the file
        // Move uploaded file to desired location
        move_uploaded_file($hinhAnh_tmp, "admin/admin/assets/uploads/images/" . $hinhAnh);
        $email = $_POST['email'];
        $gioiTinh = $_POST['slgioitinh'];
        $Role = $_POST['vaitro'];
        $username = $_POST['username'];
        $password = $_POST['password'];
      
        $dk = new cTaiKhoan();
        $user_dn = new cKHDN();
        if ($user_dn->select_KHDN_email($email)) {
            // Nếu email đã tồn tại trong CSDL, thông báo lỗi
            echo "<script>alert('Email đã tồn tại trong hệ thống');</script>";
            
            echo "<script>window.location.href = 'index.php?register.php';</script>";
            // Dừng việc xử lý tiếp theo
            exit();
        }
        if ($user_dn->select_KHDN_username($username)) {
            // If the username already exists in the database, show an error message
            echo "<script>alert('Tên đăng nhập đã tồn tại trong hệ thống');</script>";
            echo "<script>window.location.href = 'index.php?register.php';</script>";
            // Stop further processing
            exit();
        }
        $insert = $dk->them_taikhoan($username, $password, $Role);
        if ($insert == 1) {
            $ins_khdn = $user_dn->add_DN($email, $hinhAnh, $hoTen, $soDienThoai, $gioiTinh, $username);
            if ($ins_khdn == 1) {
                $mail->send_mail($hoTen, $email, $username, $password, $hinhAnh, $Role, $gioiTinh, $soDienThoai);
                echo "<script>alert('Đăng ký thành công , bạn có thể coi email về thông tin tài khoản');</script>";
                echo "<script>window.location.href = 'index.php?login';</script>";
            } else {
                echo "<script>alert('Đăng ký thất bại');</script>";
                echo "<script>window.location.href = 'index.php?register.php';</script>";
            }
        } else {
            echo "<script>alert('Đăng ký thất bại');</script>";
            echo "<script>window.location.href = 'index.php?register.php';</script>";
        }
    } else {
        echo "<br>";
    }
}
?>
<script>
    // Hàm kiểm tra dữ liệu trước khi gửi biểu mẫu
    function validateForm() {
        // Lấy giá trị từ các trường nhập liệu
        var vaitro = document.getElementById("slvaitro").value;
        var hoTen = document.getElementById("loginHoTen").value;
        var sdt = document.getElementById("loginSDT").value;
        var email = document.getElementById("loginEmail").value;
        var username = document.getElementById("loginUsername").value;
        var password = document.getElementById("registerPassword").value;
        var confirmPassword = document.getElementById("confirmPassword").value;
        var hinhAnh = document.getElementById("hinhAnh").value;
        var gioiTinh = document.getElementById("slgioitinh").value;

        // Biểu thức chính quy cho email
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        // Biểu thức chính quy cho mật khẩu
        var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

        // Kiểm tra các trường nhập liệu
        if (vaitro.trim() == "") {
            alert("Vui lòng chọn vai trò");
            return false;
        }
        if (hoTen.trim() == "") {
            alert("Vui lòng nhập họ và tên");
            return false;
        }
        if (sdt.trim() == "") {
            alert("Vui lòng nhập số điện thoại");
            return false;
        }
        // Kiểm tra số điện thoại có phải là số không
        if (isNaN(sdt)) {
            alert("Số điện thoại phải là số");
            return false;
        }
        if (email.trim() == "") {
            alert("Vui lòng nhập email");
            return false;
        }
        // Kiểm tra định dạng email
        if (!emailRegex.test(email)) {
            alert("Định dạng email không hợp lệ");
            return false;
        }
        if (gioiTinh.trim() == "") {
            alert("Vui lòng chọn giới tính");
            return false;
        }
        if (hinhAnh.trim() == "") {
            alert("Vui lòng chọn hình ảnh");
            return false;
        }
        if (username.trim() == "") {
            alert("Vui lòng nhập tên đăng nhập");
            return false;
        }
        if (password.trim() == "") {
            alert("Vui lòng nhập mật khẩu");
            return false;
        }
        // Kiểm tra điều kiện mật khẩu
        if (!passwordRegex.test(password)) {
            alert("Mật khẩu phải có ít nhất 8 ký tự, bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt");
            return false;
        }
        if (confirmPassword.trim() == "") {
            alert("Vui lòng nhập lại mật khẩu");
            return false;
        }
        if (password != confirmPassword) {
            alert("Mật khẩu và nhập lại mật khẩu không khớp");
            return false;
        }

        return true;
    }
</script>