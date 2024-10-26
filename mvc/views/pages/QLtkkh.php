<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Tài Khoản Khách Hàng</title>
    <!-- Thêm liên kết Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h2 class="text-center">Bảng Quản Lý Tài Khoản Khách Hàng</h2>

        <!-- Tìm kiếm và nút Thêm Mã Giảm Giá -->
        <div class="row mb-3">
            <div class="col-md-9">
                <form action="http://localhost/PHP-MVC-MASTER/ADKhachHang/timkiem" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Tìm kiếm khách hàng...">
                        <button class="btn btn-primary" type="submit" name="timkiemkh">Tìm kiếm</button>
                    </div>
                </form>
            </div>
            <!-- <div class="col-md-3 text-end">
                <a href="http://localhost/PHP-MVC-MASTER/ADKhachHang/FormCreate" class="btn btn-success w-100">Thêm Mã Giảm Giá</a>
            </div> -->
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Mã Khách Hàng</th>
                    <th>Tên Khách Hàng</th>
                    <th>Ngày Sinh</th>
                    <th>Giới Tính</th>
                    <th>Số Điện Thoại</th>
                    <th>Địa Chỉ</th>
                    <th>Email</th>
                    <th>Tên Đăng Nhập</th>
                    <th>Mật Khẩu</th>
                    <th>Chức Năng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Giải mã dữ liệu JSON
                $data = json_decode($data["show"], true);

                // Kiểm tra xem có dữ liệu không
                if (!empty($data)) {
                    foreach ($data as $item) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($item['MaKhachHang']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['TenKhachHang']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['NgaySinh']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['GioiTinh']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['SDT']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['DiaChi']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['Email']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['TenDangNhap']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['MatKhau']) . "</td>";
                        echo "<td>";
                        echo "<a href='http://localhost/PHP-MVC-MASTER/ADKhachHang/FormUpdate/" . htmlspecialchars($item['MaKhachHang']) . "' class='btn btn-warning btn-sm'>Sửa</a>";
                        echo "<a href='http://localhost/PHP-MVC-MASTER/ADKhachHang/delete/" . htmlspecialchars($item['MaKhachHang']) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Bạn có chắc chắn muốn xóa?\")'>Xóa</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='10' class='text-center'>Không có dữ liệu</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Thêm Bootstrap JS và các thư viện cần thiết -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
