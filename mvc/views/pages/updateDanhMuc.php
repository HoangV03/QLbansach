<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Danh Mục</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Sửa Thông Tin Danh Mục</h2>
        <?php
        $data = json_decode($data["data"], true);
        ?>
        <form action="http://localhost/PHP-MVC-MASTER/DanhMucAD/update" method="POST">
            <input type="hidden" name="MaDanhMuc" value="<?php echo htmlspecialchars($data[0]['MaDanhMuc']); ?>">
            <div class="mb-3">
                <label for="TenDanhMuc" class="form-label">Tên Nhà Cung Cấp</label>
                <input type="text" class="form-control" id="TenDanhMuc" name="TenDanhMuc" value="<?php echo htmlspecialchars($data[0]['TenDanhMuc']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật Danh Mục</button>
            <a href="http://localhost/PHP-MVC-MASTER/DanhMucAD/show" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</body>

</html>
