<?php 

	include_once("model/LienHe/mLienHe.php");

	class cLienHe{
		//------------------------------
		//------------------------------
		//------------------------------
		//--------HÀM SELECT MÃ HÓA ĐƠN VỪA TẠO
		//------------------------------
		public function get_lienhe(){
			$p = new mLienHe();
			$lienhe = $p -> select_lienhe();
			return $lienhe;
		}
		public  function count_lh(){
            $p = new mLienHe();
            $table = $p -> count_lh();
            return $table;
        }
		public function update_status($tieude, $status) {
			
			$p = new mLienHe();
			$table = $p->update_status($tieude, $status);
			return  $table;
		}
		// -----------------
		// -----------------
		// -----------------
		// ----thêm phản hồi liên hệ
		// -----------------
		// -----------------
		// -----------------
		public function add_lienhe($tieude,$noidung,$thoiGian,$nguoiGui,$sodienthoai,$email){

			//
			$p = new mLienHe();
			$insert = $p -> insert_lienhe($tieude,$noidung,$thoiGian,$nguoiGui,$sodienthoai,$email);
			//gọi hàm chèn khách hàng từ model
			if($insert){
				return 1; //chèn thành công
			}else{
				return 0; //chèn không thành công
			}
		}
	}

 ?>