<?php
  include_once("controller/CauHoi/cCauHoi.php");
  
  $p =new cCauHoi();
  $list_loai  = $p->select_unit();
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
              <form action="#" method='post'>
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