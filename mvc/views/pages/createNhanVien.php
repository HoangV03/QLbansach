<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Nhân Viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Thêm Nhân Viên</h2>
        <form method="POST" action="http://localhost/PHP-MVC-MASTER/NhanVien/create">
            <div class="mb-3">
    <label for="MaNhanVien" class="form-label">Mã Nhân Viên</label>
    <input type="number" class="form-control" name="MaNhanVien" placeholder="Nhập mã nhân viên" required 
           min="0" pattern="\d*" title="Vui lòng nhập số hợp lệ">
</div>
            <div class="mb-3">
                <label for="TenNhanVien" class="form-label">Tên Nhân Viên</label>
                <input type="text" class="form-control" name="TenNhanVien" placeholder="Nhập tên nhân viên" required>
            </div>
            <div class="mb-3">
                <label for="NgaySinh" class="form-label">Ngày Sinh</label>
                <input type="date" class="form-control" name="NgaySinh" required>
            </div>
            <div class="mb-3">
                <label for="GioiTinh" class="form-label">Giới Tính</label>
                <select class="form-control" name="GioiTinh" required>
                    <option value="1">Nam</option>
                    <option value="0">Nữ</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="QueQuan" class="form-label">Quê Quán</label>
                <input type="text" class="form-control" name="QueQuan" placeholder="Nhập quê quán" required>
            </div>
            <div class="mb-3">
    <label for="SDT" class="form-label">Số Điện Thoại</label>
    <input type="text" class="form-control" name="SDT" placeholder="Nhập số điện thoại" required 
           pattern="\d{10}" title="Vui lòng nhập đúng 10 số">
</div>
            <div class="mb-3">
                <label for="NgayNhanViec" class="form-label">Ngày Nhận Việc</label>
                <input type="date" class="form-control" name="NgayNhanViec" required>
            </div>

            <!-- Nút thêm nhân viên -->
            <button type="submit" class="btn btn-primary">Thêm Nhân Viên</button>
        </form>
    </div> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>