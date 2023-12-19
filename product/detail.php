<?php
$id = $_GET['id'];
$sql_view="UPDATE product SET view =view +1 WHERE id=$id";
$f->setQuery($sql_view);
$sql = "SELECT * FROM product WHERE id=$id ";
$result = $f->getOne($sql);


?>

<div class="row px-5 product">
    <div style="max-width:60%;" class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <img src="asset/images/<?= $result['image'] ?>" alt="hinh anh" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h2 class="mb-4">
                    <?= $result['name'] ?>
                </h2>

                <div class="container mt-5">
                    <div class="row">
                        <div class="col-md-8">
                            <!-- Other content in this column -->

                            <!-- Rating and Reviews Section -->
                            <div style="object-fit: cover" class="d-flex mb-3">
                                <div class="rating">
                                    <span class="star" data-rating="1"><i class="fas fa-star"></i></span>
                                    <span class="star" data-rating="2"><i class="fas fa-star"></i></span>
                                    <span class="star" data-rating="3"><i class="fas fa-star"></i></span>
                                    <span class="star" data-rating="4"><i class="fas fa-star"></i></span>
                                    <span class="star" data-rating="5"><i class="fas fa-star"></i></span>
                                </div>
                                <small class="pt-1 ml-2">(50 Reviews)</small>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- Sidebar or other content in this column -->
                        </div>
                    </div>
                </div>
                <p>
                    <?= $result['description'] ?>
                </p>
                <p><strong>Giá:</strong>
                    <?= formatPrice($result['price']) ?>
                </p>

                <div class="container mt-5">
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input style="max-height:29px" type="text" class="form-control text-center" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

                <button type="button" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Thêm vào Giỏ
                    Hàng</button>
            </div>
        </div>

    </div>
</div>



<script>
    $(document).ready(function () {
        var ngoiSao = 0;

        $('.star').on('mouseenter', function () {
            var rating = $(this).data('rating');
            // Tô màu những ngôi sao trước ngôi sao được hover
            $('.star').css('color', 'grey');
            $(this).prevAll('.star').addBack().css('color', 'yellow');
        });

        $('.star').on('mouseleave', function () {
            // Nếu người dùng không nhấp vào bất kỳ ngôi sao nào, hủy bỏ tất cả màu
            if (ngoiSao === 0) {
                $('.star').css('color', 'grey');
            } else {
                // Nếu có ngôi sao đã được đánh giá, tô màu những ngôi sao đã được đánh giá
                $('.star').slice(0, ngoiSao).css('color', 'yellow');
                $('.star').slice(ngoiSao).css('color', 'grey');
            }
        });

        $('.star').on('click', function () {
            var rating = $(this).data('rating');
            ngoiSao = rating;
            // Tô màu những ngôi sao đã được đánh giá và thông báo
            $('.star').slice(0, ngoiSao).css('color', 'yellow');
            // alert('Bạn đã đánh giá ' + rating + ' sao. Cám ơn!');
            // Ở đây, bạn có thể thực hiện ajax request để gửi thông tin đánh giá lên máy chủ.
        });
    });
</script>