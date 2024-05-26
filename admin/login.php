<?php ?>
<html lang="en">
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Control Panel</title>
        <link rel="icon" type="image/x-icon" href="assets/public/images/iconu.png">
        <!--  -->
        <link rel="shortcut icon" href="public/images/templates/favicon.png" />
		<link rel="stylesheet" href="assets/public/css/bootstrap.css">
		<link rel="stylesheet" href="assets/public/css/login.css">
		<link rel="stylesheet" href="assets/public/css/font-awesome/css/font-awesome.min.css">
        <!--  -->
        <!-- Google Font: Source Sans Pro -->
  
    </head>
    <body>
        <div class="container khung">
            <div class="title">
                <h2 class="text-center" style="color:#337ab7">QUẢN TRỊ VIÊN</h2>
            </div>
            <hr>
            <div class="myform">
                <form name="form1" action="" method="post" role="form">
                    <div class="row form-row">
                        <div class="input-group">
                           <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                           <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập">
                          
                        </div>
                        <div class="error" id="password_error"></div>
                    </div>
                    <div class="row form-row">
                        <div class="input-group">
                           <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                           <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                          
                        </div>
                        <div class="error" id="password_error"></div>
                    </div>
                    <div class="row form-row" style="width:100%; margin-top: 15px;">
                        <button type="submit" name="submit" class="form-control btn btn-primary btn-login">Đăng nhập</button>
                    </div>
                    <!-- <?php  //if(isset($error)):?>
                        <div class="row">
                            <div class="alert alert-danger">
                                <?php //echo $error; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            </div>
                        </div>
                    <?php  //endif;?> -->
                </form>
            </div>
            <hr>
        </div>
        <?php 
            include_once("controller/TaiKhoan/ctaikhoan.php");
            $account = new ctaikhoan();
            if (isset($_POST['username'])) {
                $us = $_POST['username'];
            }
            if (isset($_POST['password'])) {
                $pw = $_POST['password'];
            }
            if (isset($_REQUEST['submit'])) {
                $account->login($us, $pw);
                if(isset($_SESSION['idChuyenVien']) ||isset($_SESSION['login_admin'])){

                    header("Location:../admin/");

                   
                }
            }
         ?>
        <nav class="navbar navbar-fixed-bottom" role="navigation">
            <div class="container">
               <h5 class="text-center">Copyright © 2024 <a href="#" style="color:red">CHILD CARE</a>. All rights reserved.</h5>
            </div>
        </nav>
        <!-- jQuery -->
        <script src="assets/vendor/jquery/jquery.min.js"></script> 
        <!-- Bootstrap 4 -->
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="assets/vendor/dist/js/adminlte.min.js"></script>
    
	</body>
</html>