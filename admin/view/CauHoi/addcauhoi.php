<?php
  include_once("controller/CauHoi/cCauHoi.php");
  
  $p =new cCauHoi();
  $list_loai  = $p->select_unit();
 ?>
 
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý Câu Hỏi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
              <li class="breadcrumb-item active">Quản lý câu hỏi</li>
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
              <h3 style="text-align:center">Thêm Câu Hỏi</h3>
              <form action="#" method='post' onsubmit="return validateForm()">
                <div class="row">
                  <div class="col-md-4">
                    <td>Câu Hỏi </td>
                    <input type="text" class="form-control" id="cauhoi" placeholder="Nhập Câu Hỏi" name="cauhoi"  required=""></br>
                    
                    <td>Câu 1</td>
                    <input type="text" class="form-control" id="cau1" placeholder="Nhập Câu 1" name="cau1"  required="">
                    <span id="cau1" style="color:red;"></span></br>
                    <td>Câu 2</td>
                    <input type="text" class="form-control" id="cau2" placeholder="Nhập Câu 2" name="cau2" required="">
                    <span id="cau2" style="color:red;"></span></br></br>
                    <td>Câu 3</td>
                    <input type="text" class="form-control" id="cau3" placeholder="Nhập Câu 3" name="cau3" required="">
                    <span id="cau3" style="color:red;"></span></br></br>
                    <tr>
                    <th>Unit</th>
                    <th>

                        <select name="unit" id="option" class="insert">
                            <option value="0">chọn unit...</option>

                            <?php foreach ($list_loai  as $title_item) { ?>
                                <option value="<?php echo $title_item['idUnit'] ?>"><?php echo $title_item['tenUnit'] ?></option>
                            <?php  } ?>
                        </select>

                        <p class="text-danger"><?php if (!empty($error['empty']['unit']))   echo  $error['empty']['unit'];   ?></p>

                    </th>
                </tr>

                    
                  </div>
                  
                  
                </div>
                <button type="submit" id="button" class="btn btn-primary" name="submit" style="margin-left:45%">Thêm câu hỏi</button>
                <button type="reset" class="btn btn-secondary" name="reset">Hủy</button>
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
      $cauHoi=$_REQUEST["cauhoi"];
      $cau1=$_REQUEST["cau1"];
      $cau2=$_REQUEST["cau2"];
      $cau3=$_REQUEST["cau3"];
      $idUnit=$_REQUEST["unit"];

      $p= new cCauHoi();
        $insert=$p->add_cauhoi($cauHoi,$cau1,$cau2,$cau3,$idUnit);
        if ($insert ==1){
            echo "<script>alert('Thêm thành công');</script>";
            echo "<script>window.location.href='?qlbt'</script>";
          }else {
            echo "<script>alert('Thêm không thành công');</script>";
            echo "<script>window.location.href='?qlbt'</script>";
        }
      }

    
      
     
  ?>
  <script>
    function validateForm() {
    var cauHoi = document.getElementById("cauhoi").value;
    var cau1 = document.getElementById("cau1").value;
    var cau2 = document.getElementById("cau2").value;
    var cau3 = document.getElementById("cau3").value;
    var unit = document.getElementById("option").value;

    // Kiểm tra xem các trường có rỗng không
    if (cauHoi.trim() === '' || cau1.trim() === '' || cau2.trim() === '' || cau3.trim() === '' || unit === '0') {
        alert("Vui lòng điền đầy đủ thông tin câu hỏi và chọn unit");
        return false;
    }

    // Kiểm tra độ dài của câu hỏi
    if (cauHoi.length < 5 || cauHoi.length > 255) {
        alert("Câu hỏi phải có từ 5 đến 255 ký tự");
        return false;
    }

    // Kiểm tra độ dài của các câu trả lời
    if (cau1.length < 1 || cau1.length > 255 || cau2.length < 1 || cau2.length > 255 || cau3.length < 1 || cau3.length > 255) {
        alert("Mỗi câu trả lời phải có từ 1 đến 255 ký tự");
        return false;
    }

    return true;
}
  </script>