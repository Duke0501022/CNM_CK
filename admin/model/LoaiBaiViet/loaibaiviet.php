<?php
    include_once("model/connect.php");

    class mloaibaiviet{
        //--------------THỐNG KÊ
        //
        #THỐNG KÊ SỐ LƯỢNG KHÁCH HÀNG DOANH NGHIỆP
        // public function count_nhanvien(){
        //     $conn;
        //     $p=new ketnoi();
        //     if($p->moketnoi($conn)){
        //         $string="SELECT count(*) FROM nhanvienphanphoi";
        //         $table=mysqli_query($conn,$string);
        //         $p->dongketnoi($conn);
        //         return $table;
        //     }else {
        //         return false;
        //     }
        // }
        
        // ------------------------------------------
        #Hiển thị thông tin nhóm nông sản
        public function select_loaibaiviet(){
          
            $p=new ketnoi();
            if($p->moketnoi($conn)){
                $string="SELECT *FROM loaibaiviet";
                $table=mysqli_query($conn,$string);
                $p->dongketnoi($conn);
                return $table;
            }else {
                return false;
            }
        }
        // #Xem nhóm nông sản theo ID
        // public function select_nhomns_id($MaNhomNongSan){
        //      $conn;
        //      $p=new ketnoi();
        //      if($p->moketnoi($conn)){
        //         $string ="SELECT * FROM nhomnongsan WHERE MaNhomNongSan='".$MaNhomNongSan."'";
        //          $table=mysqli_query($conn,$string);
        //         //   echo $string;
        //          $p->dongketnoi($conn);
        //         //  var_dump ($table);
        //          return $table;
        //      }else {
        //          return false;
        //      }
        // }
        // #thêm nhóm nông sản
        // public function add_nhomns($TenNhomNongSan){
		// 	$conn;
		// 	$p = new ketnoi();
		// 	if($p->moketnoi($conn)){
		// 			$string="insert into nhomnongsan(TenNhomNongSan) values";
        //         	$string .= "('".$TenNhomNongSan."')";
        //         $table=mysqli_query($conn,$string);
        //         echo $string;
        //         $p->dongketnoi($conn);
		// 		var_dump($table);
        //         return $table;
        //     }else{
        //         return false;
        //     }
		// }
        // #cập nhật nhóm nông sản
        // public function update_nhomns($MaNhomNongSan,$TenNhomNongSan){
		// 	$conn;
		// 	$p= new ketnoi();
		// 	if($p->moketnoi($conn)){
		// 			$string ="update nhomnongsan";
		// 			$string .= " set MaNhomNongSan='".$MaNhomNongSan."', TenNhomNongSan='".$TenNhomNongSan."'";
		// 			$string .= " Where MaNhomNongSan='".$MaNhomNongSan."'";
				
		// 		$table =mysqli_query($conn,$string);
        //         echo $string;
		// 		$p->dongketnoi($conn);
        //         var_dump($table);
		// 		return $table;

		// 	}else {
		// 		return false;
		// 	}
		// }
        // #xóa nhóm nông sản
        // function del_nhomns($MaNhomNongSan){
		// 	$conn;
		// 	$p = new ketnoi();
		// 	if($p -> moketnoi($conn)){
		// 		$string = "Delete FROM nhomnongsan where MaNhomNongSan='".$MaNhomNongSan."'";
		// 		//echo $string;
		// 		$table = mysqli_query($conn,$string);
		// 		$p -> dongketnoi($conn);
		// 		//var_dump($table);
		// 		return $table;
		// 	}else{
		// 		return false;
		// 	}
		}
       
    // }
?>