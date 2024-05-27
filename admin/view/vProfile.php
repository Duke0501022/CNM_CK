<?php
include_once("controller/cInfo.php");


// Đảm bảo rằng biến session 'username' đã được khởi tạo
if (isset($_SESSION['username']) || isset($_SESSION['Role'])) {
  $username = $_SESSION['username'];
  $role = $_SESSION['Role'];
} else {
  $username = null;
  $role = null;
}

// Gọi phương thức select_info để lấy thông tin người dùng
$info = new cInfo();
$result = $info->select_info($username, $role);

// Khởi tạo biến $role để tránh lỗi Undefined variable


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thông tin tài khoản</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* CSS styles */
    .user-info {
  margin-top: 50px;
}

.user-image-wrapper {
  position: relative;
}

.user-image {
  width: 150px;
  height: 150px;
  object-fit: cover;
  border-radius: 50%;
  transition: transform 0.3s ease;
}

.user-image:hover {
  transform: scale(1.1); /* Kích thước hình ảnh phóng to khi hover */
}

.user-details {
  overflow: hidden;
}

.user-details h5 {
  margin-top: 0;
}
.card-header h2 {
    color: #6699FF; /* Màu chữ xanh */
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
          <h2>Thông tin tài khoản</h2>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <?php
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo '<div class="user-image-wrapper">';
                  echo '<img src="admin/assets/uploads/images/' . $row["hinhAnh"] . '" alt="User Image" class="user-image">';
                  echo '</div>';
                }
              }
              ?>
            </div>
            <div class="col-md-8">
              <div class="user-details">
                <?php
                if (mysqli_num_rows($result) > 0) {
                  mysqli_data_seek($result, 0); // Đưa con trỏ dữ liệu về vị trí đầu tiên
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo '<h5 class="mb-3">Họ tên: ' . $row["hoTen"] . '</h5>';
                    echo '<p>Giới tính: ' . ($row["gioiTinh"] == 0 ? "Nam" : "Nữ") . '</p>';
                    echo '<p>Số điện thoại: ' . $row["soDienThoai"] . '</p>';
                    echo '<p>Email: ' . $row["email"] . '</p>';
                    echo '<p>Chức vụ: ';
                                  switch ($row["Role"]) {
                                      case '1':
                                          echo 'Admin';
                                          break;
                                      case '3':
                                          echo 'Chuyên viên';
                                          break;
                                      case '4':
                                          echo 'Quản trị viên';
                                          break;
                                      default:
                                          echo 'Unknown';
                                          break;
                                  }
                                  echo '</p>';
                  }
                } else {
                  echo "0 results";
                }
                ?>
              </div>
            </div>
          </div>
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
