<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail - Shopee Style</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-title {
            font-size: 1.75rem;
            font-weight: bold;
        }

        .product-price {
            font-size: 2rem;
            color: #ee4d2d;
        }

        .original-price {
            text-decoration: line-through;
            color: #999;
            margin-left: 10px;
        }

        .discount-label {
            background-color: #ff424e;
            color: white;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 0.875rem;
        }

        .shipping-info,
        .rating-info {
            margin-top: 20px;
        }

        .buy-now-btn {
            background-color: #ff424e;
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 1.25rem;
            width: 200px;
            margin-right: 10px;
        }

        .cart-now-btn {
            background-color: #ff424e;
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 1.25rem;
            width: 200px;
        }

        .btn-item {
            display: flex;
        }
    </style>
</head>

<body>
    
    <?php
    $dulieu = json_decode($data["detailSP"], true);
    foreach ($dulieu as $row) {
        $masach = $row["MaSach"];
        $tensach = $row["TenSach"];
        $gia = $row["Gia"];
        $anh = $row["Anh"];
        $soluong = $row["SoLuong"];
        $mota = $row["MoTa"];
    }
    ?>

    <div class="container mt-5">
        <div class="row">
            <!-- Hình ảnh sản phẩm -->
            <div class="col-md-5">
                <img src="<?php echo $anh ?>" class="img-fluid" alt="Product Image">
            </div>

            <!-- Thông tin sản phẩm -->
            <div class="col-md-7">
                <h1 class="product-title"><?php echo $tensach ?></h1>

                <div class="d-flex align-items-center">
                    <span class="product-price"><?php echo number_format($gia, 0, ",", "."); ?> đ</span>
                    <!-- <span class="original-price">$99.99</span>
                <span class="discount-label">Giảm 20%</span> -->
                </div>

                <p class="text-muted mt-3">Mô tả ngắn gọn về sản phẩm, liệt kê các ưu điểm nổi bật.</p>

                <!-- Lựa chọn số lượng và nút mua hàng -->

                <form action="http://localhost/PHP-MVC-MASTER/Cart/checkpaycart" method="POST">
                    <div class="form-group mb-4">
                        <label for="quantity" class="form-label">Số lượng:</label>
                        <input type="number" name="soluong[]" class="form-control w-25" id="quantity" value="1" min="1" max="<?php echo $soluong ?>">
                    </div>
                    <input type="hidden" name="masach[]" value="<?php echo $masach ?>">
                    <input type="hidden" name="tensach[]" value="<?php echo $tensach ?>">
                    <input type="hidden" name="anh[]" value="<?php echo $anh ?>">
                    <input type="hidden" name="totalsp[]" value="<?php echo $soluong ?>">
                    <input type="hidden" name="gia[]" value="<?php echo $gia ?>">
                    <div class="btn-item">
                        <button type="submit" name="buynow" class="buy-now-btn">Mua ngay</button>
                        <button type="submit" name="addcart" class="cart-now-btn">Giỏ hàng</button>
                    </div>
                </form>
                <!-- Thông tin vận chuyển và đánh giá -->
                <div class="shipping-info mt-4">
                    <h5>Thông tin vận chuyển</h5>
                    <p>Giao hàng dự kiến: 3 - 5 ngày làm việc</p>
                </div>

                <div class="rating-info mt-4">
                    <h5>Đánh giá sản phẩm</h5>
                    <!-- <p>4.8 / 5 từ 500 đánh giá</p> -->
                </div>
            </div>
        </div>

        <!-- Thông tin thêm về sản phẩm -->
        <div class="row mt-5">
            <div class="col-md-12">
                <h3>Mô tả chi tiết sản phẩm</h3>
                <p>Nội dung mô tả chi tiết hơn về sản phẩm, bao gồm thông số kỹ thuật, kích thước, chất liệu, tính năng. <br>
                    <?php echo $mota ?>
                </p>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5.3 scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>