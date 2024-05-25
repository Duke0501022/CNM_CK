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
$tuvan = new cTuVanPhuHuynh();
$listcv1 = $tuvan->getTestPH();
// Hiển thị danh sách các đơn vị trắc nghiệm
?>
<div class="container my-3">
    <h1 style="text-align: center;">Tư vấn phụ huynh</h1>
    <?php
    // Kiểm tra xem có đơn vị trắc nghiệm nào không
    if (!empty($listcv1)) {
        // Lặp qua mỗi đơn vị trắc nghiệm
        foreach ($listcv1 as $cv) {
            // Kiểm tra xem các trường dữ liệu có tồn tại không
            if (isset($cv['idPhuHuynh'], $cv['hinhAnh'], $cv['hoTen'])) {
                // Lấy thông tin về đơn vị trắc nghiệm
                $idPhuHuynh = $cv['idPhuHuynh'];
                $hinhAnh = $cv['hinhAnh'];
                $PhuHuynhName = $cv['hoTen'];
    ?>
                <div class="screening-card">
                    <div class="screening-card-header" style="color:Black;">Tư vấn phụ huynh <?= $PhuHuynhName ?></div>
                    <div class="screening-card-body">
                        <!-- <img class="card-img-top mb-2" src="<?= $hinhanh ?>" alt="" style="width: 100px; height: 100px; border-radius: 50px;"> -->
                        <img class="card-img-top mb-2" src='img/<?php echo $cv['hinhAnh']; ?>' alt="" style="width: 100px; height: 100px; border-radius: 50px;">
                        <a href="index.php?tuvankh=<?= $idPhuHuynh ?>&idPhuHuynh=<?= $idPhuHuynh ?>" class="btn btn-primary btn-screening">Chọn</a>
                    </div>
                </div>
    <?php
            } else {
                // Xử lý trường hợp dữ liệu không tồn tại
                echo "<p>Không tìm thấy thông tin về phụ huynh.</p>";
            }
        }
    } else {
        // Xử lý trường hợp không có đơn vị trắc nghiệm
        echo "<p>Không có list phụ huynh.</p>";
    }
    ?>
</div>