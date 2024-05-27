 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Quản lý Thông Tin Tài Khoản</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
              <li class="breadcrumb-item active">Quản lý thông tin tài khoản</li>
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
              <h3 style="text-align:center">Thêm Tài Khoản</h3>
              <form action="#" method="post" onsubmit="return validateForm()">
                <div class="row">
                  <div class="col">
                    <td>Mã vai trò</td>
                    <!-- <input type="text" class="form-control" id="mavaitro" placeholder="Enter Số điện thoại" name="mavaitro"></br> -->
                    <select name="role" id="role" placeholder="chọn mã vai trò" class="form-control">
                        <option value="2">Phụ Huynh</option>;
                        <option value="3">Chuyên Viên</option>;
                        <option value="4">Quản trị viên</option>;
                        
                    </select>
                    <td>Username</td>
                    <input type="text" class="form-control" id="username" placeholder="Enter username" name="username"></br>
                    <td>Password</td>
                     <input type="text" class="form-control" id="password" placeholder="Enter password" name="password"></br>
                 
                  </div>

                   
                    <!--  -->
                 
                </div>
</br>
                <button type="submit" class="btn btn-primary" name="btnsubmit" style="margin-left:45%">Submit</button>
                <button type="reset" class="btn btn-primary"  >Reset</button>
                <!-- <input type="submit" value="Thêm Doanh Nghiệp" style="text-align:center"> -->
              </form>
              
              
              <!-- /.card-body -->
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
    include ("controller/TaiKhoan/ctaikhoan.php");
    if(isset($_REQUEST["btnsubmit"])){
        $Role=$_REQUEST['role'];
        // echo $Mavaitro;
        $username=$_REQUEST['username'];
        $password=$_REQUEST['password'];
        $p=new ctaikhoan();
        if ($p->check_taikhoan($username)) {
          echo "<script>alert('Tài khoản đã tồn tại')</script>";
      } else {
       
        $table=$p->add_taikhoan($username,$password,$Role);
        if ($table==1) {
            echo "<script>alert('Thêm tài khoản thành công')</script>";
        }else {
            echo "<script>alert('Thêm tài khoản không thành công')</script>";
        }
      }
        
    }else {
        echo 123;
    }
  ?>
  <script>
   function validateForm() {
    var role = document.getElementById("role").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    
    // Kiểm tra xem các trường có rỗng không
    if (role == "" || username == "" || password == "") {
        alert("Vui lòng điền đầy đủ thông tin");
        return false;
    }
    
    // Kiểm tra độ dài tối thiểu/maksimum của username và password
    if (username.length < 6 || username.length > 20) {
        alert("Username phải từ 6 đến 20 ký tự");
        return false;
    }
    
    if (password.length < 8 || password.length > 20) {
        alert("Password phải từ 8 đến 20 ký tự");
        return false;
    }
    
    // Kiểm tra định dạng hợp lệ của password
    var passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    if (!passwordPattern.test(password)) {
        alert("Password phải chứa ít nhất một chữ số, một chữ cái viết thường, một chữ cái viết hoa ");
        return false;
    }
    
    // Kiểm tra mã vai trò hợp lệ
    if (role != "2" && role != "3" && role != "4") {
        alert("Vui lòng chọn một mã vai trò hợp lệ");
        return false;
    }
    
    // Nếu tất cả điều kiện đều đúng, trả về true để submit form
    return true;
}

  </script>
