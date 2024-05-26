<div class="container-fluid bg-primary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h3 class="display-3 font-weight-bold text-white">Tư vấn trực tiếp với chuyên gia</h3>
    </div>
</div>
<?php
if (isset($_SESSION['idPhuHuynh'])) {
    $idPhuHuynh = $_SESSION['idPhuHuynh'];
} else {
    $idPhuHuynh = null;
}
?>
<?php
include_once("Controller/cTuVanChuyenGia.php");
// Lấy danh sách các đơn vị trắc nghiệm
$tuvan = new cTuVanChuyenGia();
$listcv1 = $tuvan->getTestCG();
// Hiển thị danh sách các đơn vị trắc nghiệm
?>
<div class="container my-3">
    <h1 style="text-align: center;">Danh sách tư vấn chuyên gia</h1>
    <?php
    // Kiểm tra xem có đơn vị trắc nghiệm nào không
    if (!empty($listcv1)) {
        // Lặp qua mỗi đơn vị trắc nghiệm
        foreach ($listcv1 as $cv) {
            // Kiểm tra xem các trường dữ liệu có tồn tại không
            if (isset($cv['idChuyenVien'], $cv['hinhAnh'], $cv['hoTen'], $cv['moTa'])) {
                // Lấy thông tin về đơn vị trắc nghiệm
                $idChuyenVien = $cv['idChuyenVien'];
                $hinhAnh = $cv['hinhAnh'];
                $ChuyenVienName = $cv['hoTen'];
                $moTaChuyenVien = $cv['moTa'];
    ?>
                <div class="screening-card">
                    <div class="screening-card-header" style="color:Black;">Tư vấn chuyên viên <?= $ChuyenVienName ?></div>
                    <div class="screening-card-body">
                        <!-- <img class="card-img-top mb-2" src="<?= $hinhanh ?>" alt="" style="width: 100px; height: 100px; border-radius: 50px;"> -->
                        <img class="card-img-top mb-2" src='admin/admin/assets/uploads/images/<?php echo $cv['hinhAnh']; ?>' alt="" style="width: 100px; height: 100px; border-radius: 50px;">

                        <p><?= $moTaChuyenVien ?></p>
                        <a href="index.php?tuvanchuyengia=<?= $idChuyenVien ?>&idChuyenVien=<?= $idChuyenVien ?>" class="btn btn-primary btn-screening">Chọn</a>
                    </div>
                </div>
    <?php
            } else {
                // Xử lý trường hợp dữ liệu không tồn tại
                echo "<p>Không tìm thấy thông tin về chuyên viên.</p>";
            }
            // if ($idPhuHuynh) {
            //     $sender_id = $idPhuHuynh;
            //     $receiver_id = $idChuyenVien;
            //     $insert_chat = $tuvan->insert_tuvanchuyengia($sender_id, $receiver_id, $message);
            // } else {
            //     echo "Session variables not set correctly";
            // }
        }
    } else {
        // Xử lý trường hợp không có đơn vị trắc nghiệm
        echo "<p>Không có list chuyen gia.</p>";
    }
    ?>
</div>