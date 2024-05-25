<?php 
include_once("Model/mInfo.php");
class cInfo{
    public function select_info($username){
        $info = new mInfo();
        $res = $info->select_info($username);
        return $res;
    }

    public function update_info($username, $hoTen, $gioiTinh, $soDienThoai, $hinhAnh, $email){
        $info = new mInfo();
        $res = $info->update_info($username, $hoTen, $gioiTinh, $soDienThoai, $hinhAnh, $email);
        return $res;
    }

    public function update_info2($username, $hoTen, $gioiTinh, $soDienThoai, $email){
        $info = new mInfo();
        $res = $info->update_info2($username, $hoTen, $gioiTinh, $soDienThoai, $email);
        return $res;
    }

    
}

?>