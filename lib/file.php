<?php
// Trong file "lib/file.php"

class Upload
{
    public function __construct($file = null)
    {
        if ($file !== null) {
            $this->doUpload($file);
        }
    }

    public function doUpload($file)
    {
        $target_dir = $_SERVER['DOCUMENT_ROOT']."/TranTienDo_2122110150/asset/images";
        $target_file = $target_dir . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Kiểm tra xem tệp có phải là hình ảnh hay không
        $check = getimagesize($file["tmp_name"]);
        if ($check === false) {
            echo "Tệp tin không phải là hình ảnh.";
            $uploadOk = 0;
        }

        // Kiểm tra nếu tệp đã tồn tại
        if (file_exists($target_file)) {
            echo "Xin lỗi, tệp tin đã tồn tại.";
            $uploadOk = 0;
        }

        // Kiểm tra kích thước tệp
        if ($file["size"] > 500000) {
            echo "Xin lỗi, tệp tin của bạn quá lớn.";
            $uploadOk = 0;
        }

        // Kiểm tra định dạng tệp hợp lệ
        $allowedExtensions = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $allowedExtensions)) {
            echo "Rất tiếc, chỉ chấp nhận các tệp tin JPG, JPEG, PNG & GIF.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Rất tiếc, tệp tin của bạn chưa được tải lên.";
        } else {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                echo "Tệp tin " . htmlspecialchars(basename($file["name"])) . " đã được tải lên thành công.";
            } else {
                echo "Rất tiếc, đã xảy ra lỗi khi tải tệp tin của bạn lên.";
            }
        }
    }
}

?>