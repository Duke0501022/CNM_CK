<?php
    // include_once("../../controller/NhaCungCap/cNCC.php");
    // include_once("../../controller/NhanVienPhanPhoi/cnvphanphoi.php");
    // include_once("../../controller/KhachHangDoanhNghiep/cdoanhnghiep.php");
    // include_once("../../controller/KhachHangThanhVien/cthanhvien.php");
    require_once("../database.php");
    $data = array();
    $query1 = "SELECT count(*) FROM khachhang";
    $query2 = "SELECT count(*) FROM nhanvienphanphoi";
    $query3 = "SELECT count(*) FROM nhanvienkiemdinh";
    $query4 = "SELECT count(*) FROM nhacungcapnongsan";
    //echo $query;
    $ketqua1 = mysqli_query($conn,$query1);
    while($row = mysqli_fetch_array($ketqua1)){
        $id = $row['count(*)'];
        $data[] = array('status'=>'Doanh nghiệp','size_status'=>$id);
    }
    $ketqua2 = mysqli_query($conn,$query2);
    while($row = mysqli_fetch_array($ketqua2)){
        $id = $row['count(*)'];
        $data[] = array('status'=>'Nhân viên phân phối','size_status'=>$id);
    }
    $ketqua3 = mysqli_query($conn,$query3);
    while($row = mysqli_fetch_array($ketqua3)){
        $id = $row['count(*)'];
        $data[] = array('status'=>'Nhân viên kiểm định','size_status'=>$id);
    }
    $ketqua4 = mysqli_query($conn,$query4);
    while($row = mysqli_fetch_array($ketqua4)){
        $id = $row['count(*)'];
        $data[] = array('status'=>'Nhà cung cấp','size_status'=>$id);
    }
    
    //echo 1;
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($data);
?>