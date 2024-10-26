<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Nhà Cung Cấp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Sửa Thông Tin Nhà Cung Cấp</h2>
        <?php
        $data = json_decode($data["data"], true);
        ?>
        <form action="http://localhost/PHP-MVC-MASTER/NhaCungCap/update" method="POST">
            <input type="hidden" name="MaNhaCungCap" value="<?php echo htmlspecialchars($data[0]['MaNhaCungCap']); ?>">
            <div class="mb-3">
                <label for="TenNhaCungCap" class="form-label">Tên Nhà Cung Cấp</label>
                <input type="text" class="form-control" id="TenNhaCungCap" name="TenNhaCungCap" value="<?php echo htmlspecialchars($data[0]['TenNhaCungCap']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="DiaChi" class="form-label">Địa Chỉ</label>
                <input type="text" class="form-control" id="DiaChi" name="DiaChi" value="<?php echo htmlspecialchars($data[0]['DiaChi']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="SDT" class="form-label">Số Điện Thoại</label>
                <input type="text" class="form-control" id="SDT" name="SDT" value="<?php echo htmlspecialchars($data[0]['SDT']); ?>" required pattern="\d{10}" title="Số điện thoại phải gồm 10 chữ số">
            </div>
            <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <input type="email" class="form-control" id="Email" name="Email" value="<?php echo htmlspecialchars($data[0]['Email']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật Tài Khoản</button>
            <a href="http://localhost/PHP-MVC-MASTER/NhaCungCap/show" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</body>

</html>
