<!DOCTYPE html>
<html>

<head>
    <title>OnlineShop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/styleCuaTao.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



    

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');
    </style>

</head>

<!-- <body> -->
<div class="container-fluid border-warning">
    <div class="row bg-white">
        <div class="col-md-4">
            <div class="logo py-2"><img src="asset/images/logo.png" /></div>
        </div>
        <div class="col-md-4 pt-3">
            <form action="<?= PATH ?>page=search">
                <div class="input-group">
                    <input type="hidden" name="page" value="search">
                    <input type="text" class="form-control" placeholder="Search products" name="product">
                    <input type="submit" class="btn btn-success" />
                </div>
            </form>

        </div>

        <div class="col-md-4 text-end pt-3">
            <!-- kiểm tra đăng nhập -->
            <?php

            if (!isset($_SESSION['user'])) {
                echo "<a href='' class='btn border'>
                    <i class='fas fa-user-alt text-success'></i>
                    <span class='badge text-black'></span>
                </a>";
            } else {
                echo " <a href='' class='btn border'>
                    <i class='fas fa-user-alt text-success'></i>
                    <span class='badge text-black'>" . $_SESSION['user'] . "</span>
                </a>";
            }
            ?>

            <!-- cart -->
            <a href="<?= PATH ?>page=cart" class="btn border">
                <i class="fas fa-shopping-cart text-success"></i>
                <span class="badge text-black">0</span>
            </a>
        </div>
    </div>
    <div class="row header">

        <div class="concac"  onclick="test()">
            <i  class="fa-solid fa-bars"></i>
        </div>

        <div class="navbar col-md-12 show" > 
            <ul>
                <li class="active"><a href="<?= PATH ?>">Trang chủ</a></li>
                <li><a href="<?= PATH ?>page=product">Shop</a>
                    <ul>
                        <?php
                        $sql = "SELECT * FROM category";
                        $result = $f->getAll($sql);
                        foreach ($result as $c):
                            ?>
                            <li style="font-size: 12px;"><a href="<?= PATH ?>page=catProduct&id=<?= $c['id'] ?>">
                                    <?= $c['category_name'] ?>
                                </a></li>

                        <?php endforeach ?>
                    </ul>
                </li>
                <li><a href="">Blog</a></li>
                <li><a href="<?= PATH ?>page=contact">Liên hệ</a></li>
                <li><a href="<?= PATH ?>page=registration">Đăng ký</a></li>
                <?php

                if (!isset($_SESSION['user'])) {

                    echo "<li><a href='" . PATH . "page=login'>Đăng nhập</a></li>";
                } else {
                    echo " <li><a href='" . PATH . "page=doLogout'>Đăng xuất</a></li>";
                }
                ?>
                <!-- <li><a href="<?= PATH ?>page=login">Đăng nhập</a></li>
                <li><a href="">Đăng xuất</a></li> -->
                <li><a href="">Tài khoản</a></li>
            </ul>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-md-12 banner">
            <img src="asset/images/banner.jpg" />
        </div>
    </div> -->
    <!-- Carousel -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="asset/images/banner.jpg" alt="banner" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="asset/images/banner.jpg" alt="banner 2" class="d-block w-100">
            </div>
            <div class="carousel-item">
                <img src="asset/images/banner.jpg" alt="banner 3" class="d-block w-100">
            </div>
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>