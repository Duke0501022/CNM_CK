<?php
    include_once("model/connect.php");

    class mNVPP{
        //--------------THỐNG KÊ
        //
        #THỐNG KÊ SỐ LƯỢNG KHÁCH HÀNG DOANH NGHIỆP
        public function count_nhanvien(){
          
            $p=new ketnoi();
            if($p->moketnoi($conn)){
                $string="SELECT count(*) FROM chuyenvien";
                $table=mysqli_query($conn,$string);
                $p->dongketnoi($conn);
                return $table;
            }else {
                return false;
            }
        }
        //
        //------------------------------------------
        #Hiển thị thông tin nhà cung cấp
        public function select_nhanvien(){
         
            $p=new ketnoi();
            if($p->moketnoi($conn)){
                $string="SELECT *FROM chuyenvien";
                $table=mysqli_query($conn,$string);
                $p->dongketnoi($conn);
                return $table;
            }else {
                return false;
            }
        }
        #Xem nhà cung cấp theo ID
        public function select_NVPP_id($idChuyenVien){
           
            $p= new ketnoi();
			if($p->moketnoi($conn)){
				$string="SELECT * FROM chuyenvien
						WHERE idChuyenVien ='".$idChuyenVien."'";
				// echo $string;
				$table=mysqli_query($conn,$string);
				$p->dongketnoi($conn);
				// var_dump($table);
				return $table;
						
			}else{
				return false;
			}
			
        }
        #Thêm nhân viên phân phối
        public function add_NVPP($hoTen, $soDienThoai, $email, $hinhAnh,$moTa,$gioiTinh,$ngaySinh,$username){
            
            $p = new ketnoi();
            if($p->moketnoi($conn)){
                $string = "INSERT INTO chuyenvien (hoTen, soDienThoai, email, hinhAnh, moTa, gioiTinh, ngaySinh, username) VALUES ";
$string .= "('" . $hoTen . "','" . $soDienThoai . "','" . $email . "','" . $hinhAnh . "','" . $moTa . "','" . $gioiTinh . "','" . $ngaySinh . "','" . $username . "')";
                $table=mysqli_query($conn,$string);
                // echo $string;
                $p->dongketnoi($conn);
                // var_dump ($table);
                return $table;
            }else {
                return false;
            }
        }
        #kiem tra user
        // public function checkuser($username){
		// 	$conn;
		// 	$p= new ketnoi();
		// 	if($p->moketnoi($conn)){
		// 		$string="SELECT * FROM nhanvienphanphoi WHERE username IN (SELECT username FROM taikhoan) && username = '".$username."'";
		// 		echo $string;
		// 		$table= mysqli_query($conn,$string);
		// 		$p->dongketnoi($conn);
		// 		var_dump($table);
		// 		return $table;
		// 	}else {
		// 		return false;
		// 	}
		// }
        #Cap nhap nhan vien phan phoi
        public function update_NVPP($idChuyenVien, $hoTen, $soDienThoai, $email, $hinhAnh,$moTa,$gioiTinh,$ngaySinh){
			
			$p= new ketnoi();
			if($p->moketnoi($conn)){
				// if($username !=""){
					$string ="update chuyenvien";
					$string .= " set hoTen='".$hoTen."', soDienThoai='".$soDienThoai."', email='".$email."', hinhAnh='".$hinhAnh."', moTa='".$moTa."', gioiTinh='".$gioiTinh."', ngaySinh='".$ngaySinh."'";
					$string .= " Where idChuyenVien='".$idChuyenVien."'";
				// }else {
					// $string ="update nhanvienphanphoi";
					// $string .= " set MaNVPP='".$MaNVPP."', TenNVPP='".$TenNVPP."', SDT='".$SDT."', DiaChiNha='".$DiaChiNha."', NgaySinh='".$NgaySinh."', Email='".$Email."', GioiTinh='".$GioiTinh."',MaXa='".$MaXa."',MaTrungTamPP='".$MaTrungTamPP."'";
					// $string .= " Where MaNVPP='".$MaNVPP."'";
				// }
				
				// echo $string;
				$table =mysqli_query($conn,$string);
				$p->dongketnoi($conn);
				return $table;

			}else {
				return false;
			}
		}

        #xoa nhân viên phân phối
        function del_NVPP($idChuyenVien){
			
			$p = new ketnoi();
			if($p -> moketnoi($conn)){
				$string = "Delete FROM chuyenvien where idChuyenVien='".$idChuyenVien."'";
				//echo $string;
				$table = mysqli_query($conn,$string);
				$p -> dongketnoi($conn);
				//var_dump($table);
				return $table;
			}else{
				return false;
			}
		}
    }
?>