<?php 

	include_once("model/LoaiBaiViet/mTinTuc.php");

	class cloaibaiviet{
        
        //--------------THỐNG KÊ
        //
        #THỐNG KÊ SỐ LƯỢNG KHÁCH HÀNG DOANH NGHIỆP
        public function select_tintuc(){
            $p = new mloaibaiviet();
            $table = $p -> select_tintuc();
            return $table;
        }
        public function count_tt(){
            $p = new mloaibaiviet();
            $table = $p -> count_tt();
            return $table;
        }
        //
        //------------------------------------------
        #xem doanh nghiệp
        public function  select_tintuc_id($idTinTuc){
            $p= new  mloaibaiviet();
            $table = $p-> select_tintuc_id($idTinTuc);
            //  var_dump($table);
            return $table;
        }
        
        #Hiển thị  doanh nghiệp id
      
        #update doanh nghiệp
        // 
        // CẬP NHẬT KHÁCH HÀNG KHÔNG USERNAME
        // 
		public function update_tintuc($idTinTuc, $tieuDe, $noiDung, $hinhAnh, $tmpimg = '', $typeimg = '', $sizeimg = '') {
            $upload_success = false;
            if ($typeimg != '') {
                $type_array = explode('/', $typeimg);
                $image_type = $type_array[0];
                if ($image_type == "image" && $sizeimg <= 10 * 1024 * 1024) {
                    if (move_uploaded_file($tmpimg, "admin/assets/uploads/images/" . $hinhAnh)) {
                        $upload_success = true;
                    } else {
                        return -1; // Lỗi tải lên hình ảnh
                    }
                } else {
                    return -2; // Không đúng định dạng hoặc kích thước quá lớn
                }
            } else {
                $upload_success = true; // Không có hình ảnh để cập nhật
            }
            
            if ($upload_success) {
                $p = new ketnoi();
                if ($p->moketnoi($conn)) {
                    $string = "UPDATE tintuc SET tieuDe='$tieuDe', noiDung='$noiDung', hinhAnh='$hinhAnh' WHERE idTinTuc='$idTinTuc'";
                    $table = mysqli_query($conn, $string);
                    $p->dongketnoi($conn);
                    return $table ? 1 : 0; // Trả về 1 nếu thành công, 0 nếu thất bại
                } else {
                    return false; // Lỗi kết nối cơ sở dữ liệu
                }
            }
        }
    
        #update doanh nghiệp có username
       
        #update tài khoản
       
        #thêm doanh nghiệp
        public function add_tintuc($tieuDe,$noiDung,$hinhAnh){
            $p = new  mloaibaiviet();
            $insert = $p->add_tintuc($tieuDe,$noiDung,$hinhAnh);
            // var_dump($insert);
            if($insert){
                return 1;// thêm thành công
            }else {
                return 0;//thêm không thành công
            }
           
        }
        #THÊM USERNAME CHO DOANH NGHIỆP CHƯA CÓ TÀI KHOẢN TRÊN BẢNG KHÁCH HÀNG
       





        // #kiem tra user có trong bảng tài khoản
        // public function check_user($username){
        //     $p= new mKhachHangDoanhNghiep();
        //     $table = $p -> checkuser($username);
		// 	return $table;
		// }
       
        #xóa khách hàng doanh nghiệp
        function del_tintuc($idTinTuc) {
            $p = new  mloaibaiviet();
            $table = $p->del_tintuc($idTinTuc);
            if ($table) {
                return 1; // Xóa thành công
            } else {
                return 0; // Xóa không thành công
            }
        }
	}

 ?>