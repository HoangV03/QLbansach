<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật Lô hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/PHP-MVC-MASTER/public/css/style2.css">

</head>

<body>
    <?php
    $data = json_decode($data["data"], true);
    foreach ($data as $row) {
        $malohang = $row["MaLoHang"];
        $makho = $row["MaKho"];
        $soluongnhap = $row["SoLuongNhap"];
        $manhacungcap = $row["MaNhaCungCap"];
        $ngaynhap = $row["NgayNhap"];
        $dongia = $row["DonGia"];
    }
    ?>
    <div class="container mt-5">
        <h2 class="mb-4">Sửa thông tin lô hàng</h2>
        <form method="POST" action="http://localhost/PHP-MVC-MASTER/NhapKho/update">
            <div class="mb-3">
                <label for="MaLoHang" class="form-label">Mã lô hàng</label>
                <input readonly type="text" class="form-control" name="MaLoHang" value="<?php echo $malohang ?> ">
            </div>
            <div class="mb-3">
                <label for="MaKho" class="form-label">Tên kho</label>
                <input class="form-control" name="MaKho" rows="3" value="<?php echo $makho ?>" placeholder="Nhập mã kho">
            </div>
            <div class="mb-3">
                <label for="SoLuongNhap" class="form-label"></label>
                <input type="number" class="form-control" name="SoLuongNhap" value="<?php echo $soluongnhap ?>" placeholder="Nhập số lượng">
            </div>

            <div class="mb-3">
                <label for="MaNhaCungCap" class="form-label">Mã nhà cung cấp</label>
                <input class="form-control" value="<?php echo $manhacungcap ?>" name="MaNhaCungCap">
            </div>

            <div class="mb-3">
                <label for="NgayNhap" class="form-label">Ngày nhập </label>
                <input class="form-control" value="<?php echo $ngaynhap ?>" name="NgayNhap" type="date">
            </div>

            <div class="mb-3">
                <label for="DonGia" class="form-label">Đơn giá</label>
                <input class="form-control" value="<?php echo $dongia ?>" name="DonGia">
            </div>



            <!-- Nút thêm sản phẩm -->
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>