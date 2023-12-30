<?php
session_start(); // Bắt đầu phiên làm việc với session

$email = $_POST["email"];
$password = $_POST["password"];

$sql_user = "SELECT * FROM user WHERE email='" . $email . "' AND password='" . ($password) . "' ";
$result = $f->getOne($sql_user);

// Kiểm tra xem kết quả có hợp lệ hay không
if (!is_null($result)) {
    $_SESSION['user'] = $result['username'];
    header("Location: index.php");
    exit(); // Kết thúc chương trình sau khi chuyển hướng
} else {
    // Nếu thông tin đăng nhập không hợp lệ, chuyển hướng về trang đăng nhập với thông báo lỗi
    header("Location: /TranTienDo_2122110150/index.php?page=login&error=invalid_credentials");
    // exit(); // Kết thúc chương trình sau khi chuyển hướng
}
?>
