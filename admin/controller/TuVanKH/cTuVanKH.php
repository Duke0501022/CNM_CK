<?php
// include_once("Model/mTuVanChuyenGia.php");
include_once('model/TuVanKh/mTuVanKH.php');

class cTuVanChuyenGia
{
    public function getTestCG()
    {
        $model = new mTuVanKH();
        return $model->getTestCG();
    }

    public function select_ChuyenGia($idPhuHuynh)
    {
        $model = new mTuVanKH();
        return $model->select_ChuyenGia($idPhuHuynh);
    }
    
    public function insert_tuvanchuyengia($sender_id, $receiver_id, $message)
    {
        $model = new mTuVanKH();
        return $model->insert_tuvanchuyengia($sender_id, $receiver_id, $message);
    }

    public function get_messages($sender_id, $receiver_id)
    {
        $model = new mTuVanKH();
        return $model->get_messages($sender_id, $receiver_id);
    }
}

?>
<?php
// include_once("Model/mTuVanChuyenGia.php");

// class TuVanController
// {
//     private $model; // Biến lưu trữ model

//     public function index()
//     {
//         include_once("View/chuyengia.php");

//     }

    // public function sendEmailCG()
    // {
    //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         $hoTen = $_POST['hoTen'];
    //         $soDienThoai = $_POST['soDienThoai'];
    //         $email = $_POST['email'];
    //         $noiDung = $_POST['noiDung'];

    //         // Địa chỉ email nhận
    //         $to = 'xuanhauk16@gmail.com'; // Thay đổi thành địa chỉ email của bạn
    //         $subject = 'Tư vấn trực tuyến'; // Tiêu đề email

    //         $success = $this->model->sendEmailCG($to, $subject, $hoTen, $soDienThoai, $noiDung, $email);
    //         if ($success) {
    //             echo "Đặt câu hỏi cho chuyên viên thành công!";
    //         } else {
    //             echo "Đặt câu hỏi thất bại.";
    //         }
    //     }
    // }
// }

// Routing
// $action = isset($_GET['action']) ? $_GET['action'] : 'index';
// $controller = new TuVanController();
// $controller->$action();
?>
