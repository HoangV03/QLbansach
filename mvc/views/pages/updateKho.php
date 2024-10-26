<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/PHP-MVC-MASTER/public/css/style2.css">

</head>

<body>
    <?php
    $data = json_decode($data["data"], true);
    foreach ($data as $row) {
        $makho = $row["MaKho"];
        $tenkho = $row["TenKho"];
        $diadiem = $row["DiaDiem"];
        $kichthuoc = $row["KichThuoc"];
    }
    ?>
    <div class="container mt-5">
        <h2 class="mb-4">Sửa thông tin kho</h2>
        <form method="POST" action="http://localhost/PHP-MVC-MASTER/Kho/update">
            <div class="mb-3">
                <label for="MaKho" class="form-label">Mã kho</label>
                <input type="text" class="form-control" name="MaKho" value="<?php echo $makho ?> " placeholder="Nhập mã kho">
            </div>
            <div class="mb-3">
                <label for="TenKho" class="form-label">Tên kho</label>
                <input class="form-control" name="TenKho" rows="3" value="<?php echo $tenkho ?>" placeholder="Nhập tên kho">
            </div>
            <div class="mb-3">
                <label for="DiaDiem" class="form-label">Địa điểm</label>
                <input class="form-control" name="DiaDiem" value="<?php echo $diadiem ?>" placeholder="Nhập địa điểm">
            </div>

            <div class="mb-3">
                <label for="KichThuoc" class="form-label">Kích thước</label>
                <input class="form-control" value="<?php echo $kichthuoc ?>" name="KichThuoc">
            </div>



            <!-- Nút thêm sản phẩm -->
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>