<?php
include_once("Model/Connect.php");

class mInfo
{

    public function select_info($username)
    {

        $p = new clsketnoi();
        if ($p->ketnoiDB($conn)) {
            $string = "SELECT * FROM phuhuynh where username = '$username'";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        } else {
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

    // Viết hàm sửa thông tin gồm họ tên, giới tính, số điện thoại, hình ảnh (có upload hình ảnh lên), email
    public function update_info2($username, $hoTen, $gioiTinh, $soDienThoai, $email)
    {
        
        $p = new clsketnoi();
        if ($p->ketnoiDB($conn)) {
            $string = "UPDATE phuhuynh SET hoTen = '$hoTen', gioiTinh = '$gioiTinh', soDienThoai = '$soDienThoai', email = '$email' WHERE username = '$username' ";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        } else {
            return false;
        }
    }

    
}
