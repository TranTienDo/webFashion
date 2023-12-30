<?php
// Bắt đầu phiên làm việc với session (nếu chưa được bắt đầu)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Kiểm tra xem người dùng đã đăng nhập chưa
if (isset($_SESSION['user'])) {
    // Nếu đã đăng nhập, hủy bỏ thông tin phiên làm việc liên quan và chuyển hướng về trang đăng nhập
    unset($_SESSION['user']);
    session_destroy();

    // Chuyển hướng về trang đăng nhập
    header("Location: index.php");

    exit();
} else {
    // Nếu chưa đăng nhập, có thể thực hiện một hành động khác (ví dụ: hiển thị thông báo)
    echo "Bạn chưa đăng nhập.";
}
?>


