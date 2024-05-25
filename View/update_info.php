<?php
include_once("Controller/cInfo.php");
if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
} else {
  $username = null;
}
$info = new cInfo();
$result = $info->update_info2($username, $hoTen, $gioiTinh, $soDienThoai, $email);


// Lấy dữ liệu từ phương thức POST
// $hoTen = $_POST['hoTen'];
// $gioiTinh = $_POST['gioiTinh'];
// $soDienThoai = $_POST['soDienThoai'];
// $hinhAnh = $_POST['hinhAnh']; // Nếu bạn muốn xử lý hình ảnh, hãy sử dụng $_FILES thay vì $_POST
// $email = $_POST['email'];

if (isset($_REQUEST["send"])) {
  $hoTen = $_POST['hoTen'];
  $gioiTinh = $_POST['gioiTinh'];
  $soDienThoai = $_POST['soDienThoai'];
  $hinhAnh = $_POST['hinhAnh']; // Nếu bạn muốn xử lý hình ảnh, hãy sử dụng $_FILES thay vì $_POST
  $email = $_POST['email'];

  // Gọi phương thức update_info2 từ mInfo
  $info = new mInfo();
  $success = $info->update_info2($username, $hoTen, $gioiTinh, $soDienThoai, $email);

  if ($success) {
    echo "Thay đổi thành công";
  } else {
    echo "Thay đổi thất bại";
  }
}



  // $(document).ready(function(){
  //     $('#send').click(function(){
  //         var hoTen = $('#hoTen').val();
  //         var gioiTinh = $('#gioiTinh').val();
  //         var soDienThoai = $('#soDienThoai').val();
  //         var email = $('#email').val();
  //         $.ajax({
  //             url: 'update_info.php',
  //             type: 'POST',
  //             data: {
  //                 hoTen: hoTen,
  //                 gioiTinh: gioiTinh,
  //                 soDienThoai: soDienThoai,
  //                 email: email
  //             },
  //             success:function(response){
  //                 $('#editModal').modal('hide');
  //                 alert(response); // Hiển thị thông báo thành công/thất bại
  //             },
  //             error:function(xhr, status, error){
  //                 console.log(xhr.responseText);
  //             }
  //         });
  //     });
  // });
  // 
