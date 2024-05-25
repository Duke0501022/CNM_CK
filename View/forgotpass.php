
<style>
  body {
    font-family: 'Arial', sans-serif;
    
    background: url(../kindergarten-website-template/img/login.jpg);
  }
  .login-container {
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

<div class="login-container">
  <h2 class="header-text">Quên mật khẩu</h2>
  <form action='' method="POST"> 
    <div class="form-group">
      <label for="loginUsername">Email</label>
      <p class="text-danger">
  <?php if (isset($fail['check'])) {
    echo $fail['check'];
  } ?>
</p>
      <input type="username" class="form-control" name="email" id="loginUsername" placeholder="Nhập email của bạn" >
    </div>
    <button type="submit" name="btn-forgot" class="btn btn-primary btn-block mt-3" id="loginbtn" value="login">Gửi</button> 
    <a href="index.php?login" class="form-link">Đăng nhập</a>
    <a href="index.php?register" class="form-link">Bạn chưa có tài khoản ? Đăng ký</a>
  </form>
</div>

</body>

<?php
include_once("Controller/KhachHangDoanhNghiep/cKhachHangDoanhNghiep.php");
$p = new cKHDN();

$TK = $p->select_KHDN();
$fail = array();

if (isset($_POST['btn-forgot'])) {
  $fail = array();
  $emailMatch = false; // Cờ kiểm tra xem có email nào khớp không
  foreach ($TK as $item) {
    if ($_POST['email'] == $item['email']) {
      $email = $_POST['email'];
      $ac = $p->select_doanhnghiep_email($email);
      $hoTenSuccess = $ac[0]['hoTen'];
      $emailSuccess = $ac[0]['email'];
      $username = $ac[0]['username'];
      require 'View/sendmailPas.php';
      $emailMatch = true;
      break;
    }
  }
  if (!$emailMatch) {
    $fail['check'] = 'Email sai!'; // Đặt thông báo lỗi ở đây nếu không tìm thấy email khớp
  }
}
?>





