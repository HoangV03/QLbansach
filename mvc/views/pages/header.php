<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="../public/css/style1.css"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./public/font/fontawesome-free-6.6.0-web/css/all.min.css">

</head>

<body>

    <header class="header">
        <div class="grid">
            <nav class="header__navbar">
                <ul class="header__navbar-list">
                    <li class="header__navbar-item header__navbar-item--qr header__navbar-item--separate">
                        Vào cửa hàng trên web SachPhuongNam.com
                        <div class="header__qr">
                            <img src="/php-mvc-master/public/image/QRCode.png" alt="QR_code" class="header__qr-img">
                            <div class="header__qr-apps">
                                <img src="/php-mvc-master/public/image/App_Store.png" alt="App Store" class="header__qr-down-img">
                                <img src="/php-mvc-master/public/image/GG_Play.png" alt="Google Play" class="header__qr-down-img">
                            </div>
                        </div>
                    </li>
                    <li class="header__navbar-item">
                        <span class="header__navbar-title--no-pointer">Kết nối</span>
                        <a href="" class="header__navbar-icon-link">
                            <i class="header__navbar-icon fa-brands fa-facebook"></i>
                        </a>
                        <a href="" class="header__navbar-icon-link">
                            <i class="header__navbar-icon fa-brands fa-instagram"></i>
                        </a>
                    </li>
                </ul>
                <ul class="header__navbar-list">
                    <li class="header__navbar-item header__navbar-item-has-notify">
                        <a href="" class="header__navbar-item-link">
                            <i class="header__navbar-icon fa-regular fa-bell"></i>
                            Thông báo
                        </a>
                        <div class="header__notify">
                            <header class="header__notify-header">
                                <h3>Thông báo mới nhận</h3>
                            </header>
                            <ul class="header__notify-list">
                                <li class="header__notify-item header__notify-item--viewed">
                                    <a href="" class="header__notify-link">
                                        <img src="https://printgo.vn/uploads/media/792227/banner-quang-cao-my-pham-1_1623052752.jpg"
                                            alt="" class="header__notify-img">
                                        <div class="header__notify-info">
                                            <span class="header__notify-name">Mỹ Phẩm chính hãng</span>
                                            <span class="header__notify-description">Mô tả chính hãng</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="header__notify-item .header__notify-item--viewed">
                                    <a href="" class="header__notify-link">
                                        <img src="https://printgo.vn/uploads/media/792227/banner-quang-cao-my-pham-1_1623052752.jpg"
                                            alt="" class="header__notify-img">
                                        <div class="header__notify-info">
                                            <span class="header__notify-name">Mỹ Phẩm chính hãng sản phẩm 100% thảo
                                                dược thiên nhiên</span>
                                            <span class="header__notify-description">Mô tả chính hãng 100% không
                                                chất phụ gia đảm bảo sức khỏe phái đẹp</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="header__notify-item .header__notify-item--viewed">
                                    <a href="" class="header__notify-link">
                                        <img src="https://printgo.vn/uploads/media/792227/banner-quang-cao-my-pham-1_1623052752.jpg"
                                            alt="" class="header__notify-img">
                                        <div class="header__notify-info">
                                            <span class="header__notify-name">Mỹ Phẩm chính hãng</span>
                                            <span class="header__notify-description">Mô tả chính hãng</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="header__notify-footer">
                                <a href="" class="header__notify-footer-btn">Xem tất cả</a>

                            </div>
                        </div>
                    </li>
                    <li class="header__navbar-item">
                        <a href="" class="header__navbar-item-link">
                            <i class="header__navbar-icon fa-regular fa-circle-question"></i>
                            Trợ giúp
                        </a>
                    </li>
                    <?php
                    if (isset($_SESSION['ttuser'])) {
                        // Nếu đã đăng nhập
                    ?>
                        <li class="header__navbar-item header__navbar-user">
                            <img src="https://s.gravatar.com/avatar/76371a4631d79448717e382f6ed2f9d0?s=480&r=pg&d=https%3A%2F%2Fcdn.auth0.com%2Favatars%2Fng.png"
                                alt="" class="header__navbar-user-img">
                            <span class="header__navbar-user-name"><?php echo $_SESSION['ttuser'][5] ?></span>
                            <ul class="header__navbar-user-menu">
                                <li class="header__navbar-user-item">
                                    <a href="#">Tài khoản của tôi</a>
                                </li>
                                <li class="header__navbar-user-item">
                                    <a href="http://localhost/PHP-MVC-MASTER/Cart/detailOder">Đơn mua</a>
                                </li>
                                <li class="header__navbar-user-item header__navbar-user-item--separate">
                                    <a href="http://localhost/PHP-MVC-MASTER/DangNhap/dangxuatAC">Đăng xuất</a>
                                </li>
                            </ul>
                        </li>
                    <?php
                    } else {
                        // Nếu chưa đăng nhập
                    ?>
                        <li class="header__navbar-item">
                            <a href="http://localhost/php-MVC-MASTER/DangNhap/FormDangNhap" class="header__navbar-item-link header__navbar-item-link--strong header__navbar-item--separate">Đăng nhập</a>
                        </li>
                        <li class="header__navbar-item">
                            <a href="http://localhost/PHP-MVC-MASTER/DangKi" class="header__navbar-item-link header__navbar-item-link--strong">Đăng kí</a>
                        </li>
                    <?php
                    }
                    ?>


                </ul>

            </nav>
            <!-- header with search -->
            <div class="header-with-search">
                <div class="header__logo">
                    <a href="http://localhost/PHP-MVC-MASTER/home" class="header__logo-link">
                        <img src="/php-mvc-master/public/image/PN_Home.png" alt="Logo" class="header__logo-img">
                    </a>
                </div>
                <div class="header__search">

                    <div class="header__search-input-wrap">
                        <input type="text" class="header__search-input" id="namesearch" name="namesearch" placeholder="Tìm kiếm sản phẩm">
                        <!-- search history -->
                        <div class="header__search-history">
                            <h3 class="header__search-history-heading">Lịch sử tìm kiếm</h3>
                            <ul class="header__search-history-list">
                                <li class="header__search-history-items">
                                    <a href="">Sách toán</a>
                                </li>
                                <li class="header__search-history-items">
                                    <a href="">Ngữ Văn</a>

                                </li>
                                <li class="header__search-history-items">
                                    <a href="">Tiếng anh</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="header__search-select">
                        <span class="header__search-select-label">Trong shop</span>
                        <i class="header__search-select-icon fa-solid fa-angle-down"></i>
                        <ul class="header__search-option">
                            <li class="header__search-option-item">
                                <span>Trong shop</span>
                                <i class="fa-solid fa-check"></i>
                            </li>
                            <li class="header__search-option-item">
                                <span>Ngoài shop</span>
                                <i class="fa-solid fa-check"></i>
                            </li>
                        </ul>
                    </div>
                    <form action="http://localhost/PHP-MVC-MASTER/home/timkiem" method="POST" id="searchForm">
                        <!-- Ẩn input để lưu giá trị -->
                        <input type="hidden" name="namesearch" id="hiddenSearchInput">

                        <!-- Nút submit -->
                        <button class="header__search-btn" type="submit" name="timkiem" onclick="submitForm()">
                            <i class="header__search-btn-icon fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
                <!-- cart layout -->
                <div class="header__cart">
                    <div class="header__cart-wrap">
                        <a href="http://localhost/PHP-MVC-MASTER/Cart/shoppingcart">

                            <i class="header__cart-icon fa-solid fa-cart-shopping"></i>
                            <span class="header__cart-notice">

                                <?php
                                if (isset($_SESSION['giohang'])) {

                                    echo sizeof($_SESSION['giohang']);
                                } else {
                                    echo 0;
                                }
                                ?>
                            </span>
                        </a>
                        <!-- header__cart-list--no-cart -->
                        <div class="header__cart-list header__cart-list--no-cart">
                            <img src="/php-mvc-master/public/image/no_cart.png" alt="" class="header__cart-list--no-cart-img">
                        </div>
                        <!-- <div class="header__cart-list">
                            <img src="./assets/img/no_cart.png" alt="" class="header__cart-list--no-cart-img">
                            <span class="header__cart-list-msg"></span>

                            <h4 class="header__cart-heading">
                                San pham da them
                            </h4>

                            <ul class="header__cart-list-item">
                                
                                <li class="header__cart-item">
                                    <img src="https://img.abaha.vn/photos/resized/320x/83-1596776828-myphamohui-lgvina.png"
                                        alt="" class="header__cart-img">
                                    <div class="header__cart-item-info">
                                        <div class="header__cart-item-head">
                                            <h5 class="header__cart-item-name">Bo kem dac tri vung mat</h5>
                                            <div class="header__cart-item-price-wrap">
                                                <span class="header__cart-item-price">2.000.000</span>
                                                <span class="header__cart-item-multiply">x</span>
                                                <span class="header__cart-item-qnt">1</span>
                                            </div>
                                        </div>
                                        <div class="header__cart-item-body">
                                            <span class="header__cart-item-decription">Phan loai: Bac</span>
                                            <span class="header__cart-item-remove">Xoa</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <a class="header__cart-view-cart btn btn--primary">Xem gio hang</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </header>

</body>

</html>
<script>
function submitForm() {
    // Lấy giá trị từ input nằm ngoài form
    var searchValue = document.getElementById('namesearch').value;
    
    // Gán giá trị đó cho input ẩn trong form
    document.getElementById('hiddenSearchInput').value = searchValue;
}
</script>