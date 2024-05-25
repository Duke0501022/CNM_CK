<?php
    include_once("model/connect.php");

    class mloaibaiviet{
        public function count_tt(){
			
			$p = new ketnoi();
			if($p -> moketnoi($conn)){
				$string = "SELECT count(*) FROM tintuc";
				$table = mysqli_query($conn,$string);
				$p -> dongketnoi($conn);
				//
				return $table;
			}else{
				return false;
			}
		}
        public function select_tintuc(){
         
            $p=new ketnoi();
            if($p->moketnoi($conn)){
                $string="SELECT * FROM tintuc";
                $table=mysqli_query($conn,$string);
                $p->dongketnoi($conn);
                return $table;
            }else {
                return false;
            }
        }
        public function select_tintuc_id($idTinTuc){
           
            $p= new ketnoi();
			if($p->moketnoi($conn)){
				$string="SELECT * FROM tintuc
						WHERE idTinTuc ='".$idTinTuc."'";
				// echo $string;
				$table=mysqli_query($conn,$string);
				$p->dongketnoi($conn);
				// var_dump($table);
				return $table;
						
			}else{
				return false;
			}
			
        }
        #Thêm chatbot
        public function add_tintuc($tieuDe,$noiDung,$hinhAnh){
            
            $p=new ketnoi();
            if ($p->moketnoi($conn)){
               
                $string="Insert into tintuc(tieuDe,noiDung,hinhAnh) values";
                $string .="('".$tieuDe."','".$noiDung."','".$hinhAnh."')";
                // echo $string;
                $table=mysqli_query($conn,$string);
                $p->dongketnoi($conn);
                return $table;
            }else{
                return false;
            }
        }
       
        #Cap nhật chatbot
        public function update_tintuc($idTinTuc,$tieuDe,$noiDung,$hinhAnh){
			
			$p=new ketnoi();
            if($p->moketnoi($conn)){
                // $password=md5('$password');
                $string="update tintuc";
                $string .=" set tieuDe='".$tieuDe."', noiDung='".$noiDung."', hinhAnh ='".$hinhAnh."'";
                $string .= "where idChatBot='".$idTinTuc."'";
                // echo $string;
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else {
                return false;
            }
        }

        

        #xoa nhân viên phân phối
        function del_tintuc($idTinTuc){
			
			$p = new ketnoi();
			if($p -> moketnoi($conn)){
				$string = "Delete FROM tintuc where idTinTuc='".$idTinTuc."'";
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
       
    // }
?>