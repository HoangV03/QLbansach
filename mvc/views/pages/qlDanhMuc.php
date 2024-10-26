<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Quản Lý Danh Mục Sách</title>
    <!-- Thêm liên kết Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h2 class="text-center">Bảng Quản Lý Danh Mục Sách</h2>

        <!-- Nút Thêm Danh Mục Mới -->
        <div class="text-end mb-3">
            <a href="http://localhost/PHP-MVC-MASTER/DanhMucAD/FormCreate" class="btn btn-success">Thêm danh mục</a>
        </div>
    <!-- Ô tìm kiếm -->
    <div class="row mb-3">
            <div class="col-md-4">
                <input type="text" id="searchInput" class="form-control" placeholder="Tìm kiếm danh mục...">
            </div>
        </div>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Mã Danh Mục</th>
                    <th>Tên Danh Mục</th>                    
                </tr>
            </thead>
            <tbody id="DanhMucTableBody">
                <?php
                // Giải mã dữ liệu JSON
                $taikhoans = json_decode($data["show"], true);

                // Kiểm tra xem có dữ liệu không
                if (!empty($taikhoans)) {
                    foreach ($taikhoans as $item) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($item['MaDanhMuc']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['TenDanhMuc']) . "</td>";
                        echo "<td>";
                        echo "<a href='http://localhost/PHP-MVC-MASTER/DanhMucAD/FormUpdate/" . htmlspecialchars($item['MaDanhMuc']) . "' class='btn btn-warning btn-sm'>Sửa</a> ";
                        echo "<a href='http://localhost/PHP-MVC-MASTER/DanhMucAD/delete/" . htmlspecialchars($item['MaDanhMuc']) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Bạn có chắc chắn muốn xóa?\")'>Xóa</a>";
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
            $("#DanhMucTableBody tr").filter(function () {
                $(this).toggle($(this).find('td:nth-child(2)').text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
</body>

</html>
