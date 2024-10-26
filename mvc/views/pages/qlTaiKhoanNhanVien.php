<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Quản Lý Tài Khoản Nhân Viên</title>
    <!-- Thêm liên kết Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h2 class="text-center">Bảng Quản Lý Tài Khoản Nhân Viên</h2>

        <!-- Ô tìm kiếm -->
        <div class="row mb-3">
            <div class="col-md-4">
                <input type="text" id="searchInput" class="form-control" placeholder="Tìm kiếm tài khoản...">
            </div>
        </div>

        <!-- Nút Thêm Tài Khoản -->
        <div class="text-end mb-3">
            <a href="http://localhost/PHP-MVC-MASTER/TaiKhoanNhanVien/FormCreate" class="btn btn-success">Thêm Tài Khoản</a>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                
            
            <th id="sortMaTaiKhoan" style="cursor:pointer;">
                Mã Tài Khoản
                <span id="arrowMaNhanVien" class="sort-arrow"></span>
            </th>
                    <th>Mã Nhân Viên</th>
                    <th id="sortTenTaiKhoan" style="cursor:pointer;">
                Tên Tài Khoản
                <span id="arrowTenNhanVien" class="sort-arrow"></span>
            </th>
                    <th>Mật Khẩu</th>
                    <th>Quyền</th>
                    <th>Chức Năng</th>
                </tr>
            </thead>
            <tbody id="taiKhoanTableBody">
                <?php
                // Giải mã dữ liệu JSON
                $taikhoans = json_decode($data["show"], true);

                // Kiểm tra xem có dữ liệu không
                if (!empty($taikhoans)) {
                    foreach ($taikhoans as $item) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($item['MaTaiKhoan']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['MaNhanVien']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['TenDangNhap']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['MatKhau']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['Quyen']) . "</td>";
                        echo "<td>";
                        echo "<a href='http://localhost/PHP-MVC-MASTER/TaiKhoanNhanVien/FormUpdate/" . htmlspecialchars($item['MaTaiKhoan']) . "' class='btn btn-warning btn-sm'>Sửa</a> ";
                        echo "<a href='http://localhost/PHP-MVC-MASTER/TaiKhoanNhanVien/delete/" . htmlspecialchars($item['MaTaiKhoan']) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Bạn có chắc chắn muốn xóa?\")'>Xóa</a>";
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
        $(document).ready(function () {
    let sortOrder = {
        MaTaiKhoan: "asc",
        TenTaiKhoan: "asc"
    };

    // Chức năng tìm kiếm chỉ tìm theo tên tài khoản
    $("#searchInput").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#taiKhoanTableBody tr").filter(function () {
            $(this).toggle($(this).find("td:eq(2)").text().toLowerCase().indexOf(value) > -1);
        });
    });

    // Sắp xếp theo Mã Tài Khoản
    $("#sortMaTaiKhoan").on("click", function () {
        sortTable(0, "MaTaiKhoan");
    });

    // Sắp xếp theo Tên Tài Khoản
    $("#sortTenTaiKhoan").on("click", function () {
        sortTable(2, "TenTaiKhoan");
    });

    function sortTable(columnIndex, columnKey) {
        var rows = $('#taiKhoanTableBody tr').get();

        rows.sort(function (a, b) {
            var A = $(a).children('td').eq(columnIndex).text().toLowerCase();
            var B = $(b).children('td').eq(columnIndex).text().toLowerCase();

            if (sortOrder[columnKey] === "asc") {
                return A > B ? 1 : -1;
            } else {
                return A < B ? 1 : -1;
            }
        });

        sortOrder[columnKey] = sortOrder[columnKey] === "asc" ? "desc" : "asc";

        $.each(rows, function (index, row) {
            $('#taiKhoanTableBody').append(row);
        });

        // Cập nhật mũi tên
        updateSortArrows(columnIndex);
    }

    function updateSortArrows(columnIndex) {
        // Đặt lại tất cả các mũi tên
        $(".sort-arrow").html("");

        // Cập nhật mũi tên cho cột đã sắp xếp
        if (columnIndex === 0) {
            $("#arrowMaNhanVien").html(sortOrder.MaTaiKhoan === "asc" ? "&#9650;" : "&#9660;");
        } else {
            $("#arrowTenNhanVien").html(sortOrder.TenTaiKhoan === "asc" ? "&#9650;" : "&#9660;");
        }
    }
});

    </script>
</body>

</html>
