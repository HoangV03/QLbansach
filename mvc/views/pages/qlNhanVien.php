<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Quản Lý Nhân Viên</title>
    <!-- Thêm liên kết Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h2 class="text-center">Bảng Quản Lý Nhân Viên</h2>

        <!-- Ô tìm kiếm -->
        <div class="row mb-3">
            <div class="col-md-4">
                <input type="text" id="searchInput" class="form-control" placeholder="Tìm kiếm nhân viên...">
            </div>
        </div>

        <!-- Nút Thêm Nhân Viên -->
        <div class="text-end mb-3">
            <a href="http://localhost/PHP-MVC-MASTER/NhanVien/FormCreate" class="btn btn-success">Thêm Nhân Viên</a>
        </div>
        <div class="text-end mb-3">
         <a href='' onclick="xuatexcel()" title='Thêm' class='btn btn-primary'>
         Xuất Excel</a>
    </div>
        <table class="table table-bordered table-striped">
        <thead class="table-dark">
                <tr>
                <th id="sortMaNhanVien" style="cursor:pointer;">
                Mã Nhân Viên
                <span id="arrowMaNhanVien" class="sort-arrow"></span>
            </th>
            <th id="sortTenNhanVien" style="cursor:pointer;">
                Tên Nhân Viên
                <span id="arrowTenNhanVien" class="sort-arrow"></span>
            </th>
                    <th>Ngày Sinh</th>
                    <th>Giới Tính</th>
                    <th>Quê Quán</th>
                    <th>Số Điện Thoại</th>
                    <th>Email</th>
                    <th>Ngày Nhận Việc</th>
                    <th>Chức Năng</th>
                </tr>
            </thead>
            <tbody id="nhanVienTableBody">
                <?php
                // Giải mã dữ liệu JSON
                $nhanviens = json_decode($data["show"], true);

                // Kiểm tra xem có dữ liệu không
                if (!empty($nhanviens)) {
                    foreach ($nhanviens as $item) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($item['MaNhanVien']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['TenNhanVien']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['NgaySinh']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['GioiTinh']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['QueQuan']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['SDT']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['Email']) . "</td>";
                        echo "<td>" . htmlspecialchars($item['NgayNhanViec']) . "</td>";
                        echo "<td>";
                        echo "<a href='http://localhost/PHP-MVC-MASTER/NhanVien/FormUpdate/" . htmlspecialchars($item['MaNhanVien']) . "' class='btn btn-warning btn-sm'>Sửa</a> ";
                        echo "<a href='http://localhost/PHP-MVC-MASTER/NhanVien/delete/" . htmlspecialchars($item['MaNhanVien']) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Bạn có chắc chắn muốn xóa?\")'>Xóa</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9' class='text-center'>Không có dữ liệu</td></tr>";
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
                MaNhanVien: "asc",
                TenNhanVien: "asc"
            };

            // Chức năng tìm kiếm chỉ tìm theo tên nhân viên
            $("#searchInput").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#nhanVienTableBody tr").filter(function () {
                    $(this).toggle($(this).find("td:eq(1)").text().toLowerCase().indexOf(value) > -1);
                });
            });

            // Sắp xếp theo Mã Nhân Viên
            $("#sortMaNhanVien").on("click", function () {
                sortTable(0);
            });

            // Sắp xếp theo Tên Nhân Viên
            $("#sortTenNhanVien").on("click", function () {
                sortTable(1);
            });

            function sortTable(columnIndex) {
    var rows = $('#nhanVienTableBody tr').get();

    rows.sort(function (a, b) {
        var A = $(a).children('td').eq(columnIndex).text();
        var B = $(b).children('td').eq(columnIndex).text();

        if (columnIndex === 0) {
            A = parseInt(A, 10);
            B = parseInt(B, 10);
        }

        if (sortOrder[columnIndex === 0 ? "MaNhanVien" : "TenNhanVien"] === "asc") {
            return A > B ? 1 : -1;
        } else {
            return A < B ? 1 : -1;
        }
    });

    sortOrder[columnIndex === 0 ? "MaNhanVien" : "TenNhanVien"] =
        sortOrder[columnIndex === 0 ? "MaNhanVien" : "TenNhanVien"] === "asc" ? "desc" : "asc";

    $.each(rows, function (index, row) {
        $('#nhanVienTableBody').append(row);
    });

    // Cập nhật mũi tên
    updateSortArrows(columnIndex);
}

function updateSortArrows(columnIndex) {
    // Đặt lại tất cả các mũi tên
    $(".sort-arrow").html("");

    // Cập nhật mũi tên cho cột đã sắp xếp
    if (columnIndex === 0) {
        $("#arrowMaNhanVien").html(sortOrder.MaNhanVien === "asc" ? "&#9650;" : "&#9660;");
    } else {
        $("#arrowTenNhanVien").html(sortOrder.TenNhanVien === "asc" ? "&#9650;" : "&#9660;");
    }
}
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script type="text/javascript">
    function xuatexcel() {
        var name = prompt("Nhập tên file của bạn", "Tên");
        exportData(name, '.xlsx');

    }

    function exportData(name, type) {
        // Lấy bảng customers
        const table = document.getElementById("nhanVienTableBody");

        // Loại bỏ cột cuối cùng của bảng
        const rows = table.getElementsByTagName("tr");
        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            if (row.cells.length > 0) {
                row.deleteCell(row.cells.length - 1); // Loại bỏ ô cuối cùng
            }
        }
        // Xuất bảng sang Excel
        const fileName = name + type;
        const wb = XLSX.utils.table_to_book(table);
        XLSX.writeFile(wb, fileName);
    }
</script>

<script src="live/lib/js/sheet.js"></script>
</body>

</html>
