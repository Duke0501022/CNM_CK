<?php
    
    include_once("controller/NhanVienPhanPhoi/cnvphanphoi.php");
    include_once("controller/TaiKhoan/ctaikhoan.php");
    if(isset($_REQUEST['MaNVPP'])&& isset($_REQUEST['username'])){
		$MaNVPP = $_REQUEST['MaNVPP'];
		$username = $_REQUEST['username'];
		$p = new cNVPP();
	    $tk = new ctaikhoan();
		$delete = $p -> delete_nhanvienphanphoi($MaNVPP);
		if($delete=1){
			$delete= $tk-> delete_taikhoan($username);
			if ($delete=1) {
				echo "<script>alert('Xóa thành công');</script>";
				echo "<script>window.location.href='?qlnv'</script>";
			}else{
            	echo "<script>alert('Xóa không thành công');</script>";
            	echo "<script>window.location.href='?qlnv'</script>";
			}	
		}
	}
?>