<?php

// include_once("Model/mLienHe.php");
// include_once("Controller/CLienHe.php");

// $lienheModel = new LienHeModel();

?>

<!-- Header Start -->
<!-- <div class="container-fluid bg-primary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h3 class="display-3 font-weight-bold text-white">Liên hệ</h3>
    </div>
</div> -->
<!-- Header End -->

<!-- Contact Start -->
<!-- <div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center pb-2">
            <p class="section-title px-5"><span class="px-2">Liên lạc</span></p>
            <h1 class="mb-4">Liên lạc với chúng tôi</h1>
        </div>
        <div class="row">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form method="post" action="">
                        <div class="control-group">
                            <input type="text" class="form-control" name="hoTen" placeholder="Họ tên" required="required" />
                        </div>
                        </br>
                        <div class="control-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" required="required" />
                        </div>
                        </br>
                        <div class="control-group">
                            <input type="tel" class="form-control" name="soDienThoai" placeholder="Số điện thoại" required="required" />
                        </div>
                        </br>
                        <div class="control-group">
                            <input type="text" class="form-control" name="tieuDe" placeholder="Tiêu đề" required="required" />
                        </div>
                        </br>
                        <div class="control-group">
                            <textarea class="form-control" rows="6" name="noiDung" placeholder="Nội dung" required="required"></textarea>
                        </div>
                        </br>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" name="send">Gửi</button>
                        </div>
                        </br>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <div class="d-flex">
                    <i class="fa fa-map-marker-alt d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle" style="width: 45px; height: 45px;"></i>
                    <div class="pl-3">
                        <h5>Địa chỉ</h5>
                        <p>12 Nguyễn Văn Bảo</p>
                    </div>
                </div>
                <div class="d-flex">
                    <i class="fa fa-envelope d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle" style="width: 45px; height: 45px;"></i>
                    <div class="pl-3">
                        <h5>Email</h5>
                        <p>Xuanhauk16@gmail.com</p>
                    </div>
                </div>
                <div class="d-flex">
                    <i class="fa fa-phone-alt d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle" style="width: 45px; height: 45px;"></i>
                    <div class="pl-3">
                        <h5>Số điện thoại</h5>
                        <p>+012 345 67890</p>
                    </div>
                </div>
                <div class="d-flex">
                    <i class="far fa-clock d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle" style="width: 45px; height: 45px;"></i>
                    <div class="pl-3">
                        <h5>Giờ mở cửa</h5>
                        <strong>Thứ 2 - Thứ 6</strong>
                        <p class="m-0">08:00 AM - 05:00 PM </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Contact End -->

<?php
// if (isset($_REQUEST['send'])) {
//     $tieuDe = $_REQUEST['tieuDe'];
//     $noiDung = $_REQUEST['noiDung'];
//     $hoTen = $_REQUEST['hoTen'];
//     $soDienThoai = $_REQUEST['soDienThoai'];
//     $email = $_REQUEST['email'];

//     $thoiGian = date('Y-m-d H:i:s'); // Lấy thời gian hiện tại
//     $addSuccess = $lienheModel->insert_lienhe($tieuDe, $noiDung, $thoiGian, $hoTen, $soDienThoai, $email);
//     if ($addSuccess) {
//         $sendSuccess = $contactModel->sendEmail($email, $tieuDe, $thoiGian, $noiDung, $hoTen, $soDienThoai, $email);
//         if ($sendSuccess) {
//             echo "<script>alert('Xin cảm ơn! Chúng tôi sẽ phản hồi cho bạn sớm nhất có thể')</script>";
//         } else {
//             echo "<script>alert('Xin lỗi! Yêu cầu của bạn hiện không thể gửi email')</script>";
//         }
//     } else {
//         echo "<script>alert('Xin lỗi! Yêu cầu của bạn hiện không thể ghi nhận')</script>";
//     }
// }
?>

<?php

