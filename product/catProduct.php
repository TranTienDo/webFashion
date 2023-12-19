<?php
$catId = $_GET['id'];
$sql_cat = "SELECT category_name FROM category WHERE id = $catId";
$resultCat = $f->getOne($sql_cat);
$sql = "SELECT * FROM product WHERE cat_id=$catId";
$result = $f->getAll($sql);
?>

<div class="row px-5 product">
<h1 style="text-align: center;">
    <?= $resultCat['category_name'] ?>
</h1>


<?php
foreach ($result as $value) {
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
}
?>
</div>


