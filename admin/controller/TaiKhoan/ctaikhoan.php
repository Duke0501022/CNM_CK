<?php
    include_once ("model/TaiKhoan/mtaikhoan.php");
  
    class ctaikhoan{
        #Hiển thị thông tin tài khoản
        public function select_taikhoan(){
            $p=new mtaikhoan;
            $table=$p->select_taikhoan();
            return $table;
        }
        public function select_taikhoan_role($Role){
            $p=new mtaikhoan;
            $table=$p->select_taikhoan_role($Role);
            return $table;
        }
        #THÊM TÀI KHOẢN
        public function add_taikhoan($Role, $username,$password){
            $p=new mtaikhoan;
            $insert=$p->addtaikhoan($Role,$username,$password);
            var_dump($insert);
            if($insert){
                return 1;
            }else {
                return 0; //không thể insert
            }
        }
        #XEM TÀI KHOẢN THEO USERNAME
        public function select_taikhoan_byusername($username,$Role){
            $p=new mtaikhoan;
            $table=$p->select_taikhoan_username($username,$Role);
            return $table;
        }
        #XEM TÀI KHOẢN THEO USERNAME DOANH NGHIỆP
        public function select_taikhoan_byusernamedoanhnghiep(){
            $p=new mtaikhoan;
            $table=$p->select_taikhoan_usernamedoanhnghiep();
            return $table;
        }
        #UPDATE TÀI KHOẢN 
        // 
        // 
        // 
        public function update_taikhoan($username, $usernamecu,$password){
            $p=new mtaikhoan;
            $update=$p->updatetaikhoan($username,$usernamecu,$password);
            // var_dump ($update);
            if($update){
                return 1; //update thành công
            }else {
                return 0; //update thất bại
            }
        }
        // 
        //
         #UPDATE MẬT KHẨU CHO TÀI KHOẢN TRÊN BẢNG TÀI KHOẢN
        
        public function update_matkhau_username($username,$password){
            $p=new mtaikhoan;
            $update=$p->update_matkhau($username,$password);
            // var_dump ($update);
            if($update){
                return 1; //update thành công
            }else {
                return 0; //update thất bại
            }
        }


        // 
        // 
        #kiểm tra trùng tài khoản
        public function check_taikhoan($username){
            $p= new mtaikhoan();
            $table = $p -> check_taikhoan($username);
            return $table;
        }
        #kiểm tra trùng tài khoản trong bảng khách hàng
        public function check_user_khachhang($username){
            $p= new mtaikhoan();
            $table = $p -> check_user_khachhang($username);
            return $table;
        }
        public function check_user_chuyenvien($username){
            $p= new mtaikhoan();
            $table = $p -> check_user_chuyenvien($username);
            return $table;
        }
        // 
        // 
        // 
        // 
        // 
        #DELETE TAI KHOAN
        public function delete_taikhoan($username){
            $p=new mtaikhoan();
            $delete=$p->deletetaikhoan($username);
            var_dump ($delete);
            return $delete;
        }
       

        //hàm lấy thông tin chi tiết tài khoản
        public function get_tt_dangnhap($username, $Role)
    	{
        	$p = new mTaiKhoan();
        	$tt = $p -> select_tt_taikhoan($username,$Role);
            return $tt;
			}
        	
    	
        ////
        public function login($username, $password)
        {
            $password = md5($password);
            $p = new mtaiKhoan();
            $user = $p -> login($username, $password);
            $row = mysqli_fetch_assoc($user);
            if ($row >= 1) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['password'] = $row['password'];
                $_SESSION['Role'] = $row['Role'];
                $_SESSION['login_admin'] = true;
                
                $tt_dn = $this -> get_tt_dangnhap($username,$row['Role']);
                echo "<script>alert('Đăng nhập thành công')</script>";
              
            }else {
                echo "<script>alert('Đăng nhập thất bại')</script>";
            }
        }
        //

    }
?>