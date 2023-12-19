<?php 
    // if ($_SERVER["REQUEST_METHOD"]=="POST") {
    //     $user =array(
    //         "username"=> $_POST["nameLogin"],
    //         "password"=> $_POST["password"],
    //         "name"=> $_POST["fullname"],
    //         "email"=> $_POST["email"],
    //         "phone"=> $_POST["dienThoai"],
    //         "address"=> $_POST["address"],
    //         "gender"=> $_POST["gender"],
    //     );
    //     $f->addRecord("user",$user);

    // }
?>

<div class="registration" style="border: solid 3px #999999;width:75%;margin-left: 14%;">

    <h2 class="text-success mx-auto text-center">ĐĂNG KÝ THÀNH VIÊN</h2>
    <form action="<?= PATH ?>page=registration" method="post">

        <div class="mb-3 ">

            <label for="hoten" class="form-label"> Họ Tên </label>
            <input type="text" class="form-control" id="hoten" placeholder="Hoten" name="fullname">

        </div>

        <div class="mb-3 mt-3">
            <h6>Giới tính</h6>

            <input name="gender" type="radio" value="Nam" />Nam
            <input name="gender" type="radio" value="Nữ" />Nữ
        </div>

        <div class="mb-3">
            <label for="ngaySinh">Ngày sinh</label>
            <input type="Date" class="form-control" id="ngaySinh" name="ngaySinh">
        </div>

        <div class="mb-3">

            <label for="soDienThoai">Điện thoại</label>
            <input type="tel" class="form-control" id="dienThoai" placeholder="So dien thoai" name="dienThoai">

        </div>

        <div class="mb-3 mt-3">

            <label for="email" class="form-label"> Email </label>
            <input type="email" class="form-control" id="email" placeholder="Email" name="email">

        </div>

        <div class="mb-3 ">

            <label for="lop" class="form-label"> Địa chỉ </label>
            <input type="text" class="form-control" id="diachi" placeholder="DiaChi" name="address">

        </div>


        <div class="mb-3 mt-3">
            <label for="name">Tên đăng nhập:</label>
            <input type="text" class="form-control" id="nameLogin" placeholder="Ten dang nhap" name="nameLogin">
        </div>

        <div class="mb-3 mt-3">
            <label for="name">Mật khẩu</label>
            <input type="password" class="form-control" id="pass" name="password">

        </div>

        <button type='submit' class="btn btn-success" name="submit" style="border-radius:10px">Lấy thông tin</button>
    </form>


     <?php
    //     $name = $email = $address = "";
    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //     $name = $_POST['fullname'];
    //     $email = $_POST['email'];
    //     $address = $_POST['address'];
        
        
    // }
    ?> 

<?php
$thongTin = array(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $thongTin['Họ và tên'] = isset($_POST['fullname']) ? $_POST['fullname'] : "";
    $thongTin['Giới tính'] = isset($_POST['gender']) ? $_POST['gender'] : "";
    $thongTin['Ngày sinh'] = isset($_POST['ngaySinh']) ? $_POST['ngaySinh'] : "";
    $thongTin['Điện thoại'] = isset($_POST['dienThoai']) ? $_POST['dienThoai'] : "";
    $thongTin['email'] = isset($_POST['email']) ? $_POST['email'] : "";
    $thongTin['Địa chỉ'] = isset($_POST['address']) ? $_POST['address'] : "";
    $thongTin['Tên đăng nhập'] = isset($_POST['nameLogin']) ? $_POST['nameLogin'] : "";
    $thongTin['Mật khẩu'] = isset($_POST['password']) ? $_POST['password'] : "";
    
}


?>

<table class="table table-bordered">
<?php foreach ($thongTin as $key => $value): ?>
    <tr>
        <th><?= ucfirst($key) ?></th>
        <td><?= $value ?></td>
    </tr>
<?php endforeach; ?>

</table>


</div>