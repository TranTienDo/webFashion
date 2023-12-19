<div class="contact">
<h2 class="text-success">ĐIỀN THÔNG TIN LIÊN HỆ</h2>
<form action="<?=PATH ?>page=contact" method="post">

        <div class="mb-3 mt-3">

        <label for="masv" class="form-label"> Mã khách Hàng </label>
        <input type="text" class="form-control" id="masv" placeholder ="ma kh" name="userid">

        </div>

        <div class="mb-3 ">

        <label for="hoten" class="form-label"> Họ Tên </label>
        <input type="text" class="form-control" id="hoten" placeholder ="Hoten" name="fullname">

        </div>

        <div class="mb-3 ">

        <label for="lop" class="form-label"> Địa chỉ </label>
        <input type="text" class="form-control" id="diachi" placeholder ="DiaChi" name="address">

        </div>

        <div class="mb-3 mt-3">

        <label for="email" class="form-label"> Email </label>
        <input type="email" class="form-control" id="email" placeholder ="Email" name="email">

        </div>

        <div class="mb-3 mt-3">
        <label for="comment" class="form-label"> Nội dung liên hệ </label>
        <textarea class="form-control"  rows="5" id="comment" name="content"></textarea>
        </div>

        <button type='submit' class="btn btn-success" name ="submit" style="border-radius:10px">Lấy thông tin</button>
</form>


<?php
    $userid=$name=$address=$email=$comment="";
    if ($_SERVER['REQUEST_METHOD']=='POST')
    {
        $userid=$_POST['userid'];
        $name=$_POST['fullname'];
        $address=$_POST['address'];
        $email=$_POST['email'];
        $comment=$_POST['content'];
    }
?>

<table class="table table-bordered">

    <tr>
        <th>Mã khách hàng</th><td><?= $userid ?></td>
    </tr>

    <tr>
         <th>Họ tên</th><td><?= $name ?></td>
    </tr>

    <tr>
         <th>Địa chỉ</th><td><?= $address ?></td>
    </tr>

    <tr>
         <th>Email</th><td><?= $email ?></td>

    </tr>

    <tr>
         <th>Nội dung liên hệ</th><td><?= $comment ?></td>

    </tr>

</table>



</div>