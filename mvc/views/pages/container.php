<div class="app__container">
    <div class="grid">
        <div class="grid__row" style="padding-top: 12px;">
            <div class="grid__colume-2">
                <nav class="category">
                    <h3 class="category__heading">
                        <i class="category__heading-icon fa-solid fa-list"></i>
                        DANH MỤC
                    </h3>
                    <ul class="category-list">
                        <?php
                        $menu = json_decode($data["menu"], true);
                        foreach ($menu as $row) {
                            $madanhmuc = $row['MaDanhMuc'];
                            $tendanhmuc = $row["TenDanhMuc"];
                            echo '
                            <li class="category-item category-item--active">
                                <a href="http://localhost/PHP-MVC-MASTER/DanhMuc/show/'.$madanhmuc.'" class="category-item__link">'.$tendanhmuc.'</a>
                            </li>';
                        }

                        ?>
                    </ul>
                </nav>
            </div>
            <div class="grid__colume-10">
                <div class="pages-title">
                    <i class="pages-title__icon fa-solid fa-house"></i>
                    <span class="pages-title__name">Trang chủ</span>
                </div>
                <div class="pages-product">
                    <div class="grid__row">
                        <?php
                        $dl = json_decode($data["sp"], true); // Giải mã dữ liệu sản phẩm
                        if ($data === null || empty($data)) {
                            echo "Không có sản phẩm nào."; // Hiển thị thông báo nếu không có sản phẩm
                        } else {
                            foreach ($dl as $row) {
                                $masach = $row["MaSach"];
                                $tensach = $row["TenSach"];
                                $gia = $row["Gia"];
                                $anh = $row["Anh"];
                                $soluong = $row["SoLuong"];
                                $mota = $row["MoTa"];
                        ?>
                                <div class="grid__colume-2-4">
                                    <div class="pages-product-item">
                                        <a href="http://localhost/PHP-MVC-MASTER/sanpham/detailProdcut/<?php echo $masach ?>">
                                            <div class="pages-product-item__img" style="background-image: url('<?php echo $anh; ?>');"></div>
                                            <h4 class="pages-product-item__name"><?php echo $tensach; ?></h4>
                                            <div class="pages-product-item__price">
                                                <span class="pages-product-item__price-new"><?php echo number_format($gia, 0, ",", "."); ?> đ</span>
                                            </div>
                                            <div class="pages-product-item__action">
                                                <span class="pages-product-item__action-like pages-product-item__action-like--liked">
                                                    <i class="pages-product-item__action-like-icon-empty fa-regular fa-heart"></i>
                                                    <i class="pages-product-item__action-like-icon-fill fa-solid fa-heart" style="color: #ff0000;"></i>
                                                </span>

                                                <div class="pages-product-item__action-rating">
                                                    <i class="pages-product-item__star--gold fa-solid fa-star"></i>
                                                    <i class="pages-product-item__star--gold fa-solid fa-star"></i>
                                                    <i class="pages-product-item__star--gold fa-solid fa-star"></i>
                                                    <i class="pages-product-item__star--gold fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <span class="pages-product-item__sold">88 đã bán</span>
                                            </div>
                                            <div class="pages-product-item__origin">
                                                <span class="pages-product-item__origin-brand">No brand</span>
                                                <span class="pages-product-item__origin-name">Japan</span>
                                            </div>
                                            <div class="pages-product-item__favourite">
                                                <i class="fa-solid fa-check"></i>
                                                <span>Yêu thích</span>
                                            </div>
                                            <div class="pages-product-item__sale-off">
                                                <span class="pages-product-item__sale-off-percent">10%</span>
                                                <span class="pages-product-item__sale-off-lable">GIẢM</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>

                    </div>
                </div>

                <ul class="pagination pages-product__pagination">
                    <?php
                    // Kiểm tra nếu tồn tại 'trang' và 'cur_page'
                    if (isset($data["trang"]) && isset($data["cur_page"])) {
                        $num_page = $data["trang"];
                        $cur_page = $data["cur_page"];

                        // Nút điều hướng về trang đầu tiên
                        if ($cur_page > 3) { ?>
                            <li class="pagination-item">
                                <a href="http://localhost/PHP-MVC-MASTER/home/page/1" class="pagination-item__link">
                                    <i class="pagination-item__icon fa-solid fa-angle-left"></i>
                                </a>
                            </li>
                            <?php }

                        // Hiển thị các trang trong khoảng từ trang hiện tại - 3 đến trang hiện tại + 3
                        for ($num = 1; $num <= $num_page; $num++) {
                            if ($num != $cur_page) {
                                if ($num > $cur_page - 3 && $num < $cur_page + 3) {  ?>
                                    <li class="pagination-item">
                                        <a href="http://localhost/PHP-MVC-MASTER/home/page/<?php echo $num ?>" class="pagination-item__link">
                                            <?php echo $num ?>
                                        </a>
                                    </li>
                                <?php }
                            } else { ?>
                                <li class="pagination-item pagination-item--active">
                                    <a href="http://localhost/PHP-MVC-MASTER/home/page/<?php echo $num ?>" class="pagination-item__link">
                                        <?php echo $num ?>
                                    </a>
                                </li>
                            <?php }
                        }

                        // Nút điều hướng đến trang cuối cùng
                        if ($cur_page <= $num_page - 3) { ?>
                            <li class="pagination-item">
                                <a href="http://localhost/PHP-MVC-MASTER/home/page/<?php echo $num_page ?>" class="pagination-item__link">
                                    <i class="pagination-item__icon fa-solid fa-angle-right"></i>
                                </a>
                            </li>
                    <?php }
                    } // Đóng kiểm tra điều kiện isset()
                    ?>
                </ul>

            </div>
        </div>

    </div>
</div>