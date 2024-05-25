<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kinderdb";
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    mysqli_set_charset($conn,'utf8');
    if(!$conn){
        die("Connect database failed");
    }
    //THỐNG KÊ SỐ LƯỢNG TỪNG LOẠI NGƯỜI DÙNG
    //THỐNG KÊ SỐ LƯỢNG NÔNG SẢN ĐẠT CHUẨN, KHÔNG ĐẠT CHUẨN
    //THỐNG KÊ NHỮNG NÔNG SẢN THUỘC TỪNG TỈNH
?>