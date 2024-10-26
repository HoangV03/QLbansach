<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Tài Khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Sửa Tài Khoản Nhân Viên</h2>
        <?php
        $data = json_decode($data["data"], true);
        ?>
        <form action="http://localhost/PHP-MVC-MASTER/TaiKhoanNhanVien/update" method="POST">
            <input type="hidden" name="MaTaiKhoan" value="<?php echo htmlspecialchars($data[0]['MaTaiKhoan']); ?>">
            <div class="mb-3">
                <label for="MaNhanVien" class="form-label">Mã Nhân Viên</label>
                <input type="text" class="form-control" id="MaNhanVien" name="MaNhanVien" value="<?php echo htmlspecialchars($data[0]['MaNhanVien']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="TenDangNhap" class="form-label">Tên Tài Khoản</label>
                <input type="text" class="form-control" id="TenDangNhap" name="TenDangNhap" value="<?php echo htmlspecialchars($data[0]['TenDangNhap']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="MatKhau" class="form-label">Mật Khẩu</label>
                <input type="text" class="form-control" id="MatKhau" name="MatKhau" value="<?php echo htmlspecialchars($data[0]['MatKhau']); ?>" required>
            </div>
            
            <div class="mb-3">
                <label for="Quyen" class="form-label">Quyền</label>
                <select class="form-select" id="Quyen" name="Quyen" required>
                    <option value="0" <?php if ($data[0]['Quyen'] == 0) echo 'selected'; ?>>Người dùng</option>
                    <option value="1" <?php if ($data[0]['Quyen'] == 1) echo 'selected'; ?>>Quản trị viên</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật Tài Khoản</button>
            <a href="http://localhost/PHP-MVC-MASTER/TaiKhoanNhanVien/Show" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</body>

</html>
