
<?php
include_once("Model/mXemLichSu.php");

class cSeeLichSu
{
    public function get_lichsu($username)
    {
        $mViewLichSu = new mViewLichSu();
        $tbl = $mViewLichSu->view_schedule_su($username);
        if ($tbl) {
			if ($tbl->num_rows > 0) {
				return $tbl;
			} else {
				return -1; // Không có dữ liệu trong bảng
			}
		} else {
			return false;
		}
    }
}
?>
