<?php
include_once("model/connect.php");

class mLichSu
{
    public function select_ketqua(){
         
        $p=new ketnoi();
        if($p->moketnoi($conn)){
            $string = "SELECT * , phuhuynh.hoTen ,phuhuynh.hinhAnh, phuhuynh.email,unit.tenUnit
                   FROM ketqua
                   JOIN phuhuynh ON ketqua.idPhuHuynh = phuhuynh.idPhuHuynh
                   JOIN unit ON ketqua.idUnit = unit.idUnit
                   ";
            $table=mysqli_query($conn,$string);
            $p->dongketnoi($conn);
            return $table;
        }else {
            return false;
        }
    }
    public function select_ketqua_idPhuHuynh($idPhuHuynh){
            
        $p= new ketnoi();
        if($p->moketnoi($conn)){
            $string = "SELECT * FROM ketqua WHERE idPhuHuynh = '$idPhuHuynh'";
            // echo $string;
            $table= mysqli_query($conn,$string);
            $p->dongketnoi($conn);
            // var_dump($table);
            return $table;
        }else {
            return false;
        }
    }
   


    
  
    
}
