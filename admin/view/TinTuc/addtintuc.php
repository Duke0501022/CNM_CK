<?php
  include_once("controller/TinTuc/cTinTuc.php");
  
  $p =new cloaibaiviet();
  $list_loai  = $p->select_tintuc();
 ?>
 <script>
  $(document).ready(function(){
            function kiemsdt(){
                var sdt=$("#sdt").val();
                regsdt=/^\+?(0[389][0-9]{8})$/;

                if(regsdt.test(sdt))
                {
                    $("#Sodienthoai").html("");
                    return true;
                }
                else
                {
                    $("#Sodienthoai").html("Số điện thoại phải đủ 10 chữ số và bắt đầu 03,08,09 ");
                    return false;
                }
            }
            $("#sdt").blur(kiemsdt);

            function kiemsdtndd(){
                var sdt=$("#sdtndd").val();
                regsdt=/^\+?(0[389][0-9]{8})$/;

                if(regsdt.test(sdt))
                {
                    $("#Sodienthoaindd").html("");
                    return true;
                }
                else
                {
                    $("#Sodienthoaindd").html("Số điện thoại phải đủ 10 chữ số và bắt đầu 03,08,09");
                    return false;
                }
            }
            $("#sdtndd").blur(kiemsdtndd);

            function kiemmail(){
                var mail=$("#email").val();
                regmail=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

                if(regmail.test(mail))
                {
                    $("#Email").html(" ");
                    return true;
                }
                else
                {
                    $("#Email").html("Mail không đúng định dạng");
                    return false;
                }
            }
            $("#email").blur(kiemmail);

            
            
            

        })
 </script>
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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">


            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <!-- <h3 class="card-title">Danh sách thông tin khách hàng</h3>  | <a href="#">Thêm khách hàng mới</a> -->

                <!-- <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>-->
              <!-- /.card-header -->
              <h3 style="text-align:center">Thêm Bài Viết</h3>
              <form action="#" method='post'>
                <div class="row">
                  <div class="col-md-4">
                    <td>Tiêu Đề</td>
                    <input type="text" class="form-control" id="cauhoi" placeholder="Nhập Tiêu Đề" name="cauhoi"  required=""></br>
                    
                    <td>Nội dung</td>
                    <input type="text" class="form-control" id="cau1" placeholder="Nhập nội dung" name="cau1"  required="">
                    <span id="cau1" style="color:red;"></span></br>
                    <td>Hình Ảnh</td>
                    <input type="file" class="form-control" id="hinhAnh" placeholder="" name="hinhAnh" required="">
                    <span id="hinhAnh" style="color:red;"></span></br>
             </div>
                  
                  
                </div>
                <button type="submit" id="button" class="btn btn-primary" name="submit" style="margin-left:45%">Thêm bài viết</button>
                <button type="reset" id="button" class="btn btn-primary" name="reset" >Reset</button>
                <!-- <input type="submit" value="Thêm Doanh Nghiệp" style="text-align:center"> -->
              </form>
             
            </div>
            <!-- /.card -->
          </div>
        </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
   
   if(isset($_REQUEST["submit"])){
    $tieuDe = $_REQUEST["cauhoi"];
    $noiDung = $_REQUEST["cau1"];
    $hinhAnh = $_FILES["hinhAnh"]["name"]; // Tên tệp tải lên
    $tmp_name = $_FILES["hinhAnh"]["tmp_name"]; // Tên tệp tạm thời trên máy chủ
    
    // Đường dẫn thư mục lưu trữ hình ảnh (chỉnh sửa theo thư mục của bạn)
    $target_dir = "admin/assets/uploads/images/";
    // Đường dẫn đầy đủ tới hình ảnh trên máy chủ
    $target_file = $target_dir . basename($hinhAnh);

    // Di chuyển tệp tải lên vào thư mục lưu trữ
    move_uploaded_file($tmp_name, $target_file);

    $p = new cloaibaiviet();
    $insert = $p->add_tintuc($tieuDe, $noiDung, $hinhAnh);
    if ($insert == 1){
        echo "<script>alert('Thêm thành công');</script>";
        echo "<script>window.location.href='?qltt'</script>";
    } else {
        echo "<script>alert('Thêm không thành công');</script>";
        echo "<script>window.location.href='?qltt'</script>";
    }
}
      
     
  ?>