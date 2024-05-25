<?php
    include_once("model/LoaiBaiViet/loaibaiviet.php");

    class cloaibaiviet{
    	//--------------THỐNG KÊ
		//
		#THỐNG KÊ SỐ LƯỢNG nhân viên phân phối
		// public function count_nhanvien(){
        //     $p = new mNVPP();
        //     $table = $p->count_nhanvien();
        //     return $table;
        // }
		//
		//------------------------------------------
        #Hien thi thong tin thanh vien
        public function select_loai_baiviet(){
            $p = new mloaibaiviet();
            $table = $p->select_loaibaiviet();
            return $table;
        }
        // #Hien thi thong tin nhóm nông sản theo MaNhomNongSan
        // public function select_nhomnongsan_byid($MaNhomNongSan){
        //     $p=new mNhomNS();
        //     $table=$p->select_nhomns_id($MaNhomNongSan);
        //     return $table;
        // }
        // #thêm nhân viên phân phối
        // public function add_nhomnongsan($TenNhomNongSan){
        //     $p = new mNhomNS();
        //     $insert = $p->add_nhomns($TenNhomNongSan);
        //     var_dump($insert);
        //     if($insert){
        //         return 1;// thêm thành công
        //     }else {
        //         return 0;//thêm không thành công
        //     }   
        // }
		
		// #Cap nhap thong tin nhan vien
		// public function update_nhomnongsan($MaNhomnNongSan, $TenNhomNongSan){
		// 	$p=new mNhomNS();
		// 	$update=$p->update_nhomns($MaNhomnNongSan, $TenNhomNongSan);
		// 	var_dump($update);
		// 	if($update){
		// 		return 1;// update thành công
		// 	}else{
		// 		return 0;// update không thành công
		// 	}
				
		// }
        // #xóa nhóm nông sản
        // function delete_nhomnongsan($MaNhomNongSan){
		// 	$p = new mNhomNS();
		// 	$table  = $p -> del_nhomns($MaNhomNongSan);
		// 	var_dump($table);
		// 	return $table;
		// }
    }
?>