
<?php
include_once("Model/Connect.php");

class mViewLichSu
{
    public function view_schedule_su($username)
    {
      
         $p = new clsketnoi();
         if ($p->ketnoiDB($conn)) {
            $sql = "SELECT idPhuHuynh FROM phuhuynh WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $idPhuHuynh = $row['idPhuHuynh'];
                $string = "SELECT * FROM unit u 
                            JOIN cauhoi c ON u.idUnit = c.idUnit 
                            JOIN ketqua k ON c.idUnit = k.idUnit 
                            JOIN phuhuynh p ON k.idPhuHuynh = p.idPhuHuynh 
                            JOIN taikhoan1 t ON p.username = t.username 
                            WHERE p.idPhuHuynh = $idPhuHuynh";
            } else {
                $string = "SELECT * FROM unit u 
                            JOIN cauhoi c ON u.idUnit = c.idUnit 
                            JOIN ketqua k ON c.idUnit = k.idUnit 
                            JOIN phuhuynh p ON k.idPhuHuynh = p.idPhuHuynh 
                            JOIN taikhoan1 t ON p.username = t.username";
            }        
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            //
            return $table;
        } else {
            return false;
        }
    }
}
?>
