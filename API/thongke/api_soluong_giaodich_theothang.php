<?php 

	require_once("../database.php");
    $data = array();
    $query = "SELECT MONTH(NgayLap) AS Thang,COUNT(*) AS SLHoaDon FROM hoadon GROUP BY MONTH(NgayLap)";
    //echo $query;
    $ketqua = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($ketqua)){
        $id1 = "Tháng ".$row['Thang'];
        $id2 = $row['SLHoaDon'];
        $data[] = array('Thang'=>$id1,'SLHoaDon'=>$id2);
    }
    
    //echo 1;
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($data);

 ?>