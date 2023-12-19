<style>
    h1 {
        text-align: center;
        text-transform: uppercase;
        font-family: 'Lobster', 'cursive';
    }
</style>
<div class="NameProduct">
    <h1>sản phẩm mới</h1>
</div>

<?php
$sql_new = "SELECT * FROM product ORDER BY create_at DESC LIMIT 4";
$result_new = $f->getAll($sql_new);
foreach ($result_new as $value):
    ?>
    <div class="col-md-3" style="max-width: 25%; padding: 20px;">
        <img class="card-img-top" src="asset/images/<?= $value['image'] ?>" alt="hinh anh"
            style="width: 100%; object-fit: cover;">

        <div class="card-body">
            <h4 class="card-title">
                <?= $value['name'] ?>
            </h4>

            <div class="price-section">
                <?php if ($value['sale_price'] > $value['price']): ?>
                    <p class="card-text sale-price float-end"><del>
                            <?= formatPrice($value['sale_price']) ?>
                        </del> </p>

                    <p class="card-text original-price  ">
                        <?= formatPrice($value['price']) ?>
                    </p>
                <?php else: ?>
                    <p class="card-text">
                        <?= formatPrice($value['price']) ?>
                    </p>
                <?php endif; ?>
            </div>

            <div style="margin-top: 20px;" class="chiTiet_GioHang">
                <a style="text-decoration: none" href="<?= PATH ?>page=detail&id=<?= $value['id'] ?>"
                    class="badge rounded-pill bg-primary">Chi tiết</a>
                <a style="text-decoration: none ;" href="#" class="badge rounded-pill bg-primary float-end">Thêm vào giỏ
                </a>
            </div>
        </div>
    </div>

    <?php
endforeach
?>

<div class="NameProduct">
    <h1>sản phẩm Khuyến mãi</h1>
</div>
<?php
$sql_sale = "SELECT * FROM product WHERE is_on_sale = 1 ORDER BY create_at DESC LIMIT 4";

$result_sale = $f->getAll($sql_sale);
foreach ($result_sale as $value):
    ?>
    <div class="col-md-3" style="max-width: 25%; padding: 20px;">
        <img class="card-img-top" src="asset/images/<?= $value['image'] ?>" alt="hinh anh"
            style="width: 100%; object-fit: cover;">

        <div class="card-body">
            <h4 class="card-title">
                <?= $value['name'] ?>
            </h4>

            <div class="price-section">
                <?php if ($value['sale_price'] > $value['price']): ?>
                    <p class="card-text sale-price float-end"><del>
                            <?= formatPrice($value['sale_price']) ?>
                        </del> </p>

                    <p class="card-text original-price  ">
                        <?= formatPrice($value['price']) ?>
                    </p>
                <?php else: ?>
                    <p class="card-text">
                        <?= formatPrice($value['price']) ?>
                    </p>
                <?php endif; ?>
            </div>

            <div style="margin-top: 20px;" class="chiTiet_GioHang">
                <a style="text-decoration: none" href="<?= PATH ?>page=detail&id=<?= $value['id'] ?>"
                    class="badge rounded-pill bg-primary">Chi tiết</a>
                <a style="text-decoration: none ;" href="#" class="badge rounded-pill bg-primary float-end">Thêm vào giỏ
                </a>
            </div>
        </div>
    </div>
    <?php
endforeach;
?>
<div class="NameProduct">
    <h1>sản phẩm được xem nhiều nhất</h1>
</div>
<?php
$sql_most_viewed = "SELECT * FROM product ORDER BY view DESC LIMIT 4";
$result_most_viewed = $f->getAll($sql_most_viewed);
foreach ($result_most_viewed as $value):
    ?>
    <div class="col-md-3" style="max-width: 25%; padding: 20px;">
        <img class="card-img-top" src="asset/images/<?= $value['image'] ?>" alt="hinh anh"
            style="width: 100%; object-fit: cover;">

        <div class="card-body">
            <h4 class="card-title">
                <?= $value['name'] ?>
            </h4>

            <div class="price-section">
                <?php if ($value['sale_price'] > $value['price']): ?>
                    <p class="card-text sale-price float-end"><del>
                            <?= formatPrice($value['sale_price']) ?>
                        </del> </p>

                    <p class="card-text original-price  ">
                        <?= formatPrice($value['price']) ?>
                    </p>
                <?php else: ?>
                    <p class="card-text">
                        <?= formatPrice($value['price']) ?>
                    </p>
                <?php endif; ?>
            </div>

            <div style="margin-top: 20px;" class="chiTiet_GioHang">
                <a style="text-decoration: none" href="<?= PATH ?>page=detail&id=<?= $value['id'] ?>"
                    class="badge rounded-pill bg-primary">Chi tiết</a>
                <a style="text-decoration: none ;" href="#" class="badge rounded-pill bg-primary float-end">Thêm vào giỏ
                </a>
            </div>
        </div>
    </div>
    <?php
endforeach;
?>