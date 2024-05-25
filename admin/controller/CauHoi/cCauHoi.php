<?php 

	include_once("model/CauHoi/mCauHoi.php");

	class cCauHoi{
        //--------------THỐNG KÊ
        //
        #THỐNG KÊ SỐ LƯỢNG CAU HOI
        public function count_cauhoi(){
            $p = new mCauHoi();
            $table = $p -> count_cauhoi();
            return $table;
        }
        //
        //------------------------------------------
        #xem câu hỏi
		public function select_cauhoi(){
			$p = new mCauHoi();
			$table = $p -> select_cauhoi();
			return $table;
		}#Hiển thị  câu hỏi theo id
        public function select_cauhoi_id($idcauHoi){
            $p= new mCauHoi();
            $table = $p->select_cauhoi_id($idcauHoi);
            //  var_dump($table);
            return $table;
        }
        public function select_unit(){
			$p = new mCauHoi();
			$table = $p -> select_unit();
			return $table;
		}
        
      
        #update câu hỏi
        // 
        // CẬP NHẬT KHÁCH HÀNG KHÔNG USERNAME
        // 
		public function update_cauhoi($idcauHoi,$cauHoi,$cau1,$cau2,$cau3,$idUnit){
            $p = new mCauHoi();
            $update = $p -> update_cauhoi($idcauHoi,$cauHoi,$cau1,$cau2,$cau3,$idUnit);
            // var_dump($update);
            if($update){
                return 1; //cập nhật thành công
            }else{
                return 0; //cập nhật không thành công
            }
        }
        
        #thêm câu hỏi
        public function add_cauhoi($cauHoi,$cau1,$cau2,$cau3,$idUnit){
            $p = new mCauHoi();
            $insert = $p->add_cauhoi($cauHoi,$cau1,$cau2,$cau3,$idUnit);
            // var_dump($insert);
            if($insert){
                return 1;// thêm thành công
            }else {
                return 0;//thêm không thành công
            }
           
        }
       
        #xóa khách hàng doanh nghiệp
        function del_cauhoi($idcauHoi){
			$p = new mCauHoi();
			$table  = $p -> del_cauhoi($idcauHoi);
// 			var_dump($table);
			// return $table;
            if($table){
                return 1; //Xóa thành công
            }else {
                return 0;// Xóa không thành công
            }
		}
	}

 ?>