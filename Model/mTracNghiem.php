<?php
include_once("Model/Connect.php");
class mTracNghiem
{

    public function select_tracnghiem($idUnit)
    {
       
        $p = new clsketnoi();
        if ($p->ketnoiDB($conn)) {
            $string = "SELECT * FROM cauhoi WHERE  idUnit = '$idUnit'";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);

            return $table;
        } else {
            return false;
        }
    }

    function luu_ketqua($noiDungKetQua, $idTaiKhoan, $idUnit, $diemSo, $username)
    {
        $p = new clsketnoi();
        $conn = $p->ketnoiDB($conn);
        $sql = $sql = "SELECT idPhuHuynh FROM phuhuynh WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $idTaiKhoan = $row['idPhuHuynh'];
            $string = "INSERT INTO ketqua (noiDungKetQua, idPhuHuynh, idUnit, diemSo) VALUES ('$noiDungKetQua', $idTaiKhoan, $idUnit, $diemSo)";
            $kq = mysqli_query($conn, $string);
        }
        if (!$kq) {
            throw new mysqli_sql_exception(mysqli_error($conn));
        }
        $p->dongketnoi($conn);
        return $kq;
    }


    public function getTestUnits()
    {
        $p = new clsketnoi();
        $conn = $p->ketnoiDB($conn);
        $string = "SELECT * FROM unit";
        $result = mysqli_query($conn, $string);
        $p->dongketnoi($conn);
        return $result;
    }
}
