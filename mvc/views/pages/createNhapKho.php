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
                <label for="MaLoHang" class="form-label">Mã Lô Hàng</label>
                <input type="text" class="form-control" name="MaLoHang" placeholder="Nhập mã lô hàng">
            </div>
            <div class="mb-3">
                <label for="MaKho" class="form-label">Mã kho</label>
                <input class="form-control" name="MaKho" rows="3" placeholder="Nhập mã kho"></input>
            </div>
            <div class="mb-3">
                <label for="SoLuongNhap" class="form-label">Số lượng</label>
                <input class="form-control" name="SoLuongNhap" placeholder="Nhập số lượng">
            </div>

            <div class="mb-3">
                <label for="MaNhaCungCap" class="form-label">Mã nhà cung cấp</label>
                <input class="form-control" name="MaNhaCungCap">
            </div>
            <div class="mb-3">
                <label for="NgayNhap" class="form-label">Ngày Nhập</label>
                <input type="date" class="form-control" name="NgayNhap">
            </div>
            <div class="mb-3">
                <label for="DonGia" class="form-label">Đơn giá</label>
                <input class="form-control" name="DonGia">
            </div>
            <!-- Nút thêm sản phẩm -->
            <button type="submit" class="btn btn-primary">Thêm kho</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<script>
    function back() {
        // Hiển thị thông báo (nếu cần)
        alert("Dữ liệu đã được gửi thành công!");

        // Chuyển hướng về trang trước đó
        window.location.href = "index.php";
    }
</script>