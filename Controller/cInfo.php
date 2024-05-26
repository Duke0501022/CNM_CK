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

 
    public function update_info2($username, $hoTen, $gioiTinh, $soDienThoai, $hinhAnh,$email,$tmpimg = '', $typeimg = '', $sizeimg = ''){
        $upload_success = false;
        if ($typeimg != '') {
            $type_array = explode('/',   $typeimg);
            $image_type = $type_array[0];
            if ($image_type == "image" && $sizeimg <= 10 * 1024 * 1024) {
                if (move_uploaded_file($tmpimg, "admin/admin/assets/uploads/images/" . $hinhAnh)) {
                    $upload_success = true;
                } else {
                    return -1;
                }
            } else {
                return -2;
            }
        }
        $p = new mInfo();
        $update = $p -> update_info2($username, $hoTen, $gioiTinh, $soDienThoai, $email,$hinhAnh);
        // var_dump($update);
        if($update){
            return 1; //cập nhật thành công
        }else{
            return 0; //cập nhật không thành công
        }
    }

    
}

?>