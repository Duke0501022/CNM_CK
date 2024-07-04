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
        public function select_tintucwait($wait){
         
            $p=new ketnoi();
            if($p->moketnoi($conn)){
                $string="SELECT * FROM tintuc Where status =$wait  ORDER BY idTinTuc ASC";
                $table=mysqli_query($conn,$string);
                $p->dongketnoi($conn);
                return $table;
            }else {
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
        function AcceptDish($idTinTuc)
        {
            $p = new ketnoi();
           if ($p->moketnoi($conn)){
            $update = '';
            foreach ($idTinTuc as $id) {
                $update .= "UPDATE tintuc SET `status` = 1 WHERE idTinTuc = $id; ";
            }
    
            $kq = mysqli_multi_query($conn, $update);
            $p->dongketnoi($conn);
            return $kq;
        }
    }
    function SelectAllDishWait($wait)
    {
        $p = new  ketnoi();
        $connect = $p->moketnoi($conn);
        $tbl ="SELECT * FROM tintuc Where status =$wait  ORDER BY idTinTuc ASC";
        $table = mysqli_query($connect, $tbl);
        $list_users = array();
        if (mysqli_num_rows($table) > 0) {
            while ($row = mysqli_fetch_assoc($table)) {
                $list_users[] = $row;
            }
            return $list_users;
        }
        $p->dongketnoi($connect);
    }
       
        #Cap nhật chatbot
        public function update_tintuc($idTinTuc,$tieuDe,$noiDung,$hinhAnh){
			
			$p=new ketnoi();
            if($p->moketnoi($conn)){
                // $password=md5('$password');
                $string="update tintuc";
                $string .=" set tieuDe='".$tieuDe."', noiDung='".$noiDung."', hinhAnh ='".$hinhAnh."'";
                $string .= "where idTinTuc='".$idTinTuc."'";
                // echo $string;
                $table = mysqli_query($conn, $string);
                $p->dongketnoi($conn);
                return $table;
            }else {
                return false;
            }
        }
        public function Deletetemporary_tintuc($idTinTuc){
			
			$p=new ketnoi();
            if($p->moketnoi($conn)){
                // $password=md5('$password');
                $string="update tintuc";
                $string .=" set hoatdong = 0 ";
                $string .= "where idTinTuc='".$idTinTuc."'";
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