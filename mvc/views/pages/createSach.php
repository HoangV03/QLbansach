
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sách Mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h2 class="text-center">Thêm Sách Mới</h2>

        <!-- Form Thêm Sách -->
        <form action="http://localhost/PHP-MVC-MASTER/Sach/create" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="MaSach" class="form-label">Mã Sách</label>
                <input type="text" class="form-control" id="MaSach" name="MaSach" required>
            </div>
            <div class="mb-3">
                <label for="TenSach" class="form-label">Tên Sách</label>
                <input type="text" class="form-control" id="TenSach" name="TenSach" required>
            </div>
            <div class="mb-3">
                <label for="Gia" class="form-label">Giá (VND)</label>
                <input type="number" class="form-control" id="Gia" name="Gia" required>
            </div>
            <div class="mb-3">
                <label for="SoLuong" class="form-label">Số Lượng</label>
                <input type="number" class="form-control" id="SoLuong" name="SoLuong" required>
            </div>
            <div class="mb-3">
                <label for="MaDanhMuc" class="form-label">Danh Mục</label>
                <select class="form-control" id="MaDanhMuc" name="MaDanhMuc" required>
                    <?php
                    // Lấy danh sách danh mục từ cơ sở dữ liệu
                    $danhmucList = json_decode($data['danhmuc'], true);

                    // Hiển thị các danh mục (TenDanhMuc) trong form
                    foreach ($danhmucList as $danhmuc) {
                        echo "<option value='" . htmlspecialchars($danhmuc['MaDanhMuc']) . "'>" . htmlspecialchars($danhmuc['TenDanhMuc']) . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="Anh" class="form-label">Hình Ảnh</label>
                <input type="file" class="form-control" id="Anh" name="Anh" required>
            </div>
            <div class="mb-3">
                <label for="MoTa" class="form-label">Mô Tả</label>
                <textarea class="form-control" id="MoTa" name="MoTa" rows="3" required></textarea>
            </div>
            <button type="submit" name="btnsubmit" class="btn btn-primary">Thêm Sách</button>
        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>

