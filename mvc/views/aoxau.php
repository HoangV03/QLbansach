<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/php-mvc-master/public/css/style2.css">

    <!-- <link rel="stylesheet" href="./PHAT/public/css/base.css"> -->
</head>

<body>
<?php
    if (!isset($_SESSION['data'])) {
        header("location:http://localhost/PHP-MVC-MASTER/dangnhap/FormDangNhapAdmin");
        
    }
    
 ?>
    <div class="wapper__bigger">
        <div class="d-flex" id="wrapper">
            <!-- Sidebar -->
            <div class="bg-dark border-end" id="sidebar-wrapper">
                <div class="sidebar-heading text-white py-4 px-3">Admin Panel</div>
                <div class="list-group list-group-flush">
                    <a href="http://localhost/PHP-MVC-MASTER/homeAD/sayhi" class="list-group-item list-group-item-action bg-dark text-white">Trang chủ</a>
                    <a href="http://localhost/PHP-MVC-MASTER/Kho/show" class="list-group-item list-group-item-action bg-dark text-white">Quản lý kho</a>
                    <a href="http://localhost/PHP-MVC-MASTER/NhapKho/show" class="list-group-item list-group-item-action bg-dark text-white">Quản lý nhập kho</a>
                    <a href="http://localhost/PHP-MVC-MASTER/DonHangAD/Show" class="list-group-item list-group-item-action bg-dark text-white">Quản lý đơn hàng</a>
                    <!-- <a href="http://localhost/PHP-MVC-MASTER/QuanLyKho/show" class="list-group-item list-group-item-action bg-dark text-white">Quản lý kho</a> -->
                    <a href="http://localhost/PHP-MVC-MASTER/DanhMucAD/show" class="list-group-item list-group-item-action bg-dark text-white">Quản lý danh mục sách</a>
                    <a href="http://localhost/PHP-MVC-MASTER/NhaCungCap/show" class="list-group-item list-group-item-action bg-dark text-white">Quản lý nhà cung cấp</a>
                    <a href="http://localhost/PHP-MVC-MASTER/ADKhachHang/show" class="list-group-item list-group-item-action bg-dark text-white">Quản lý Khách Hàng</a>
                    <a href="http://localhost/PHP-MVC-MASTER/Sach/show" class="list-group-item list-group-item-action bg-dark text-white">Quản lý sách</a>
                    <a href="http://localhost/PHP-MVC-MASTER/KhuyenMai/show" class="list-group-item list-group-item-action bg-dark text-white">Khuyến mãi</a>
                    <?php
                                           
                        if($_SESSION['data'][4] == "0"){
                            echo'<a href="http://localhost/PHP-MVC-MASTER/NhanVien/Show" class="list-group-item list-group-item-action bg-dark text-white">Quản lý nhân viên</a>';
                            echo'<a href="http://localhost/PHP-MVC-MASTER/TaiKhoanNhanVien/Show" class="list-group-item list-group-item-action bg-dark text-white">Quản lý tài khoản nhân viên</a>';
                        }
                    ?>
                    

                </div>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>
                        <div class="collapse navbar-collapse">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item">
                                    <span class="nav-link">Xin chào, Admin</span>
                                </li>
                                <li class="nav-item">
                                    <a href="http://localhost/PHP-MVC-MASTER/DangNhap/dangxuatAD" class="btn btn-danger">Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="container-fluid">  
                    <?php             
                if (isset($data["page"])) {
                    require_once "pages/" . $data["page"] . ".php";
                }else{
                        echo "Dữ liệu trang không hợp lệ.";
                        var_dump($data); // Debug giá trị $data
                }
                ?>
                </div>
            </div>
            <!-- /#page-content-wrapper -->
        </div>
    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle the menu on click
        document.getElementById("menu-toggle").addEventListener("click", function() {
            document.getElementById("wrapper").classList.toggle("toggled");
        });
    </script>
</body>

</html>