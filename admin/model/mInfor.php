<?php
include_once("model/connect.php");

class mInfo
{
    public function select_info($username, $role){
         
        $p=new ketnoi();
        if($p->moketnoi($conn)){
            $string = "";
        if ($role == "3") {
            $string = "SELECT * FROM chuyenvien WHERE username = '$username'";
        } elseif ($role == "4") {
            $string = "SELECT * FROM quantrivien WHERE username = '$username'";
        } elseif ($role == "1") {
            $string = "SELECT * FROM admin WHERE username = '$username'";
        }
            $table=mysqli_query($conn,$string);
            $p->dongketnoi($conn);
            return $table;
        }else {
            return false;
        }
    }
   


    public function update_info($username, $hoTen, $gioiTinh, $soDienThoai, $hinhAnh, $email)
    {
        
        $p = new clsketnoi();
        if ($p->ketnoiDB($conn)) {
            $string = "UPDATE phuhuynh SET hoTen = '$hoTen', gioiTinh = '$gioiTinh', soDienThoai = '$soDienThoai', hinhAnh = '$hinhAnh', email = '$email' WHERE username = '$username' ";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        } else {
            return false;
        }
    }
  
    
}
