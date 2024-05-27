<?php 

include_once("controller/cLichSu.php");

$p = new cLichSu();

$table = $p->select_ketqua();

?>
<style>


.pagination-rows img {
    border-radius: 5px;
    transition: transform 0.3s ease;
    object-fit: cover; /* Để giữ tỉ lệ và điều chỉnh kích thước */
}

/* Hiệu ứng hover */
.pagination-rows img:hover {
    transform: scale(1.05);
}

</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Danh Sách Lịch Sử Kiểm Tra </h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
            <li class="breadcrumb-item active">Quản lý</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <!-- Optional content -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
          <!-- Optional content -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Danh sách thông tin </h3>
              
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
                    <th style="text-align:center">Tên Phụ Huynh</th>
                    <th style="text-align:center">Email</th>
                    <th style="text-align:center">Hình Ảnh</th>
                    <th style="text-align:center">Điểm số</th>
                    <th style="text-align:center">Nội dung đánh giá</th>
                    <th style="text-align:center">Tên Unit</th>                 
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
                         
                          echo "<td style='text-align:center'>" . $row['hoTen'] . "</td>";
                          echo "<td style='text-align:center'>" . $row['email'] . "</td>";
                            if ($row['hinhAnh'] == NULL) {
                                                    echo "<td style='text-align:center'><img class='rounded-image' src='/assets/uploads/images/user.png' alt='' height='100px' width='150px'></td>";
                                                  } else {
                                                    echo "<td style='text-align:center'><img class='rounded-image' src='admin/assets/uploads/images/" . $row['hinhAnh'] . "' alt='' height='100px' width='150px'></td>";
                                                  }
                          echo "<td style='text-align:center'>" . $row['diemSo'] . "</td>";
                          echo "<td style='text-align:center'>" . $row['noiDungKetQua'] . "</td>";
                          echo "<td style='text-align:center'>" . $row['tenUnit'] . "</td>";
                        
                          
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


