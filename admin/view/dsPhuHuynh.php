<?php
if (isset($_SESSION['idChuyenVien'])) {
    $idChuyenVien = $_SESSION['idChuyenVien'];
} else {
    echo "<script>alert('Bạn chưa đăng nhập!');</script>";
    echo "<script>window.location.href = 'index.php';</script>";
    exit;
}
?>
<?php
include_once("controller/cTuVanKH.php");

$tuvan = new cTuVanPhuHuynh();
$listcv1 = $tuvan->getTestPH();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thông tin tài khoản</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* CSS for custom button styles */
    .btn-primary,
    .btn-secondary {
        background-color: #007bff; /* Blue */
        border-color: #007bff; /* Blue */
        color: #fff; /* White text */
        padding: 10px 20px; /* Adjust padding as needed */
        border-radius: 5px; /* Rounded corners */
        font-size: 16px; /* Adjust font size as needed */
        cursor: pointer; /* Cursor style */
        transition: background-color 0.3s, border-color 0.3s, color 0.3s; /* Smooth transition */
    }

    .btn-primary:hover,
    .btn-secondary:hover {
        background-color: #0056b3; /* Darker blue on hover */
        border-color: #0056b3; /* Darker blue on hover */
    }

    .btn-primary:focus,
    .btn-secondary:focus {
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,.5); /* Focus glow effect */
    }

    .btn-primary:active,
    .btn-secondary:active {
        background-color: #0056b3; /* Darker blue when clicked */
        border-color: #0056b3; /* Darker blue when clicked */
    }

    .btn-primary.disabled,
    .btn-primary:disabled,
    .btn-secondary.disabled,
    .btn-secondary:disabled {
        opacity: 0.65; /* Reduced opacity for disabled state */
        cursor: not-allowed; /* Cursor style */
    }
</style>
</head>

<body>

  <!-- Nội dung hiển thị thông tin người dùng -->
  <div class="container user-info">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header text-center">
            <h2>Danh sách phụ huynh </h2>
          </div>
          <div class="card-body">
          <?php
    if (!empty($listcv1)) {
        foreach ($listcv1 as $cv) {
            // Kiểm tra xem các trường dữ liệu có tồn tại không
            if (isset($cv['idPhuHuynh'], $cv['hinhAnh'], $cv['hoTen'])) {
                // Lấy thông tin về đơn vị trắc nghiệm
                $idPhuHuynh = $cv['idPhuHuynh'];
                $hinhAnh = $cv['hinhAnh'];
                $phuHuynhName = $cv['hoTen'];
    ?>
                <div class="screening-card">
                    <div class="screening-card-header" style="color:Black;">Tư vấn phụ huynh <?= $phuHuynhName ?></div>
                    <div class="screening-card-body">
                        <img class="card-img-top mb-2" src='admin/assets/uploads/images/<?php echo $cv['hinhAnh']; ?>' alt="" style="width: 100px; height: 100px; border-radius: 50px;">
                        <a href="index.php?tuvankh=<?= $idPhuHuynh ?>&idPhuHuynh=<?= $idPhuHuynh ?>" class="btn btn-primary btn-screening">Chọn</a>
                    </div>
                </div>
    <?php
            } else {
                echo "<p>Không tìm thấy thông tin về chuyên viên.</p>";
            }
        }
    } else {
        echo "<p>Không có list chuyen gia.</p>";
    }
    ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal sửa thông tin -->
  

  <!-- Script JavaScript để gửi dữ liệu từ modal -->
  <script>
    document.getElementById("sendBtn").addEventListener("click", function() {
      var hoTen = document.getElementById("hoTen").value;
      var gioiTinh = document.getElementById("gioiTinh").value;
      var soDienThoai = document.getElementById("soDienThoai").value;
      var hinhAnh = document.getElementById("hinhAnh").value;
      var email = document.getElementById("email").value;

      // Sử dụng AJAX để gửi dữ liệu đến server
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "process.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          alert(xhr.responseText); // Hiển thị thông báo từ server
          location.reload(); // Tải lại trang sau khi gửi dữ liệu thành công
        }
      };
      // Gửi dữ liệu form thông tin người dùng
      xhr.send("hoTen=" + hoTen + "&gioiTinh=" + gioiTinh + "&soDienThoai=" + soDienThoai + "&hinhAnh=" + hinhAnh + "&email=" + email);
    });
  </script>

  <script src="https://code.jquery.com/jquery-3.5.1
