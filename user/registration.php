<?php
// ĐỊnh nghĩa biến
$nameErr = $emailErr = $genderErr = $addressErr = $phoneErr = $userErr = $passwordErr = $birthErr = "";
$name = $email = $gender = $address = $phone = $user = $password = $birth = "";

$flag = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        $flag = 1;
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
            $flag = 0;
        }
    }
    //gender

    if ($_POST["gender"] == "") {
        $genderErr = "gender is required";
        $flag = 0;
    } else {
        $gender = test_input($_POST["gender"]);
        $flag = 1;
    }

    //email

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        $flag = 0;
    } else {
        $email = test_input($_POST["email"]);
        $flag = 1;
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $flag = 0;
        }
    }

    //birthDay

    if (empty($_POST["birth"])) {
        $birthErr = "birthday is required";
        $flag = 0;
    } else {
        $birth = test_input($_POST["birth"]);
        $flag = 1;
    }

    //phone
    if (empty($_POST["phone"])) {
        $phoneErr = "phone is required";
        $flag = 0;
    } else {
        $phone = test_input($_POST["phone"]);
        $flag = 1;
        $phone_pattern = "/^\d+$/";
        if (!preg_match($phone_pattern, $phone)) {
            $phoneErr = "Chỉ cho phép số ";
            $flag = 0;
        }
    }

    //address
    if (empty($_POST["address"])) {
        $addressErr = "address is required";
        $flag = 0;
    } else {
        $address = test_input($_POST["address"]);
        $flag = 1;
    }

    //UserName
    if (empty($_POST["user"])) {
        $userErr = "user is required";
        $flag = 0;
    } else {
        $user = test_input($_POST["user"]);
        $flag = 1;
    }

    //password
    if (empty($_POST["password"])) {
        $passwordErr = "password is required";
        $flag = 0;
    } else {
        $password = sha1(test_input($_POST["password"]));
        $flag = 1;
    }

    if ($flag == 1) {
        $i = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
            $uploadedFile = $_FILES["image"];

            require("lib/file.php");
            $i= $uploadedFile['name'];
            $u = new Upload($uploadedFile);
        }


        $user = array(
            "username" => $_POST["user"],
            "password" => $_POST["password"],
            "name" => $_POST["name"],
            "email" => $_POST["email"],
            "phone" => $_POST["phone"],
            "address" => $_POST["address"],
            "gender" => $_POST["gender"],
            "avatar" => $i,
        );
        $f->addRecord("user", $user);
        // $f->addRecord("user", json_encode($user));
        header("Location: index.php");

    }



}
?>

<div class="registration" style="border: solid 3px #999999;width:75%;margin-left: 14%;">

    <h2 class="text-success mx-auto text-center">ĐĂNG KÝ THÀNH VIÊN</h2>
    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>?page=registration" method="post"
        enctype="multipart/form-data">


        <div class="mb-3 ">

            <label for="hoten" class="form-label"> Họ Tên <span class="text-danger">(*)</span> </label>
            <input type="text" class="form-control" id="hoten" placeholder="Hoten" name="name" value="<?= $name ?>" />
            <span class="error">
                <?= $nameErr ?>
            </span>

        </div>

        <div class="mb-3 mt-3">
            <?php
            if (isset($gender) && $gender == 1) {
                echo "    <h6>Giới tính</h6>

                    Nam:<input name='gender' type='radio' class='form-check-input' value='1' checked />
                    Nữ:<input name='gender' type='radio' class='form-check-input' value='0' />  ";
            } else {
                echo "    <h6>Giới tính</h6>

                    Nam:<input name='gender' type='radio' class='form-check-input' value='1'  />
                    Nữ:<input name='gender' type='radio' class='form-check-input' value='0' checked />  ";
            }
            ?>
            <span class="error">
                <?= $genderErr ?>
            </span>


        </div>

        <div class="mb-3">
            <label for="ngaySinh">Ngày sinh <span class="text-danger">(*)</span></label>
            <input type="Date" class="form-control" id="birth" name="birth" value="<?= $birth ?>" />
            <span class="error">
                <?= $birthErr ?>
            </span>

        </div>

        <div class="mb-3">

            <label for="soDienThoai">Điện thoại <span class="text-danger">(*)</span></label>
            <input type="tel" class="form-control" id="dienThoai" placeholder="So dien thoai" name="phone"
                value="<?= $phone ?>" />
            <span class="error">
                <?= $phoneErr ?>
            </span>


        </div>

        <div class="mb-3 mt-3">

            <label for="email" class="form-label"> Email <span class="text-danger">(*)</span></label>
            <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                value="<?= $email ?>" />
            <span class="error">
                <?= $emailErr ?>
            </span>


        </div>

        <div class="mb-3 ">

            <label for="lop" class="form-label"> Địa chỉ <span class="text-danger">(*)</span></label>
            <input type="text" class="form-control" id="diachi" placeholder="DiaChi" name="address"
                value="<?= $address ?>" />
            <span class="error">
                <?= $addressErr ?>
            </span>


        </div>

        <div class="mb-3 mt-3">
            <label for="add" class="form-label">Image</label>
            <input type="file" class="form-control" placeholder=" " name="image">

        </div>

        <div class="mb-3 mt-3">
            <label for="name">Tên đăng nhập:<span class="text-danger">(*)</span></label>
            <input type="text" class="form-control" id="nameLogin" placeholder="Ten dang nhap" name="user"
                value="<?= $user ?>" />
            <span class="error">
                <?= $userErr ?>
            </span>

        </div>

        <div class="mb-3 mt-3">
            <label for="name">Mật khẩu<span class="text-danger">(*)</span></label>
            <input type="password" class="form-control" id="pass" name="password">
            <span class="error">
                <?= $passwordErr ?>
            </span>


        </div>

        <button type='submit' class="btn btn-success" name="submit" style="border-radius:10px">submit</button>
    </form>




    <?php
    $thongTin = array();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $thongTin['Họ và tên'] = isset($_POST['name']) ? $_POST['name'] : "";
        $thongTin['Giới tính'] = isset($_POST['gender']) ? $_POST['gender'] : "";
        $thongTin['Ngày sinh'] = isset($_POST['birth']) ? $_POST['birth'] : "";
        $thongTin['Điện thoại'] = isset($_POST['phone']) ? $_POST['phone'] : "";
        $thongTin['email'] = isset($_POST['email']) ? $_POST['email'] : "";
        $thongTin['Địa chỉ'] = isset($_POST['address']) ? $_POST['address'] : "";
        $thongTin["Hình ảnh"] = isset($_POST["image"]) ? $_POST["image"] : "";
        $thongTin['Tên đăng nhập'] = isset($_POST['user']) ? $_POST['user'] : "";
        $thongTin['Mật khẩu'] = isset($_POST['password']) ? $_POST['password'] : "";

    }


    ?>

    <table class="table table-bordered">
        <?php foreach ($thongTin as $key => $value): ?>
            <tr>
                <th>
                    <?= ucfirst($key) ?>
                </th>
                <td>
                    <?= $value ?>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>


</div>