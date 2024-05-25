<?php
//session
session_start();
session_regenerate_id(true);
date_default_timezone_set('Asia/Ho_Chi_Minh');
//define connect
// require_once("config/config.php");
//

include_once("Controller/TaiKhoan/cTaikhoan.php");
$account = new cTaikhoan();
if (isset($_POST['username'])) {
    $us = $_POST['username'];
}
if (isset($_POST['password'])) {
    $pw = $_POST['password'];
}

if (isset($_POST['submit']) && ($_REQUEST['submit'] == 'login')) {
    $account->login($us, $pw);
}
if (isset($_REQUEST['logout'])) {
    include_once("View/logout.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>KidKinder - Tư vấn & hổ trợ</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
            <a href="index.php" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px;">
                <img src="./img/childcare.png" alt="Logo" style="width: 60px; height: auto; margin-right: 10px;">
                <span class="text-primary " style=" font-size: 30px;">CHILDCARE</span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav font-weight-bold mx-auto py-0">
                    <a href="index.php" class="nav-item nav-link ">Về chúng tôi</a>
                    <?php
                    if (isset($_SESSION['LoginSuccess']) && $_SESSION['LoginSuccess'] == true) {
                        echo '<a href="index.php?tracnghiem" class="nav-item nav-link">Theo dõi phát triển</a>';
                    }
                    ?>
                    <div class="nav-item dropdown">
                        <?php
                        if (isset($_SESSION['LoginSuccess']) && $_SESSION['LoginSuccess'] == true) {
                            echo '<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Tư vấn</a>';
                        }
                        ?>
                        <div class="dropdown-menu rounded-0 m-0">
                            <?php
                            if (isset($_SESSION['LoginSuccess']) && $_SESSION['LoginSuccess'] == true) {
                                echo '<a href="index.php?tuvantudong" class="dropdown-item">Tư vấn tự động</a>';
                            }
                            if (isset($_SESSION['LoginSuccess']) && $_SESSION['LoginSuccess'] == true) {
                                echo '<a href="index.php?chuyengia" class="dropdown-item">Tư vấn trực tuyến với chuyên gia</a>';
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                    if (isset($_SESSION['LoginSuccess']) && $_SESSION['LoginSuccess'] == true) {
                        echo ' <a href="index.php?phanhoi" class="nav-item nav-link">Phản Hồi</a>';
                    }
                    ?>
                    <a href="index.php?tintuc" class="nav-item nav-link">Tin tức</a>
                    <a href="index.php?lienhe" class="nav-item nav-link">Liên hệ</a>
                </div>
                <?php
                if (isset($_SESSION['LoginSuccess']) && $_SESSION['LoginSuccess'] == true) {
                    echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Tài khoản
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="index.php?info">Thông tin cá nhân</a>
                                        <a class="dropdown-item" href="#">Đổi mật khẩu</a>
                                        <a class="dropdown-item" href="index.php?xemlichsu">Xem lịch sử</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="index.php?logout">Đăng xuất</a>
                                    </div>
                                </li>
                            </ul>
                        </div>';
                } else {
                ?>
                    <a href="index.php?login" class="btn btn-primary px-4">Đăng nhập</a>
                    <a href="index.php?register" class="btn btn-primary px-4">Đăng ký</a>
                <?php } ?>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
    <!-- Navbar End -->
    <?php
  
    if (isset($_REQUEST['tuvantudong'])) {
        include('View/chatbot/tuvantudong.php');
    } else if (isset($_REQUEST['phanhoi'])) {
        include('View/phanhoi.php');
    } else if (isset($_REQUEST['chuyengia'])) {
        include('View/chuyengia.php');
    } else if (isset($_REQUEST['tintuc'])) {
        include('View/tintuc/tintuc.php');
    } else if (isset($_REQUEST['showtintuc'])) {
        include('View/tintuc/showtintuc.php');
    } else if (isset($_REQUEST['lienhe'])) {
        include('View/lienhe.php');
    } else if (isset($_REQUEST['login'])) {
        include('View/login.php');
    } else if (isset($_REQUEST['register'])) {
        include('View/register.php');
    } else if (isset($_REQUEST['xemlichsu'])) {
        include('View/xemls.php');
    } else if (isset($_REQUEST['tuvanchuyengia'])) {
        include('View/tuvanchuyengia.php');
    } else if (isset($_REQUEST['phanhoigiaovien'])) {
        include('View/phanhoigiaovien.php');
    }  else if (isset($_REQUEST['tracnghiem'])) {
        include('View/tracnghiem.php');
    } else if (isset($_REQUEST['lambaitracnghiem'])) {
        include('View/lambaitracnghiem.php');
    } else if (isset($_REQUEST['info'])) {
        include('View/vInfo.php');
    } else if (isset($_REQUEST['forgot'])) {
        include('View/forgotpass.php');
    } else if (isset($_REQUEST['newpass'])) {
        include('View/newpass.php');
    } else {
        include('View/main.php');
    }

    ?>
    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row justify-content-center align-items-center pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="" class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0" style="font-size: 40px; line-height: 40px;">
                    <img src="./img/childcare.png" alt="Logo" style="width: 60px; height: auto; margin-right: 10px;">
                    <span class="text-primary " style=" font-size: 30px;">CHILDCARE</span>
                </a>
                <p>KidKinder là một nền tảng trực tuyến được thiết kế đặc biệt để hỗ trợ và tư vấn cho trẻ tự kỷ và gia đình của họ.
                    Chúng tôi cung cấp các nguồn tài nguyên, thông tin và dịch vụ chuyên môn nhằm giúp trẻ tự kỷ phát triển toàn diện và tối đa
                    hóa tiềm năng của họ trong môi trường học tập và xã hội.</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h3 class="text-primary mb-4">Liên lạc</h3>
                <div class="d-flex">
                    <h4 class="fa fa-map-marker-alt text-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">Địa chỉ</h5>
                        <p>12 Nguyễn Văn Bảo, phường 4, Gò Vấp.</p>
                    </div>
                </div>
                <div class="d-flex">
                    <h4 class="fa fa-envelope text-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">Email</h5>
                        <p>Xuanhauk16@gmail.com</p>
                    </div>
                </div>
                <div class="d-flex">
                    <h4 class="fa fa-phone-alt text-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">Số điện thoại</h5>
                        <p>035 2594 707</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Footer End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>