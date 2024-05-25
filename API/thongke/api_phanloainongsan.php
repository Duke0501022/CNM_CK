<?php
    require_once("../database.php");
    $data = array();
    $query = "SELECT TrangThaiKiemDinh, COUNT(TrangThaiKiemDinh) AS size_status FROM nongsan GROUP BY TrangThaiKiemDinh";
    //echo $query;
    $ketqua = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($ketqua)){
        if($row['TrangThaiKiemDinh'] == 3){
            $id = "Chờ kiểm định";
        }elseif($row['TrangThaiKiemDinh'] == 2){
            $id = "Chưa kiểm định";
        }elseif($row['TrangThaiKiemDinh'] == 1){
            $id = "Không đạt chuẩn";
        }elseif($row['TrangThaiKiemDinh'] == 0){
            $id = "Đạt chuẩn";
        }
        $id2 = $row['size_status'];
        $data[] = array('status'=>$id,'size_status'=>$id2);
    }
    
    //echo 1;
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($data);
?>