<?php 

include_once("controller/PhuHuynh/cdoanhnghiep.php");

$p = new cKHDN();

$table = $p->select_KHDN();

?>
<!-- Content Wrapper. Contains page content -->
<style>
    .rounded-image {
      border-radius: 10px; /* Bo góc hình ảnh */
      object-fit: cover; /* Đảm bảo hình ảnh được căn chỉnh và không bị vặn */
      transition: transform 0.3s ease; /* Hiệu ứng khi di chuột qua */
    }

    .rounded-image:hover {
      transform: scale(1.1); /* Phóng to hình ảnh khi di chuột qua */
    }
  </style>

<body>

  <!-- Content Wrapper -->
  <div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý Thông Tin Phụ Huynh</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
              <li class="breadcrumb-item active">Quản lý phụ huynh</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Danh sách thông tin phụ huynh</h3> | <a href="?adddn">Thêm phụ huynh mới</a>
                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th style="text-align:center">STT</th>
                      <th style="text-align:center">Mã Phụ Huynh</th>
                      <th style="text-align:center">Tên Phụ Huynh</th>
                      <th style="text-align:center">Email</th>
                      <th style="text-align:center">Giới Tính</th>
                      <th style="text-align:center">Hình Ảnh</th>
                      <th style="text-align:center">Tác vụ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    if ($table) {
                      $stt = 1;
                      if (mysqli_num_rows($table) > 0) {
                        while ($row = mysqli_fetch_assoc($table)) {
                          echo "<tr>";
                          echo "<td style='text-align:center'>" . $stt++ . "</td>"; // Tăng giá trị của biến đếm và hiển thị nó
                          echo "<td style='text-align:center'>" . $row['idPhuHuynh'] . "</td>";
                          echo "<td style='text-align:center'>" . $row['hoTen'] . "</td>";
                          echo "<td style='text-align:center'>" . $row['email'] . "</td>";
                          if ($row['gioiTinh'] == 0) {
                            echo "<td style='text-align:center'>Nam</td>";
                          } else {
                            echo "<td style='text-align:center'>Nữ</td>";
                          }
                          if ($row['hinhAnh'] == NULL) {
                            echo "<td style='text-align:center'><img class='rounded-image' src='/assets/uploads/images/user.png' alt='' height='100px' width='150px'></td>";
                          } else {
                            echo "<td style='text-align:center'><img class='rounded-image' src='admin/assets/uploads/images/" . $row['hinhAnh'] . "' alt='' height='100px' width='150px'></td>";
                          }
                          echo "<td style='text-align:center'><a href='?updatekh&&MaKH=" . $row['idPhuHuynh'] . "'><i class='fa fa-pen' aria-hidden='true'></i></a> | <a href='?delkh&&idPhuHuynh=" . $row['idPhuHuynh'] . "&&username=" . $row['username'] . "' onclick='return confirm_delete();'><i class='fa fa-trash' aria-hidden='true'></i></a></td>";
                          echo "</tr>";
                        }
                      }
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- JavaScript -->
  <script>
    function confirm_delete() {
      return confirm('Bạn có chắc chắn muốn xóa?');
    }
  </script>
</body>
<!-- /.content-wrapper -->

<script>
function confirm_delete() {
  return confirm('Bạn có chắc chắn muốn xóa?');
}
</script>
