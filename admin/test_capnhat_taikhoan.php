<?php
// Kết nối đến cơ sở dữ liệu MySQL
$conn = mysqli_connect("localhost", "username", "password", "tendatabase");

// Kiểm tra xem yêu cầu đã được gửi đi hay chưa
if (isset($_POST['submit'])) {
    // Lấy dữ liệu từ form
    $oldUsername = $_POST['old_username'];
    $newUsername = $_POST['new_username'];

    // Kiểm tra xem tài khoản mới đã tồn tại trong bảng người dùng hay chưa
    $queryCheckUser = "SELECT * FROM users WHERE username = '$newUsername'";
    $resultCheckUser = mysqli_query($conn, $queryCheckUser);

    if (mysqli_num_rows($resultCheckUser) > 0) {
        echo "Tài khoản mới đã tồn tại trong bảng người dùng.";
    } else {
        // Kiểm tra xem tài khoản mới đã tồn tại trong bảng tài khoản hay chưa
        $queryCheckAccount = "SELECT * FROM accounts WHERE username = '$newUsername'";
        $resultCheckAccount = mysqli_query($conn, $queryCheckAccount);

        if (mysqli_num_rows($resultCheckAccount) > 0) {
            echo "Tài khoản mới đã tồn tại trong bảng tài khoản.";
        } else {
            // Thực hiện truy vấn SQL để cập nhật tên tài khoản mới trong bảng người dùng
            $queryUpdateUser = "UPDATE users SET username = '$newUsername' WHERE username = '$oldUsername'";
            $resultUpdateUser = mysqli_query($conn, $queryUpdateUser);

            // Thực hiện truy vấn SQL để cập nhật tên tài khoản mới trong bảng tài khoản
            $queryUpdateAccount = "UPDATE accounts SET username = '$newUsername' WHERE username = '$oldUsername'";
            $resultUpdateAccount = mysqli_query($conn, $queryUpdateAccount);

            // Kiểm tra kết quả của truy vấn
            if ($resultUpdateUser && $resultUpdateAccount) {
                echo "Đổi tài khoản thành công.";
            } else {
                echo "Đổi tài khoản thất bại: " . mysqli_error($conn);
            }
        }
    }