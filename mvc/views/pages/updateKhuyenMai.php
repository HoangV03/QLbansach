<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Mã Giảm Giá</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/PHP-MVC-MASTER/public/css/style2.css">
</head>

<body>
    <?php
    $data = json_decode($data["data"], true);
    foreach ($data as $row) {
        $magiamgia = $row["MaKM"];
        $tengiamgia = $row["TenKM"];
        $sotien = $row["SoTien"];
        $tungay = $row["TuNgay"];
        $denngay = $row["DenNgay"];
    }
    ?>
    <div class="container mt-5">
        <h2 class="mb-4">Sửa Mã Giảm Giá</h2>
        <form method="POST" action="http://localhost/PHP-MVC-MASTER/KhuyenMai/update">
            <div class="mb-3">
                <label for="discountCode" class="form-label">Mã giảm giá</label>
                <input type="text" class="form-control" name="discountCode" value="<?php echo $magiamgia ?>" placeholder="Nhập mã giảm giá">
            </div>
            <div class="mb-3">
                <label for="discountName" class="form-label">Tên mã giảm giá</label>
                <input class="form-control" name="discountName" rows="3" value="<?php echo $tengiamgia ?>" placeholder="Nhập tên mã giảm giá">
            </div>
            <div class="mb-3">
                <label for="discountPrice" class="form-label">Số tiền</label>
                <input type="number" class="form-control" name="discountPrice" value="<?php echo $sotien ?>" placeholder="Nhập số tiền">
            </div>
            <div class="mb-3">
                <label for="startDate" class="form-label">Từ ngày</label>
                <input type="date" class="form-control" value="<?php echo $tungay ?>" name="startDate">
            </div>
            <div class="mb-3">
                <label for="endDate" class="form-label">Đến ngày</label>
                <input type="date" class="form-control" value="<?php echo $denngay ?>" name="endDate">
            </div>

            <!-- Nút sửa sản phẩm -->
            <button type="submit" class="btn btn-primary">Sửa Sản Phẩm</button>
            <!-- Nút quay lại -->
            <button type="button" class="btn btn-secondary" onclick="history.back()">Quay lại</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
