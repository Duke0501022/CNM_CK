<?php
    include("controller/NhanVienPhanPhoi/cnvphanphoi.php");
    include_once("controller/TaiKhoan/ctaikhoan.php");
    $idChuyenVien = $_REQUEST['idChuyenVien'];
    echo $idChuyenVien;
    $p = new cNVPP();
    $a= new ctaikhoan();
    $table = $p-> select_nhanvien_byid($idChuyenVien);
    // var_dump($table);
?>
<div class="content-wrapper">
    <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
    <div  class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> Cập nhật tài khoản</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="" method="POST">
            <div class="modal-body">
              <div class="form-group">
                <label >Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Enter First Name">
              </div>
              <div class="form-group">
                <label> Username </label>
                <input type="text" name="usernamecu" id="username1" class="form-control" placeholder="Enter First Name" readonly>
              </div>
          
              <div class="form-group">
                <label> Password </label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
              <button type="submit" name="submit1" class="btn btn-primary" >Cập nhật</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cập nhật thông tin chuyên viên</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
              <li class="breadcrumb-item active">Quản lý chuyên viên</li>
            </ol>
          </div>
        </div>
      </div> <!-- /.container-fluid -->
    </section>
    <!-- Main Content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">

          </div>
          <div class="col-md-6">

          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 style="text-align:center">Thông tin nhân viên phân phối</h3>
                <?php
                  if ($table){
                    if (mysqli_num_rows($table)>0) {
                      while ($row=mysqli_fetch_assoc($table)){
                ?>
                <form action="#" method="post" enctype="multipart/form-data">
                  <div class="row-md-12">
                    <div class="row">
                      <div class="col-md-4">
                      <td>
                                    <?php
                                      if($row["hinhAnh"] == NULL){
                                        echo "<td><img src='admin/assets/uploads/images/user.png' alt='' height='200px' width='300px'style='border-radius:50px' ></td>";
                                      }else {
                                        echo "<td><img src='assets/uploads/images/".$row['hinhAnh']."' alt='' height='200px' width='300px'style='border-radius:50px' ></td>";
                                        // echo "<td><img src='assets/uploads/images/".$row['HinhAnh']."' alt='' height='200px' width='300px'></td>";
                                      }
                                    ?> 
                          </td>
                          <td><input type='file' class='form-control' name='txtHinhAnh'></td>
                      </div>
                      <div class="col-md-4">                      
                        <td>Mã chuyên viên</td>
                        <td><input type='text' class='form-control' name='idchuyenvien' value="<?php echo $row['idChuyenVien'] ?>" readonly></td>
                        <td>Tên nhân viên phân phối</td>
                        <td><input type='text' class='form-control' name='tencv' value="<?php echo $row['hoTen'] ?>"></td>
                        <td>Giới tính</td>
                        <td>
                        <select name="gioitinh" id="gioitinh" class="form-control">
    <option value="0" <?php if ($row['gioiTinh'] == "0") echo "selected"; ?>>Nam</option>
    <option value="1" <?php if ($row['gioiTinh'] == "1") echo "selected"; ?>>Nữ</option>
</select>
                        </td>
                        <td>Mô tả</td>
                        <td><input type='text' class='form-control' name='mota' value="<?php echo $row['moTa'] ?>" ></td>                
                    
                       
                        
                      </div>
                      <div class="col-md-4">
                        <td>Ngày sinh</td>
                        <td><input type='date' class='form-control' name='ngaysinh' value="<?php echo $row['ngaySinh'] ?>"></td>
                        <td>Số Điện Thoại</td>
                        <td><input type='text'class='form-control' name='sdt' value="<?php echo $row['soDienThoai'] ?>"></td>
                        <td>Email</td>
                        <td><input type='text'class='form-control' name='email' value="<?php echo $row['email'] ?>"></td>
                      </div>
                          <button type="submit" class="btn btn-primary" name="submit" style="margin-left:50%">Cập nhật</button>
                          <!-- <button type="submit" class="btn btn-primary" name="reset" >Hủy</button> -->
                    </div>
                    </div>
                  </div>
                </form>
                  
                  <div>
                    <?php
                          }
                        }
                      } 
                    ?>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
<?php
  if(isset($_REQUEST["submit"])){
    $idChuyenVien=$_REQUEST["idchuyenvien"];
    $hoTen=$_REQUEST["tencv"];
    $soDienThoai=$_REQUEST["sdt"];

    $ngaySinh=$_REQUEST["ngaysinh"];
    $email=$_REQUEST["email"];
    $gioiTinh=$_REQUEST["gioitinh"];
    $hinhAnh=$_REQUEST["hinhanh"];
    $moTa=$_REQUEST["mota"];
    $hinhAnh = NULL;

    if(isset($_FILES['txtHinhAnh']) && $_FILES['txtHinhAnh']['size'] > 0) {
        // Đường dẫn lưu hình ảnh
        $target_dir = "admin/assets/uploads/images/";
        $target_file = $target_dir . basename($_FILES["txtHinhAnh"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Kiểm tra xem hình ảnh có thực sự là hình ảnh hay không
        $check = getimagesize($_FILES["txtHinhAnh"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "<script>alert('File không phải là hình ảnh.');</script>";
            $uploadOk = 0;
        }

        // Kiểm tra kích thước file (giới hạn 5MB)
        if ($_FILES["txtHinhAnh"]["size"] > 5000000) {
            echo "<script>alert('Xin lỗi, hình ảnh quá lớn.');</script>";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "<script>alert('Xin lỗi, hình ảnh của bạn không được tải lên.');</script>";
        } else {
            if (move_uploaded_file($_FILES["txtHinhAnh"]["tmp_name"], $target_file)) {
                $hinhAnh = basename($_FILES["txtHinhAnh"]["name"]);
            } else {
                echo "<script>alert('Xin lỗi, đã có lỗi xảy ra khi tải lên file.');</script>";
            }
    }
}
    $Role=3;
    $p= new cNVPP();
      $update=$p->update_NVPP($idChuyenVien, $hoTen, $soDienThoai, $email, $hinhAnh,$moTa,$gioiTinh,$ngaySinh);
          
      if($update==1){
        echo "<script>alert('Cập nhật thành công');</script>";
        echo "<script>window.location.href='?qlcv'</script>";
      }else {
        echo "<script>alert('Cập nhật không thành công');</script>";
        echo "<script>window.location.href='?qlcv'</script>";
      }
  }
?>
<script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#username').val(data[0]);
                $('#username1').val(data[0]);

            });
        });
</script>

