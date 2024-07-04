<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['login_admin']) || !$_SESSION['login_admin']) {
    include("login.php");
    exit();
}
include_once("view/layouts/header.php");
include_once("view/layouts/slidebar.php");


if ($_SESSION['Role'] == 1) {
 
    if (isset($_REQUEST["qlnv"])) {
        include("view/NhanVienPhanPhoi/quanlinhanvien.php");
    } elseif (isset($_REQUEST["qlkhdn"])) {
        include("view/PhuHuynh/quanlikhachhangDN.php");
    } elseif (isset($_REQUEST["hotro"])) {
        include("view/vSupport.php");
    } elseif (isset($_REQUEST["thongtin"])) {
        include("view/vProfile.php");
    } elseif (isset($_REQUEST["adddn"])) {
        include("view/PhuHuynh/adddoanhnghiep.php");
    } elseif (isset($_REQUEST["updatekh"])) {
        include("view/PhuHuynh/updatedoanhnghiep.php");
    } elseif (isset($_REQUEST["delkh"])) {
        include("view/PhuHuynh/deldoanhnghiep.php");
    } elseif (isset($_REQUEST["qlcv"])) {
        include("view/NhanVienPhanPhoi/quanlinhanvien.php");
    } elseif (isset($_REQUEST["addnv"])) {
        include("view/NhanVienPhanPhoi/addnhanvien.php");
    } elseif (isset($_REQUEST["updatenvpp"])) {
        include("view/NhanVienPhanPhoi/updatenv.php");
    } elseif (isset($_REQUEST["delnvpp"])) {
        include("view/NhanVienPhanPhoi/delnhanvienphanphoi.php");
    } elseif (isset($_REQUEST["chatbot"])) {
        include("view/ChatBot/quanlichatbot.php");
    } elseif (isset($_REQUEST["addcb"])) {
        include("view/ChatBot/addchatbot.php");
    } elseif (isset($_REQUEST["updatecb"])) {
        include("view/ChatBot/updatechatbot.php");
    } elseif (isset($_REQUEST["delcb"])) {
        include("view/ChatBot/delchatbot.php");
    } elseif (isset($_REQUEST["qltk"])) {
        include("view/TaiKhoan/quanlitaikhoan.php");
    } elseif (isset($_REQUEST["addtk"])) {
        include("view/TaiKhoan/addtaikhoan.php");
    } elseif (isset($_REQUEST["updatetk"])) {
        include("view/TaiKhoan/updatetaikhoan.php");
    } elseif (isset($_REQUEST["deletetk"])) {
        include("view/TaiKhoan/deletetaikhoan.php");
    } elseif (isset($_REQUEST["quanliloaibaiviet"])) {
        include("view/LoaiBaiViet/quanliloaibaiviet.php");
    } elseif (isset($_REQUEST["dangbaiviet"])) {
        include("view/LoaiBaiViet/dangbai.php");
    } elseif (isset($_REQUEST["phanhoi"])) {
        include("view/vPhanHoi.php");
    } elseif (isset($_REQUEST["qlbt"])) {
        include("view/CauHoi/quanlicauhoi.php");
    } elseif (isset($_REQUEST["addcauhoi"])) {
        include("view/CauHoi/addcauhoi.php");
    } elseif (isset($_REQUEST["updatecauhoi"])) {
        include("view/CauHoi/updatecauhoi.php");
    }elseif (isset($_REQUEST["deletecauhoi"])) {
      include("view/CauHoi/delcauhoi.php");
    } elseif (isset($_REQUEST["import"])) {
        include("view/Import/vImport.php");
    }elseif (isset($_REQUEST["qltt"])) {
        include("view/TinTuc/quanlitintuc.php");
    }
    elseif (isset($_REQUEST["addtt"])) {
        include("view/TinTuc/addtintuc.php");
    }
    elseif (isset($_REQUEST["updatett"])) {
        include("view/TinTuc/updatetintuc.php");
    }
    elseif (isset($_REQUEST["deltintuc"])) {
        include("view/TinTuc/deltintuc.php");
    }
    elseif (isset($_REQUEST["qlluong"])) {
        include("view/Luong/listLuong.php");
    }
    elseif (isset($_REQUEST["tinhluong"])) {
        include("view/Luong/tinhLuong.php");
    }
     else {
        include_once("view/content.php");
    }
      #CHUYENVIEN
    }elseif ($_SESSION['Role'] == 3) {
        include_once("view/layouts/header.php");
        include_once("view/layouts/slidebar.php");
        if (isset($_REQUEST["thongtin"])) {
            include("view/vProfile.php");
        } elseif (isset($_REQUEST["tuvan"])){
            include_once("view/dsPhuHuynh.php");
        }elseif (isset($_REQUEST["tuvankh"])){
            include_once("view/vTuVan.php");
        }elseif (isset($_REQUEST["dstest"])){
                include_once("view/vLichSu.php");    
        }else {
            include_once("view/content.php");
        }
        #QTV
    } elseif ($_SESSION['Role'] == 4) {
        include_once("view/layouts/header.php");
        include_once("view/layouts/slidebar.php");
        if (isset($_REQUEST["qlbt"])) {
            include("view/CauHoi/quanlicauhoi.php");
        } elseif (isset($_REQUEST["addcauhoi"])) {
            include("view/CauHoi/addcauhoi.php");
        } elseif (isset($_REQUEST["updatecauhoi"])) {
            include("view/CauHoi/updatecauhoi.php");
        } elseif (isset($_REQUEST["delcauhoi"])) {
            include("view/CauHoi/delcauhoi.php");
          
        } elseif(isset($_REQUEST["thongtin"])) {
            include("view/vProfile.php");
        }
        elseif (isset($_REQUEST["qltt"])) {
            include("view/TinTuc/quanlitintuc.php");
        }
        elseif (isset($_REQUEST["addtt"])) {
            include("view/TinTuc/addtintuc.php");
        }
        elseif (isset($_REQUEST["updatett"])) {
            include("view/TinTuc/updatetintuc.php");
        }
        elseif (isset($_REQUEST["deltintuc"])) {
            include("view/TinTuc/deltintuc.php");
        }
        elseif (isset($_REQUEST["duyett"])) {
            include("view/TinTuc/duyettin.php");
        }
        elseif (isset($_REQUEST["phanhoi"])) {
            include("view/vPhanHoi.php");
        }

        else {
            include_once("view/content.php");
        }
     }


include_once("view/layouts/footer.php");
?>