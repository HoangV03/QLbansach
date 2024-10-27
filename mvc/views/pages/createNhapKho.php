<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm lô hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Thêm Lô hàng</h2>
        <form method="POST" action="http://localhost/PHP-MVC-MASTER/NhapKho/create">
            <div class="mb-3">
                <label for="MaKho" class="form-label">Mã kho</label>
                <select class="form-control" id="MaKho" name="MaKho" required>
                    <?php
                    // Lấy danh sách danh mục từ cơ sở dữ liệu
                    $khoList = json_decode($data['kho'], true);

                    // Hiển thị các danh mục (TenDanhMuc) trong form
                    foreach ($khoList as $kho) {
                        echo "<option value='" . htmlspecialchars($kho['MaKho'], ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($kho['MaKho'], ENT_QUOTES, 'UTF-8') . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="MaSach" class="form-label">Mã sách</label>
                <select class="form-control" id="MaSach" name="MaSach" required>
                    <?php
                    // Lấy danh sách danh mục từ cơ sở dữ liệu
                    $sachList = json_decode($data['sach'], true);

                    // Hiển thị các danh mục (TenDanhMuc) trong form
                    foreach ($sachList as $sach) {
                        echo "<option value='" . htmlspecialchars($sach['MaSach'], ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($sach['MaSach'], ENT_QUOTES, 'UTF-8') . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="SoLuong" class="form-label">Số lượng</label>
                <input type="number" class="form-control" id="SoLuong" name="SoLuong" placeholder="Nhập số lượng" required>
            </div>

            <div class="mb-3">
                <label for="MaNhaCungCap" class="form-label">Mã nhà cung cấp</label>
                <select class="form-control" id="MaNhaCungCap" name="MaNhaCungCap" required>
                    <?php
                    // Lấy danh sách danh mục từ cơ sở dữ liệu
                    $nhacungcapList = json_decode($data['nha'], true);

                    // Hiển thị các danh mục (TenDanhMuc) trong form
                    foreach ($nhacungcapList as $nha) {
                        echo "<option value='" . htmlspecialchars($nha['MaNhaCungCap'], ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($nha['MaNhaCungCap'], ENT_QUOTES, 'UTF-8') . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="NgayNhap" class="form-label">Ngày Nhập</label>
                <input type="date" class="form-control" id="NgayNhap" name="NgayNhap" required>
            </div>
            <div class="mb-3">
                <label for="DonGia" class="form-label">Đơn giá</label>
                <input type="number" step="0.01" class="form-control" id="DonGia" name="DonGia" required>
            </div>
            <div class="mb-3">
                <label for="MaNhanVien" class="form-label">Mã nhân viên</label>
                <select class="form-control" id="MaNhanVien" name="MaNhanVien" required>
                    <?php
                    // Lấy danh sách danh mục từ cơ sở dữ liệu
                    $nhanvienList = json_decode($data['nhanvien'], true);

                    // Hiển thị các danh mục (TenDanhMuc) trong form
                    foreach ($nhanvienList as $nhanvien) {
                        echo "<option value='" . htmlspecialchars($nhanvien['MaNhanVien'], ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($nhanvien['TenNhanVien'], ENT_QUOTES, 'UTF-8') . "</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Nút thêm sản phẩm -->
            <button type="submit" class="btn btn-primary">Thêm kho</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function back() {
            // Hiển thị thông báo (nếu cần)
            alert("Dữ liệu đã được gửi thành công!");

            // Chuyển hướng về trang trước đó
            window.history.back();
        }
    </script>
</body>

</html>
