<?php
    require_once("../database.php");
    $data = array();
    $query = "SELECT nongsan.MaLoaiNongSan, TenLoaiNongSan, COUNT(MaNongSan) AS SoLuong FROM nongsan JOIN loainongsan ON nongsan.MaLoaiNongSan = loainongsan.MaLoaiNongSan GROUP BY nongsan.MaLoaiNongSan";
    //echo $query;
    $ketqua = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($ketqua)){
        $id = $row['TenLoaiNongSan'];
        $id2 = $row['SoLuong'];
        $data[] = array('maloai'=>$id,'soluong'=>$id2);
    }
    
    //echo 1;
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($data);
?>