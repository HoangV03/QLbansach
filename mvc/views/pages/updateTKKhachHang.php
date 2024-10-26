<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/PHP-MVC-MASTER/public/css/style2.css">
</head>

<body>
    <?php
    $data = json_decode($data["data"], true);
    foreach ($data as $row) {
        $makh = $row['MaKhachHang'];
        $ten = $row["TenKhachHang"];
        $ngaysinh = $row["NgaySinh"];
        $gt = $row["GioiTinh"];
        $sdt = $row["SDT"];
        $diachi = $row["DiaChi"];
        $email = $row["Email"];
        $tendn = $row["TenDangNhap"];
        $mk = $row["MatKhau"];
    }
    ?>
    <div class="container mt-5">
        <h2 class="mb-4">Sửa Tài Khoản Khách Hàng</h2>
        <form method="POST" action="http://localhost/PHP-MVC-MASTER/ADKhachHang/update">
            <div class="mb-3">
                <label for="discountCode" class="form-label">Tên Khách Hàng</label>
                <input type="text" class="form-control" name="namekh" value="<?php echo $ten ?> " placeholder="Nhập họ và tên">
                <input type="hidden" class="form-control" name="makh" value="<?php echo $makh ?> ">
            </div>
            <div class="mb-3">
                <label for="discountName" class="form-label">Ngày Sinh</label>
                <input type="date" class="form-control" name="brith" rows="3" value="<?php echo $ngaysinh ?>">
            </div>
            <div class="mb-3">
                <label for="discountPrice" class="form-label">Giới Tính</label>
                <select class="form-select" name="gender" required>
                    <option value="" disabled selected><?php echo ($gt == "1") ? "Nam" : "Nữ"; ?></option>
                    <option value="1">Nam</option>
                    <option value="0">Nữ</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="productDate" class="form-label">Số Điện Thoại</label>
                <input type="text" class="form-control" value="<?php echo $sdt ?>" name="sdt" placeholder="Nhập số điện thoại">
            </div>
            <div class="mb-3">
                <label for="productDate" class="form-label">Địa Chỉ</label>
                <input type="text" class="form-control" value="<?php echo $diachi ?>" name="add" placeholder="Nhập số điện thoại">
            </div>
            <div class="mb-3">
                <label for="productDate" class="form-label">Email</label>
                <input type="text" class="form-control" value="<?php echo $email ?>" name="email" placeholder="Nhập số điện thoại">
            </div>
            <div class="mb-3">
                <label for="productDate" class="form-label">Tên Đăng Nhập</label>
                <input type="text" class="form-control" value="<?php echo $tendn ?>" name="tdn" placeholder="Nhập tên đăng nhập">
            </div>
            <div class="mb-3">
                <label for="productDate" class="form-label">Mật Khẩu</label>
                <input type="text" class="form-control" value="<?php echo $mk ?>" name="mk" placeholder="Nhập mật khẩu">
            </div>
            <!-- Nút thêm sản phẩm -->
            <button type="submit" class="btn btn-primary">Sửa Thông Tin</button>
            <!-- Nút quay lại -->
            <button type="button" class="btn btn-secondary" onclick="history.back()">Quay lại</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
