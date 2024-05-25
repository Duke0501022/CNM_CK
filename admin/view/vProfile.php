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

    .user-image {
      width: 150px;
      height: 150px;
      object-fit: cover;
      border-radius: 50%;
      float: left;
      margin-right: 20px;
    }

    .user-details {
      overflow: hidden;
    }

    .user-details h5 {
      margin-top: 0;
    }

    .modal-body input,
    .modal-body select {
      margin-bottom: 10px;
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
            <?php
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<img src="admin/assets/uploads/images/' . $row["hinhAnh"] . '" alt="User Image" class="user-image mb-3">';
                echo '<div class="user-details">';
                echo '<h5>Họ tên: ' . $row["hoTen"] . '</h5>';
                echo '<p>Giới tính: ' . ($row["gioiTinh"] == 0 ? "Nam" : "Nữ") . '</p>';
                echo '<p>Số điện thoại: ' . $row["soDienThoai"] . '</p>';
                echo '<p>Email: ' . $row["email"] . '</p>';
                echo '</div>';
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

  <!-- Modal sửa thông tin -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Sửa thông tin</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Form nhập liệu -->
          <form id="editForm">
            <div class="form-group">
              <label for="hoTen">Họ tên:</label>
              <input type="text" class="form-control" id="hoTen">
            </div>
            <div class="form-group">
              <label for="gioiTinh">Giới tính:</label>
              <select class="form-control" id="gioiTinh">
                <option value="0">Nam</option>
                <option value="1">Nữ</option>
              </select>
            </div>
            <div class="form-group">
              <label for="soDienThoai">Số điện thoại:</label>
              <input type="text" class="form-control" id="soDienThoai">
            </div>
            <div class="form-group">
              <label for="hinhAnh">Hình ảnh:</label>
              <input type="file" class="form-control" id="hinhAnh">
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <!-- Nút đóng modal -->
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          <!-- Nút gửi dữ liệu -->
          <button type="button" class="btn btn-primary" id="sendBtn">Lưu thay đổi</button>
        </div>
      </div>
    </div>
  </div>

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
