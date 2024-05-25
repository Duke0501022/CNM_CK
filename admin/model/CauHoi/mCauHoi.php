<?php 

	include_once("model/connect.php");

	class mCauHoi{
		//--------------THỐNG KÊ
		//
		#THỐNG KÊ SỐ LƯỢNG KHÁCH HÀNG DOANH NGHIỆP
		public function count_cauhoi(){
			
			$p = new ketnoi();
			if($p -> moketnoi($conn)){
				$string = "SELECT count(*) FROM cauhoi";
				$table = mysqli_query($conn,$string);
				$p -> dongketnoi($conn);
				//
				return $table;
			}else{
				return false;
			}
		}
		//
		//------------------------------------------
		#xem doanh nghiệp
		public function select_cauhoi(){
			
			$p = new ketnoi();
			if($p -> moketnoi($conn)){
				$string = "SELECT * FROM cauhoi INNER JOIN unit on cauhoi.idUnit = unit.idUnit order by idCauHoi asc";
				$table = mysqli_query($conn,$string);
				$p -> dongketnoi($conn);
				//
				return $table;
			}else{
				return false;
			}
		}
        public function select_unit(){
			
			$p = new ketnoi();
			if($p -> moketnoi($conn)){
				$string = "SELECT * FROM `unit`";
				$table = mysqli_query($conn,$string);
				$p -> dongketnoi($conn);
				return $table;
			}else{
				return false;
			}
		}
		
		#THÊM CÂU HỎI 
		public function add_cauhoi($cauHoi,$cau1,$cau2,$cau3,$idUnit){
			
			$p = new ketnoi();
			if($p->moketnoi($conn)){
				
					$string="insert into cauhoi(cauHoi,cau1,cau2,cau3,idUnit) values";
                	$string .= "('".$cauHoi."','".$cau1."','".$cau2."','".$cau3."','".$idUnit."')";

                $table=mysqli_query($conn,$string);
                // echo $string;
                $p->dongketnoi($conn);
				// var_dump($table);
                return $table;
            }else{
                return false;
            }
		}
        
		
		#Hiển thị câu hỏi theo ID
		public function select_cauhoi_id($idcauHoi){
			
			$p= new ketnoi();
			if($p->moketnoi($conn)){
				$string="SELECT * FROM cauhoi
						WHERE idcauHoi ='".$idcauHoi."'";
				// echo $string;
				$table=mysqli_query($conn,$string);
				$p->dongketnoi($conn);
				// var_dump($table);
				return $table;
						
			}else{
				return false;
			}
			
		}
		#UPDATE CÂU HỎI
		public function update_cauhoi($idcauHoi,$cauHoi,$cau1,$cau2,$cau3,$idUnit){
			
			$p= new ketnoi();
			if($p->moketnoi($conn)){
				// if($username !=""){
					$string ="update cauhoi";
					$string .= " set  cauHoi='".$cauHoi."', cau1='".$cau1."', cau2='".$cau2."', cau3='".$cau3."', idUnit='".$idUnit."'";
					$string .= " Where idcauHoi='".$idcauHoi."'";
				$table =mysqli_query($conn,$string);
				$p->dongketnoi($conn);
				// var_dump($table);
				return $table;

			}else {
				return false;
			}
		}
		
		#XÓA CAU HỎI
		function del_cauhoi($idcauHoi){
			
			$p = new ketnoi();
			if($p -> moketnoi($conn)){
				$string = "Delete FROM cauhoi where idcauHoi='".$idcauHoi."'";
				// echo $string;
				$table = mysqli_query($conn,$string);
				$p -> dongketnoi($conn);
				// var_dump($table);
				return $table;
			}else{
				return false;
			}
		}
	}	
?>