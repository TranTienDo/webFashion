<style>
    h1 {
        text-align: center;
        text-transform: uppercase;
        font-family: 'Lobster', 'cursive';
    }
</style>

<?php 
if (isset($_GET['product'])) {

    $search = $_GET['product'];


    $sql = "SELECT * FROM product WHERE name LIKE '%$search%'";
    $result = $f->getAll($sql);

    $searchResults = [];


    if ($result) {
        foreach ($result as $product) {
            $searchResults[] = $product;
        }
    }
}

if (!empty($searchResults)) {
    echo "<h4>Kết quả tìm kiếm cho sản phẩm có tên '$search':<br></h4>";
   echo"<h1> $search </h1>";
    foreach ($searchResults as $result) {
?>

    <div class="col-md-3" style="max-width: 25%; padding: 20px;">
        <img class="card-img-top" src="asset/images/<?= $result['image'] ?>" alt="hinh anh"
            style="width: 100%; object-fit: cover;">

        <div class="card-body">
            <h4 class="card-title">
                <?= $result['name'] ?>
            </h4>

            <div class="price-section">
                <?php if ($result['sale_price'] > $result['price']): ?>
                    <p class="card-text sale-price float-end"><del>
                            <?= formatPrice($result['sale_price']) ?>
                        </del> </p>

                    <p class="card-text original-price  ">
                        <?= formatPrice($result['price']) ?>
                    </p>
                <?php else: ?>
                    <p class="card-text">
                        <?= formatPrice($result['price']) ?>
                    </p>
                <?php endif; ?>
            </div>

            <div style="margin-top: 20px;" class="chiTiet_GioHang">
                <a style="text-decoration: none" href="<?= PATH ?>page=detail&id=<?= $result['id'] ?>"
                    class="badge rounded-pill bg-primary">Chi tiết</a>
                <a style="text-decoration: none ;" href="#" class="badge rounded-pill bg-primary float-end">Thêm vào giỏ
                </a>
            </div>
        </div>
    </div>
<?php
}
} else {
echo "<h3>Không tìm thấy sản phẩm nào phù hợp.</h3>";
}
?>