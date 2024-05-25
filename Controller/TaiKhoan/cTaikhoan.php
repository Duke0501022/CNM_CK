<?php

include_once('Model/TaiKhoan/mTaiKhoan.php');
class cTaiKhoan
{
	//hàm lấy thông tin chi tiết tài khoản
	public function get_tt_dangnhap($username, $Role)
	{
		$p = new mTaiKhoan();
		$tt = $p->select_tt_taikhoan($username, $Role);
		if ($Role == 1) { //admin
			while ($row1 = mysqli_fetch_assoc($tt)) {
				$_SESSION['idAdmin'] = $row1['idAdmin'];
				$_SESSION['tenAdmin'] = $row1['tenAdmin'];
				$_SESSION['hinhAnh'] = $row1['hinhAnh'];
			}
		} elseif ($Role == 2) { //phụ huynh
			while ($row1 = mysqli_fetch_assoc($tt)) {
				$_SESSION['idPhuHuynh'] = $row1['idPhuHuynh'];
				$_SESSION['email'] = $row1['email'];
				$_SESSION['hinhAnh'] = $row1['hinhAnh'];
				$_SESSION['hoTen'] = $row1['hoTen'];
				$_SESSION['soDienThoai'] = $row1['soDienThoai'];
				$_SESSION['gioiTinh'] = $row1['gioiTinh'];
			}
		} elseif ($Role == 3) { //chuyên viên
			while ($row1 = mysqli_fetch_assoc($tt)) {
				$_SESSION['idChuyenVien'] = $row1['idChuyenVien'];
				$_SESSION['hoTen'] = $row1['hoTen'];
				$_SESSION['soDienThoai'] = $row1['soDienThoai'];
				$_SESSION['email'] = $row1['email'];
				$_SESSION['hinhAnh'] = $row1['hinhAnh'];
				$_SESSION['moTa'] = $row1['moTa'];
			}
		} elseif ($Role == 4) { //quản trị viên 
			while ($row1 = mysqli_fetch_assoc($tt)) {
				$_SESSION['idQTV'] = $row1['idQTV'];
				$_SESSION['hoTen'] = $row1['hoTen'];
				$_SESSION['email'] = $row1['hoTen'];
				$_SESSION['hinhAnh'] = $row1['hinhAnh'];
				$_SESSION['soDienThoai'] = $row1['soDienThoai'];
			}
		} else {
		}
	}

	public function login($username, $password)
	{
		$password = md5($password);
		$p = new mTaiKhoan();
		$user = $p -> login($username, $password);
		$row = mysqli_fetch_assoc($user);
		if ($row >= 1) {
	    	$_SESSION['username'] = $row['username'];
	    	$_SESSION['password'] = $row['password'];
	    	$_SESSION['Role'] = $row['Role'];
	    	if($row['Role'] != 1){
            	$_SESSION['LoginSuccess'] = true;}
            	else{
            	$_SESSION['login_admin'] = true;
            	}
	    	$tt_dn = $this -> get_tt_dangnhap($username,$row['Role']);
			echo "<script>alert('Đăng nhập thành công')</script>";
	    	echo "<script>window.location.href = 'index.php';</script>";
		}else {
	    	echo "<script>alert('Đăng nhập thất bại')</script>";
	    	echo "<script>window.location.href = 'index.php?login';</script>";
		}
	}
	// BỔ SUNG THÔNG BÁO KHI THÊM TÀI KHOẢN BỊ TRÙNG SẼ RETURN 2
	public function them_taikhoan($username, $password, $Role)
	{
		$p = new mTaiKhoan();
		$insert = $p->add_taikhoan($username, $password, $Role);
		//gọi hàm chèn tài khoản từ model
		if ($insert) {
			return 1; //chèn thành công
		} else {
			return 0; //chèn không thành công
		}
	}

	function  ChangePassword($username, $matKhau)
    {
        $p = new mTaiKhoan();
        $tblRole = $p->ChangePassword($username, $matKhau);
        return $tblRole;
    }
}
