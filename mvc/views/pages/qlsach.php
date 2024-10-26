<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Quản Lý Sách</title>
    <!-- Thêm liên kết Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h2 class="text-center">Bảng Quản Lý Sách</h2>

        <!-- Ô tìm kiếm -->
        <div class="row mb-3">
            <div class="col-md-4">
                <input type="text" id="searchInput" class="form-control" placeholder="Tìm kiếm sách...">
            </div>
        </div>

        <!-- Nút Thêm Sách -->
        <div class="text-end mb-3">
            <a href="http://localhost/PHP-MVC-MASTER/Sach/FormCreate" class="btn btn-success">Thêm Sách</a>
        </div>

         <!-- Nút xuất Excel trong view quản lý sách -->
         <div class="text-end mb-3">
            <a href="http://localhost/PHP-MVC-MASTER/Sach/exportExcel" class="btn btn-primary">Xuất Excel</a>
        </div>
    </div>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Mã Sách</th>
                    <th>Tên Sách</th>
                    <th>Giá (VND)</th>
                    <th>Số Lượng</th>
                    <th>Hình Ảnh</th>
                    <th>Mô Tả</th>
                    <th>Danh Mục</th>
                    <th>Chức Năng</th>
                </tr>
            </thead>
            <tbody id="sachTableBody">
                <?php
                // Giải mã dữ liệu JSON
                $sachs = json_decode($data["show"], true);

                // Kiểm tra xem có dữ liệu không
                if (!empty($sachs)) {
                    foreach ($sachs as $item) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($item['MaSach']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['TenSach']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['Gia']) . " VND</td>";
                        echo "<td>" . htmlspecialchars($item['SoLuong']) . "</td>";
                        echo "<td><img src='/php-mvc-master/public/image/" . htmlspecialchars($item['Anh']) . "' width='50'></td>";
                        echo "<td>" . htmlspecialchars($item['MoTa']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['MaDanhMuc']) . "</td>";
                        echo "<td>";
                        echo "<a href='http://localhost/PHP-MVC-MASTER/Sach/FormUpdate/" . htmlspecialchars($item['MaSach']) . "' class='btn btn-warning btn-sm'>Sửa</a> ";
                        echo "<a href='http://localhost/PHP-MVC-MASTER/Sach/delete/" . htmlspecialchars($item['MaSach']) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Bạn có chắc chắn muốn xóa?\")'>Xóa</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center'>Không có dữ liệu</td></tr>";
                }
                ?>
            </tbody>
        </table>


    <!-- Thêm Bootstrap JS và các thư viện cần thiết -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script>
        // Chức năng tìm kiếm
        $(document).ready(function () {
            $("#searchInput").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#sachTableBody tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

</html>