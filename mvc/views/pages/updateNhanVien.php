<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Nhân Viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/PHP-MVC-MASTER/public/css/style2.css">
</head>

<body>
    <?php
    $data = json_decode($data["data"], true);
    foreach ($data as $row) {
        $MaNhanVien = $row["MaNhanVien"];
        $TenNhanVien = $row["TenNhanVien"];
        $NgaySinh = $row["NgaySinh"];
        $GioiTinh = $row["GioiTinh"];
        $QueQuan = $row["QueQuan"];
        $SDT = $row["SDT"];
        $Email = $row["Email"];
        $NgayNhanViec = $row["NgayNhanViec"];
    }
    ?>
    <div class="container mt-5">
        <h2 class="mb-4">Sửa Nhân Viên</h2>
        <form method="POST" action="http://localhost/PHP-MVC-MASTER/NhanVien/update">
            <div class="mb-3">
                <label for="maNhanVien" class="form-label">Mã nhân viên</label>
                <input type="text" class="form-control" name="MaNhanVien" value="<?php echo $MaNhanVien ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="tenNhanVien" class="form-label">Tên nhân viên</label>
                <input class="form-control" name="TenNhanVien" value="<?php echo $TenNhanVien ?>" placeholder="Nhập tên nhân viên">
            </div>
            <div class="mb-3">
                <label for="ngaySinh" class="form-label">Ngày sinh</label>
                <input type="date" class="form-control" name="NgaySinh" value="<?php echo $NgaySinh ?>">
            </div>
            <div class="mb-3">
                <label for="gioiTinh" class="form-label">Giới tính</label>
                <select class="form-select" name="GioiTinh">
                    <option value="1" <?php echo ($GioiTinh == "Nam") ? 'selected' : ''; ?>>Nam</option>
                    <option value="0" <?php echo ($GioiTinh == "Nữ") ? 'selected' : ''; ?>>Nữ</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="queQuan" class="form-label">Quê quán</label>
                <input type="text" class="form-control" name="QueQuan" value="<?php echo $QueQuan ?>" placeholder="Nhập quê quán">
            </div>
            <div class="mb-3">
    <label for="sdt" class="form-label">Số điện thoại</label>
    <input type="text" class="form-control" name="SDT" value="<?php echo $SDT ?>" placeholder="Nhập số điện thoại" 
           required pattern="\d{10}" title="Vui lòng nhập đúng 10 số">
</div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="Email" value="<?php echo $Email ?>" placeholder="Nhập email">
            </div>
            <div class="mb-3">
                <label for="ngayNhanViec" class="form-label">Ngày nhận việc</label>
                <input type="date" class="form-control" name="NgayNhanViec" value="<?php echo $NgayNhanViec ?>">
            </div>

            <!-- Nút sửa nhân viên -->
            <button type="submit" class="btn btn-primary">Sửa Nhân Viên</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
