<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Kho</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Thêm Kho</h2>
        <form method="POST" action="http://localhost/PHP-MVC-MASTER/Kho/create">
            <div class="mb-3">
                <label for="MaKho" class="form-label">Mã Kho</label>
                <input type="text" class="form-control" name="MaKho" placeholder="Nhập mã kho">
            </div>
            <div class="mb-3">
                <label for="TenKho" class="form-label">Tên kho</label>
                <input class="form-control" name="TenKho" rows="3" placeholder="Nhập tên kho"></input>
            </div>
            <div class="mb-3">
                <label for="DiaDiem" class="form-label">Địa điểm</label>
                <input class="form-control" name="DiaDiem" placeholder="Nhập Địa Điểm">
            </div>

            <div class="mb-3">
                <label for="productDate" class="form-label">Kích thước</label>
                <input class="form-control" name="KichThuoc">
            </div>
            <!-- Nút thêm sản phẩm -->
            <button onclick="back()" type="submit" class="btn btn-primary">Thêm kho</button>
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