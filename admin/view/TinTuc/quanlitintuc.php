<?php 

include_once("controller/TinTuc/cTinTuc.php");

$p = new cloaibaiviet();
$wait = 1;
$table = $p->select_tintucwait($wait);
$list_duyet = $p->getAllDishWait(0);

?>
<style>
    /* Bo góc và hiệu ứng hover cho hình ảnh */
    .thumbnail {
        overflow: hidden;
        width: 150px; /* Độ rộng của hình ảnh */
        height: 100px; /* Độ cao của hình ảnh */
        border-radius: 5px;
    }

    .thumbnail img {
        width: 100%; /* Đảm bảo hình ảnh chiếm toàn bộ không gian của phần tử cha */
        height: auto; /* Đảm bảo tỷ lệ chiều cao phù hợp */
        transition: transform 0.3s ease;
    }

    /* Hiệu ứng hover */
    .thumbnail img:hover {
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
          <h1>Quản lý Tin Tức</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
            <li class="breadcrumb-item active">Quản lý Tin Tức</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <style>
 @keyframes bounce {
  0%, 20%, 50%, 80%, 100% {
    transform: translateY(0);
  }
  40% {
    transform: translateY(-5px);
  }
  60% {
    transform: translateY(-3px);
  }
}

.duyet {
  display: inline-block;
  animation: bounce 1s infinite;
}

</style>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
               <button  class="btn btn-primary"><a href="?addtt" style="color: #fff;">Thêm tin tức mới</a></button>   | <button  class="btn btn-primary"><a href="?duyett" style="color: #fff;">Duyệt tin tức</a></button>
            <?php if(!empty($list_duyet)){ ?>
              <span class="text-danger duyet">Có <?php echo count($list_duyet); ?> tin cần duyệt</span>

           <?php }else { ?>
            <span>Không có món nào cần duyệt</span>
            <?php } ?>   
              
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
                    <th style="text-align:center">Tiêu Đề</th>
                    <th style="text-align:center">Nội dung</th>  
                    <th style="text-align:center">Hình Ảnh</th>
                    <th style="text-align:center">Thao tác</th>
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
                          echo "<td style='text-align:center'>" . $row['tieuDe'] . "</td>";
                          
                          // Button trigger modal
                          echo "<td style='text-align:center'><a href='#' data-toggle='modal' data-target='#modalContent" . $row['idTinTuc'] . "'>Xem chi tiết</a></td>";
                          if ($row['hinhAnh'] == NULL) {
                            echo "<td style='text-align:center'><img class='thumbnail' src='/assets/uploads/images/user.png' alt='' height='100px' width='150px'></td>";
                          } else {
                            echo "<td style='text-align:center'><img class='thumbnail' src='admin/assets/uploads/images/" . $row['hinhAnh'] . "' alt='' height='100px' width='150px'></td>";
                          }
                          echo "<td style='text-align:center'><a href='?updatett&&idTieuDe=".$row['idTinTuc']."'><i class='fa fa-pen' aria-hidden='true'></i></a> | <a href='?deltintuc&&idTinTuc=".$row['idTinTuc']."' onclick='return confirm_delete();'><i class='fa fa-trash' aria-hidden='true'></i></a></td>";
                         
                          echo "</tr>";

                          // Modal
                          echo "<div class='modal fade' id='modalContent" . $row['idTinTuc'] . "' tabindex='-1' role='dialog' aria-labelledby='modalTitle" . $row['idTinTuc'] . "' aria-hidden='true'>";
                          echo "<div class='modal-dialog' role='document'>";
                          echo "<div class='modal-content'>";
                          echo "<div class='modal-header'>";
                          echo "<h5 class='modal-title' id='modalTitle" . $row['idTinTuc'] . "'>Chi tiết tin tức</h5>";
                          echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                          echo "<span aria-hidden='true'>&times;</span>";
                          echo "</button>";
                          echo "</div>";
                          echo "<div class='modal-body'>";
                          echo $row['noiDung'];
                          echo "</div>";
                          echo "<div class='modal-footer'>";
                          echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Đóng</button>";
                          echo "</div>";
                          echo "</div>";
                          echo "</div>";
                          echo "</div>";
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

<script>
function confirm_delete() {
  return confirm('Bạn có chắc chắn muốn xóa?');
}
</script>
