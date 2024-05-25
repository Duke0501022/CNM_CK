<?php
include_once("Model/mTracNghiem.php");
class cTracNghiem
{
    public function select_tracnghiem($idUnit)
    {
        $p = new mTracNghiem();
        $table = $p->select_tracnghiem($idUnit);
        return $table;
    }

    public function getTestUnits()
    {
        $model = new mTracNghiem();
        return $model->getTestUnits();
    }

    public function get_saveResult($noiDungKetQua, $idTaiKhoan, $idUnit, $diemSo, $username)
	{
		$p = new mTracNghiem();
		$table = $p->luu_ketqua($noiDungKetQua, $idTaiKhoan, $idUnit, $diemSo, $username);
		return $table;
	}


}

