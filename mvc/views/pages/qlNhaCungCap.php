<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Quản Lý Nhà Cung Cấp</title>
    <!-- Thêm liên kết Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h2 class="text-center">Bảng Quản Lý Nhà Cung Cấp</h2>
        

        <!-- Nút Thêm Nhà Cung Cấp -->
        <div class="text-end mb-3">
            <a href="http://localhost/PHP-MVC-MASTER/NhaCungCap/FormCreate" class="btn btn-success">Thêm nhà cung cấp</a>
        </div>
<!-- Ô tìm kiếm -->
<div class="row mb-3">
            <div class="col-md-4">
                <input type="text" id="searchInput" class="form-control" placeholder="Tìm kiếm nhà cung cấp...">
            </div>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Mã Nhà Cung Cấp</th>
                    <th>Tên Nhà Cung Cấp</th>
                    <th>Địa Chỉ</th>
                    <th>SDT</th>
                    <th>Email</th>
                    
                </tr>
            </thead>
            <tbody id="NhaCungCapTableBody">
                <?php
                // Giải mã dữ liệu JSON
                $nhacungcaps = json_decode($data["show"], true);

                // Kiểm tra xem có dữ liệu không
                if (!empty($nhacungcaps)) {
                    foreach ($nhacungcaps as $item) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($item['MaNhaCungCap']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['TenNhaCungCap']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['DiaChi']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['SDT']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['Email']) . "</td>";
                        echo "<td>";
                        echo "<a href='http://localhost/PHP-MVC-MASTER/NhaCungCap/FormUpdate/" . htmlspecialchars($item['MaNhaCungCap']) . "' class='btn btn-warning btn-sm'>Sửa</a> ";
                        echo "<a href='http://localhost/PHP-MVC-MASTER/NhaCungCap/delete/" . htmlspecialchars($item['MaNhaCungCap']) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Bạn có chắc chắn muốn xóa?\")'>Xóa</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' class='text-center'>Không có dữ liệu</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Thêm Bootstrap JS và các thư viện cần thiết -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>
        // Chức năng tìm kiếm
        $(document).ready(function () {
            $("#searchInput").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#NhaCungCapTableBody tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

</html>