require_once("Model/mLienHe.php");
// require_once("Model/ContactModel.php");
require_once("Controller/CLienHe.php");

$lienheModel = new LienHeModel();
$contactModel = new ContactModel();

?>

<!-- Header Start -->
<div class="container-fluid bg-primary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h3 class="display-3 font-weight-bold text-white">Liên hệ</h3>
    </div>
</div>
<!-- Header End -->

<!-- Contact Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center pb-2">
            <p class="section-title px-5"><span class="px-2">Liên lạc</span></p>
            <h1 class="mb-4">Liên lạc với chúng tôi</h1>
        </div>
        <div class="row">
            <div class="col-lg-7 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form method="post" action="">
                        <div class="control-group">
                            <input type="text" class="form-control" name="hoTen" placeholder="Họ tên" required="required" />
                        </div>
                        <br>
                        <div class="control-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" required="required" />
                        </div>
                        <br>
                        <div class="control-group">
                            <input type="tel" class="form-control" name="soDienThoai" placeholder="Số điện thoại" required="required" />
                        </div>
                        <br>
                        <div class="control-group">
                            <input type="text" class="form-control" name="tieuDe" placeholder="Tiêu đề" required="required" />
                        </div>
                        <br>
                        <div class="control-group">
                            <textarea class="form-control" rows="6" name="noiDung" placeholder="Nội dung" required="required"></textarea>
                        </div>
                        <br>
                        <div>
                            <button class="btn btn-primary py-2 px-4" type="submit" name="send">Gửi</button>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 mb-5">
                <div class="d-flex">
                    <i class="fa fa-map-marker-alt d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle" style="width: 45px; height: 45px;"></i>
                    <div class="pl-3">
                        <h5>Địa chỉ</h5>
                        <p>12 Nguyễn Văn Bảo</p>
                    </div>
                </div>
                <div class="d-flex">
                    <i class="fa fa-envelope d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle" style="width: 45px; height: 45px;"></i>
                    <div class="pl-3">
                        <h5>Email</h5>
                        <p>Xuanhauk16@gmail.com</p>
                    </div>
                </div>
                <div class="d-flex">
                    <i class="fa fa-phone-alt d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle" style="width: 45px; height: 45px;"></i>
                    <div class="pl-3">
                        <h5>Số điện thoại</h5>
                        <p>+012 345 67890</p>
                    </div>
                </div>
                <div class="d-flex">
                    <i class="far fa-clock d-inline-flex align-items-center justify-content-center bg-primary text-secondary rounded-circle" style="width: 45px; height: 45px;"></i>
                    <div class="pl-3">
                        <h5>Giờ mở cửa</h5>
                        <strong>Thứ 2 - Thứ 6</strong>
                        <p class="m-0">08:00 AM - 05:00 PM </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<?php
include_once("Model/mLienHe.php");

$mLienHe = new LienHeModel();
$contactModel = new ContactModel();

if (isset($_POST['send'])) {
    $to = $_POST['email'];
    $tieuDe = $_POST['tieuDe'];
    $noiDung = $_POST['noiDung'];
    $hoTen = $_POST['hoTen'];
    $email = $_POST['email'];
    $soDienThoai = $_POST['soDienThoai'];
    

    $thoiGian = date('Y-m-d H:i:s'); // Lấy thời gian hiện tại
    $addSuccess = $lienheModel->insert_lienhe($tieuDe, $noiDung, $thoiGian, $hoTen, $soDienThoai, $email);
    if ($addSuccess) {
        $sendSuccess = $contactModel->sendEmail($to, $tieuDe, $noiDung, $hoTen, $soDienThoai, $email);
        if ($sendSuccess) {
            echo "<script>alert('Xin cảm ơn! Chúng tôi sẽ phản hồi cho bạn sớm nhất có thể')</script>";
        } else {
            echo "<script>alert('Xin lỗi! Yêu cầu của bạn hiện không thể gửi phản hồi. Vui lòng thử lại sau.')</script>";
        }
    } 
}
?>