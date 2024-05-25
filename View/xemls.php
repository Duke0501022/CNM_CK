
<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

include_once('Controller/cXemLichSu.php');

$username = $_SESSION['username']; // Thay thế giá trị này bằng ID cần xem lịch sử

$xemls = new cSeeLichSu();
$res = $xemls->get_lichsu($username);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử làm bài</title>
    <style>
        table {
            margin-left: auto;
            margin-right: auto;
            width: 80%;
            /* Đặt chiều rộng của bảng */
            font-size: 18px;
            /* Đặt kích thước chữ của bảng */
            border-collapse: collapse;
            /* Gộp các đường viền của ô */
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;">Lịch sử làm bài</h1>
    <table border="1" style="text-align: center;">
        <thead>
            <tr>
                <th>ID kết quả</th>
                <th>Nội dung kết quả</th>
                <th>Tên tài khoản</th>
                <th>ID phụ huynh</th>
                <th>Điểm số</th>
                <th>Unit</th>
                <th>Thời gian</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (is_object($res) && mysqli_num_rows($res) > 0)  {
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                    echo "<td>" . $row['idKetQua'] . "</td>";
                    echo "<td>" . $row['noiDungKetQua'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['idPhuHuynh'] . "</td>";
                    echo "<td>" . $row['diemSo'] . "</td>";
                    echo "<td>" . $row['tenUnit'] . "</td>";
                    echo "<td id='thoiGian'></td>";
                    echo "</tr>";
                }
            } else {
            ?>
                <tr>
                    <td colspan="7">Không có dữ liệu</td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>

<script>
    var d = new Date();
    document.getElementById("thoiGian").innerHTML = d;
</script>