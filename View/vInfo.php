<?php
include_once("Controller/cInfo.php");

if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
} else {
  $username = null;
}
$info = new cInfo();
$result = $info->select_info($username);
?>
<style>
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

  .user-details h4 {
    margin-top: 0;
  }
</style>
</head>

<body>
  ho '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">Sửa thông tin</button>';
                ec<div class="container user-info">
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
                echo '<img src="img/' . $row["hinhAnh"] . '" alt="User Image" class="user-image mb-3">';
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
  <!-- Modal -->

  <?php
  include_once("Controller/cInfo.php");
  if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
  } else {
    $username = null;
  }
  $info = new cInfo();
  // $result = $info->update_info2($username, $hoTen, $gioiTinh, $soDienThoai, $email);

  if (isset($_REQUEST["send"])) {
    $username = $_SESSION['username'];
    
    $hoTen = $_POST['hoTen'];
    $gioiTinh = $_POST['gioiTinh'];
    $soDienThoai = $_POST['soDienThoai'];
    $hinhAnh = $_POST['hinhAnh']; // Nếu bạn muốn xử lý hình ảnh, hãy sử dụng $_FILES thay vì $_POST
    $email = $_POST['email'];
   

    // Gọi phương thức update_info2 từ mInfo
    $info = new mInfo();
    $success = $info->update_info2($username, $hoTen, $gioiTinh, $soDienThoai, $email);

    if ($success) {
      echo "Thay đổi thành công";
    } else {
      echo "Thay đổi thất bại";
    }
  }
  ?>
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
          <form>
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
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          <button type="button" class="btn btn-primary" name="send">Lưu thay đổi</button>
        </div>
      </div>
    </div>
  </div>

</body>
