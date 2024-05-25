<?php
    include_once("model/NhanVienPhanPhoi/mnvphanphoi.php");

    class cNVPP{
    	//--------------THỐNG KÊ
		//
		#THỐNG KÊ SỐ LƯỢNG nhân viên phân phối
		public function count_nhanvien(){
            $p = new mNVPP();
            $table = $p->count_nhanvien();
            return $table;
        }
		//
		//------------------------------------------
        #Hien thi thong tin thanh vien
        public function select_NVPP(){
            $p = new mNVPP();
            $table = $p->select_nhanvien();
            return $table;
        }
        #Hien thi thong tin thanh vien theo MaKHTV
         public function select_nhanvien_byid($idChuyenVien){
            $p=new mNVPP();
            $table=$p->select_NVPP_id($idChuyenVien);
            return $table;
         }
        #thêm nhân viên phân phối
        public function add_NVPP($hoTen, $soDienThoai, $email, $hinhAnh,$moTa,$gioiTinh,$ngaySinh,$username){
            $p = new mNVPP();
            $insert = $p->add_NVPP($hoTen, $soDienThoai, $email, $hinhAnh,$moTa,$gioiTinh,$ngaySinh,$username);
            // var_dump($insert);
            if($insert){
                return 1;// thêm thành công
            }else {
                return 0;//thêm không thành công
            }
           
           
        }
		// #kiem tra user
		// public function check_user($username){
        //     $p= new mNVPP();
        //     $table = $p -> checkuser($username);
		// 	return $table;
		// }


		#Cap nhap thong tin nhan vien
		public function update_NVPP($idChuyenVien, $hoTen, $soDienThoai, $email, $hinhAnh,$moTa,$gioiTinh,$ngaySinh){
			$p=new mNVPP();
			$update=$p->update_NVPP($idChuyenVien, $hoTen, $soDienThoai, $email, $hinhAnh,$moTa,$gioiTinh,$ngaySinh);
			//var_dump($update);
			if($update){
				return 1;// update thành công
			}else{
				return 0;// update không thành công
			}
				
		}

        #THÊM USERNAME CHO NHÂN VIÊN PHÂN PHỐI CHƯA CÓ TÀI KHOẢN TRÊN BẢNG NHÂN VIÊN PHÂN PHỐI
      




        #xoa nhan vien
        function del_NVPP($idChuyenVien){
			$p = new mNVPP();
			$table  = $p -> del_NVPP($idChuyenVien);
			//var_dump($table);
			return $table;
		}
    }
?>