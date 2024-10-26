<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Quản Lý Đơn Hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <h2 class="text-center">Bảng Quản Lý Đơn Hàng</h2>

        <!-- Form tìm kiếm theo trạng thái và trạng thái thanh toán -->
        <form method="POST" action="">
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="statusFilter" class="form-label">Tìm kiếm theo trạng thái giao hàng:</label>
                    <select id="statusFilter" name="statusFilter" class="form-select">
                        <option value="">Tất cả</option>
                        <option value="0">Chưa Giao</option>
                        <option value="1">Đã Giao</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="paymentStatusFilter" class="form-label">Tìm kiếm theo trạng thái thanh toán:</label>
                    <select id="paymentStatusFilter" name="paymentStatusFilter" class="form-select">
                        <option value="">Tất cả</option>
                        <option value="0">Chưa Thanh Toán</option>
                        <option value="1">Đã Thanh Toán</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </form>

         <!-- Nút xuất Excel trong view quản lý sách -->
         <div class="text-end mb-3">
         <a href='' onclick="xuatexcel()" title='Thêm' class='btn btn-primary'>
         Xuất Excel</a>
    </div>

        <!-- Hiển thị bảng dữ liệu -->
        <table class="table table-bordered table-striped mt-4">
            <thead class="table-dark">
                <tr>
                    <th>Mã Đơn Hàng</th>
                    <th>Mã Khách Hàng</th>
                    <th>Ngày Đặt Hàng</th>
                    <th>Tổng Tiền</th>
                    <th>Trạng Thái</th>
                    <th>Trạng Thái Thanh Toán</th>
                    <th>Ngày Giao Dịch Thanh Toán</th>
                    <th>Ngày Hoàn Thành</th>
                    <th>Chức Năng</th>
                </tr>
            </thead>
            <tbody id="donhangTableBody">
                <?php
                // Giải mã dữ liệu JSON
                $data = json_decode($data["show"], true);

                // Lấy giá trị tìm kiếm từ form
                $statusFilter = isset($_POST['statusFilter']) ? $_POST['statusFilter'] : '';
                $paymentStatusFilter = isset($_POST['paymentStatusFilter']) ? $_POST['paymentStatusFilter'] : '';

                // Kiểm tra xem có dữ liệu không
                if (!empty($data)) {
                    foreach ($data as $item) {
                        // Áp dụng điều kiện lọc trạng thái giao hàng và thanh toán
                        if (($statusFilter === '' || $item['TrangThai'] == $statusFilter) &&
                            ($paymentStatusFilter === '' || $item['TrangThaiTT'] == $paymentStatusFilter)) {
                            
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($item['MaDonHang']) . "</td>";
                            echo "<td>" . htmlspecialchars($item['MaKhachHang']) . "</td>";
                            echo "<td>" . htmlspecialchars($item['NgayDatHang']) . "</td>";
                            echo "<td>" . htmlspecialchars($item['TongTien']) . " VND</td>";
                            echo "<td>" . ($item['TrangThai'] == '0' ? 'Chưa Giao' : 'Đã Giao') . "</td>";
                            echo "<td>" . ($item['TrangThaiTT'] == '0' ? 'Chưa Thanh Toán' : 'Đã Thanh Toán') . "</td>";
                            echo "<td>" . htmlspecialchars($item['NgayGiaoDuKien']) . "</td>";
                            echo "<td>" . htmlspecialchars($item['NgayHoanThanh']) . "</td>";
                            echo "<td>";
                            echo "<a href='http://localhost/PHP-MVC-MASTER/DonHangAD/FormUpdate/" . htmlspecialchars($item['MaDonHang']) . "' class='btn btn-warning btn-sm me-2'>Sửa</a>";
                            echo "<a href='http://localhost/PHP-MVC-MASTER/DonHangAD/delete/" . htmlspecialchars($item['MaDonHang']) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Bạn có chắc chắn muốn xóa?\")'>Xóa</a>";
                            echo "</td>";
                            echo "</tr>";
                        }
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
</body>

</html>

<!-- Sử dụng CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script type="text/javascript">
    function xuatexcel() {
        var name = prompt("Nhập tên file của bạn", "Tên");
        exportData(name, '.xlsx');

    }

    function exportData(name, type) {
        // Lấy bảng customers
        const table = document.getElementById("donhangTableBody");

        // Loại bỏ cột cuối cùng của bảng
        const rows = table.getElementsByTagName("tr");
        for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            if (row.cells.length > 0) {
                row.deleteCell(row.cells.length - 1); // Loại bỏ ô cuối cùng
            }
        }
        // Loại bỏ cột thứ 4, 5 và cột cuối cùng của bảng
        // const rows = table.getElementsByTagName("tr");
        // for (let i = 0; i < rows.length; i++) {
        //     const row = rows[i];
        //     if (row.cells.length >= 5) {
        //         row.deleteCell(4); // Loại bỏ cột 5
        //         row.deleteCell(3); // Loại bỏ cột  4
        //     }
        //     if (row.cells.length > 0) {
        //         row.deleteCell(row.cells.length - 1); // Loại bỏ cột cuối cùng
        //     }
        // }

        // Xuất bảng sang Excel
        const fileName = name + type;
        const wb = XLSX.utils.table_to_book(table);
        XLSX.writeFile(wb, fileName);
    }
</script>

<script src="live/lib/js/sheet.js"></script>

