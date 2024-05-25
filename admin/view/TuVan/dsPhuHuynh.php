
<?php
if (isset($_SESSION['idChuyenVien'])) {
    $idChuyenVien = $_SESSION['idChuyenVien'];
} else {
    $idChuyenVien = null;
}
?>
<?php
include_once("controller/TuVanKH/cTuVanKH.php");
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
            if (isset($cv['idPhuHuynh'], $cv['hinhAnh'], $cv['hoTen'], $cv['gioiTinh'])) {
                // Lấy thông tin về đơn vị trắc nghiệm
                $idPhuHuynh= $cv['idPhuHuynh'];
                $hinhAnh = $cv['hinhAnh'];
                $PhuHuynhName = $cv['hoTen'];
                $gioiTinh = $cv['gioiTinh'];
    ?>
                <div class="screening-card">
                    <div class="screening-card-header" style="color:Black;">Tư vấn cho phụ huynh <?= $PhuHuynhName ?></div>
                    <div class="screening-card-body">
                        <!-- <img class="card-img-top mb-2" src="<?= $hinhAnh ?>" alt="" style="width: 100px; height: 100px; border-radius: 50px;"> -->
                        <img class="card-img-top mb-2" src='img/<?php echo $cv['hinhAnh']; ?>' alt="" style="width: 100px; height: 100px; border-radius: 50px;">

                        <p><?= $gioiTinh ?></p>
                        <a href="index.php?tuvankh=<?= $idPhuHuynh ?>&idPhuHuynh=<?= $idPhuHuynh  ?>" class="btn btn-primary btn-screening">Chọn</a>
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