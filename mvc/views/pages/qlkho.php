<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý kho</title>
    <!-- Thêm liên kết Bootstrap CSS -->
    <link href="../../../public/custom.css" rel="stylesheet">
    <style>
        #btn-edit {
            margin-right: 15px;
        }
    </style>
</head>

<body>
    <p> </p>
   <!-- Ô tìm kiếm -->
   <div class="row mb-3">
            <div class="col-md-4">
                <input type="text" id="searchInput" class="form-control" placeholder="Tìm kiếm tài khoản...">
            </div>
        </div>
    <div class="container mt-5">
        <h2 class="text-center">Bảng Quản Lý Kho</h2>

        <!-- Nút Thêm Mã Giảm Giá -->
        <div class="text-end mb-3">
            <a href="http://localhost/PHP-MVC-MASTER/Kho/FormCreate" class="btn btn-success">Thêm Kho</a>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Mã Kho</th>
                    <th>Tên Kho</th>
                    <th>Địa điểm</th>
                    <th>Kích thước</th>
                    <th>Chức Năng</th>
                </tr>
            </thead>
            <tbody  id="khoTable">
                <?php
                // Giải mã dữ liệu JSON
                $data = json_decode($data["show"], true);

                // Kiểm tra xem có dữ liệu không
                if (!empty($data)) {
                    foreach ($data as $item) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($item['MaKho']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['TenKho']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['DiaDiem']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['KichThuoc']) . "</td>";
                        echo "<td>";
                        echo "<a  href='http://localhost/PHP-MVC-MASTER/Kho/FormUpdate/" . htmlspecialchars($item['MaKho']) . "' class='btn btn-warning btn-sm' id ='btn-edit'>Sửa</a>";
                        echo "<a href='http://localhost/PHP-MVC-MASTER/Kho/delete/" . htmlspecialchars($item['MaKho']) . "'id ='btn-delete' class='btn btn-danger btn-sm' onclick='return confirm(\"Bạn có chắc chắn muốn xóa?\")'>Xóa</a>";
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
                $("#khoTable tr").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

</html>