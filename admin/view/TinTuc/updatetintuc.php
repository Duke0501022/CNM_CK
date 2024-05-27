<?php
include("controller/TinTuc/cTinTuc.php");

$idTinTuc = $_REQUEST['idTieuDe'];

$p = new cloaibaiviet();
$table = $p->select_tintuc_id($idTinTuc);
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Cập nhật bài viết</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Quản lý bài viết</li>
                    </ol>
                </div>
            </div>
        </div> <!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 style="text-align:center">Tin Tức</h3>
                            <?php
                            if ($table && mysqli_num_rows($table) > 0) {
                                $row = mysqli_fetch_assoc($table);
                            ?>
                            <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                                <div class="row-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <?php if ($row["hinhAnh"] == NULL) { ?>
                                                    <img src='/assets/uploads/images/user.png' alt='' height='200px' width='300px' style='border-radius:50px'>
                                                <?php } else { ?>
                                                    <img src='admin/assets/uploads/images/<?php echo $row['hinhAnh']; ?>' alt='' height='200px' width='300px' style='border-radius:50px'>
                                                <?php } ?>
                                                <input type="file" class="form-control" name="hinhAnh">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Mã Tin Tức</label>
                                                <input type='text' class='form-control' name='txtmakh' value="<?php echo $row['idTinTuc'] ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Tiêu Đề</label>
                                                <input type='text' class='form-control' name='tieuDe' value="<?php echo $row['tieuDe'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nội dung</label>
                                                <input type='text' class='form-control' name='noiDung' value="<?php echo $row['noiDung'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="submit" style="margin-left:50%">Cập nhật</button>
                                    <button type="reset" class="btn btn-secondary" name="reset">Hủy</button>
                                </div>
                            </form>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
if (isset($_POST["submit"])) {
    $idTinTuc = $_POST["txtmakh"];
    $tieuDe = $_POST["tieuDe"];
    $noiDung = $_POST["noiDung"];

   
    if (isset($_FILES['hinhAnh']) && $_FILES['hinhAnh']['size'] > 0) {
        $hinhAnh = basename($_FILES["hinhAnh"]["name"]);
        $tmpimg = $_FILES["hinhAnh"]["tmp_name"];
        $typeimg = $_FILES["hinhAnh"]["type"];
        $sizeimg = $_FILES["hinhAnh"]["size"];
    }else{
    $hinhAnh = NULL;
    }
    $p = new cloaibaiviet();
    $update = $p->update_tintuc($idTinTuc, $tieuDe, $noiDung, $hinhAnh, $tmpimg, $typeimg, $sizeimg);

    if ($update == 1) {
        echo "<script>alert('Cập nhật thành công');</script>";
        echo "<script>window.location.href='?qltt'</script>";
    } elseif ($update == -1) {
        echo "<script>alert('Lỗi tải lên hình ảnh');</script>";
    } elseif ($update == -2) {
        echo "<script>alert('Không đúng định dạng hoặc kích thước quá lớn');</script>";
    } else {
        echo "<script>alert('Cập nhật không thành công');</script>";
    }
}
?>
<script>
function validateForm() {
    var tieuDe = document.forms["updateForm"]["tieuDe"].value;
    var noiDung = document.forms["updateForm"]["noiDung"].value;
    var hinhAnh = document.forms["updateForm"]["hinhAnh"].value;

    if (tieuDe.trim() === "" || noiDung.trim() === "") {
        alert("Vui lòng điền đầy đủ tiêu đề và nội dung.");
        return false;
    }

    if (hinhAnh) {
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        if (!allowedExtensions.exec(hinhAnh)) {
            alert('Hình ảnh phải có định dạng JPG, JPEG, PNG hoặc GIF');
            return false;
        }
        var fileSize = document.getElementById("hinhAnh").files[0].size;
        var maxSize = 5 * 1024 * 1024; // 5MB
        if (fileSize > maxSize) {
            alert('Kích thước hình ảnh không được vượt quá 5MB');
            return false;
        }
    }

    return true;
}
</script>