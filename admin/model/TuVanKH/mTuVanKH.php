<?php
// include_once("Model/Connect.php");
include_once("model/connect.php");


class mTuVanKH
{
    function getTestCG()
    {
        $p = new ketnoi();
        $conn = $p->moketnoi($conn); // Thêm $conn vào đây
        if ($conn) { // Kiểm tra kết nối
            $string = "SELECT * FROM phuhuynh";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        } else {
            return false;
        }
    }

    public function select_ChuyenGia($idPhuHuynh)
    {
        $p = new ketnoi();
        $conn = $p->moketnoi($conn); // Thêm $conn vào đây
        if ($conn) { // Kiểm tra kết nối
            $string = "SELECT * FROM phuhuynh  WHERE  idPhuHuynh = '".$idPhuHuynh."'";
            $table = mysqli_query($conn, $string);
            $p->dongketnoi($conn);
            return $table;
        } else {
            return false;
        }
    }

    public function insert_tuvanchuyengia($sender_id, $receiver_id, $message)
    {
        $p = new ketnoi();
        $conn = $p->moketnoi($conn); // Thêm $conn vào đây
        if ($conn) { // Kiểm tra kết nối
            // Thực hiện truy vấn để chèn tin nhắn vào bảng messages
            $string = "INSERT INTO messages (sender_id, receiver_id, message) VALUES ( '$receiver_id','$sender_id', '$message')";
            $result = mysqli_query($conn, $string);
            if (!$result) {
                // Xảy ra lỗi khi thực hiện truy vấn
                throw new mysqli_sql_exception(mysqli_error($conn));
            }
            // Đóng kết nối sau khi thực hiện truy vấn
            $p->dongketnoi($conn);
            return $result;
        } else {
            // Không thể kết nối đến cơ sở dữ liệu
            return false;
        }
    }

    public function get_messages($sender_id, $receiver_id)
    {
        $p = new ketnoi();
        $conn = $p->moketnoi($conn); // Thêm $conn vào đây
        if ($conn) { // Kiểm tra kết nối
            // Thực hiện truy vấn để lấy tất cả tin nhắn giữa sender_id và receiver_id
            $string = "SELECT * FROM messages WHERE (sender_id = '$sender_id' AND receiver_id = '$receiver_id') OR (sender_id = '$receiver_id' AND receiver_id = '$sender_id')";
            $result = mysqli_query($conn, $string);
            if (!$result) {
                // Xảy ra lỗi khi thực hiện truy vấn
                throw new mysqli_sql_exception(mysqli_error($conn));
            }
            // Đóng kết nối sau khi thực hiện truy vấn
            $p->dongketnoi($conn);
            return $result;
        } else {
            // Không thể kết nối đến cơ sở dữ liệu
            return false;
        }
    }
}
