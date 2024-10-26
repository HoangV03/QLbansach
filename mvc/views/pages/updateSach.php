<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Sản Phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/PHP-MVC-MASTER/public/css/style2.css">
</head>

<body>
    <?php
    // Giải mã dữ liệu JSON
    $data = json_decode($data["sach"], true);
    // $danhmucList = json_decode($data["danhmucList"], true); // Lấy danh sách danh mục
    foreach ($data as $row) {
        $maSach = $row["MaSach"];
        $maKho = $row["MaKho"];
        $tenSach = $row["TenSach"];
        $tacGia = $row["TacGia"];
        $giaSach = $row["Gia"];
        $soLuong = $row["SoLuong"];
        $hinhAnh = $row["Anh"];
        $moTa = $row["MoTa"];
        $maDanhMuc = $row["MaDanhMuc"]; // Mã danh mục sản phẩm
    }
    ?>
    <div class="container mt-5">
        <h2 class="mb-4">Sửa Sản Phẩm</h2>
        <form method="POST" action="http://localhost/PHP-MVC-MASTER/Sach/update">
            <div class="mb-3">
                <label for="maSach" class="form-label">Mã Sách</label>
                <input type="text" class="form-control" name="maSach" value="<?php echo $maSach ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="maKho" class="form-label">Mã Kho</label>
                <input type="text" class="form-control" name="maKho" value="<?php echo $maKho ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="tenSach" class="form-label">Tên Sách</label>
                <input type="text" class="form-control" name="tenSach" value="<?php echo $tenSach ?>" placeholder="Nhập tên sách">
            </div>
            <div class="mb-3">
                <label for="tacGia" class="form-label">Tác Giả</label>
                <input type="text" class="form-control" name="tacGia" value="<?php echo $tacGia ?>" placeholder="Nhập tên tác giả">
            </div>
            <div class="mb-3">
                <label for="giaSach" class="form-label">Giá Sách</label>
                <input type="number" class="form-control" name="giaSach" value="<?php echo $giaSach ?>" placeholder="Nhập giá sách">
            </div>
            <div class="mb-3">
                <label for="soLuong" class="form-label">Số Lượng</label>
                <input type="number" class="form-control" name="soLuong" value="<?php echo $soLuong ?>" placeholder="Nhập số lượng">
            </div>
            <div class="mb-3">
                <label for="hinhAnh" class="form-label">Hình Ảnh</label>
                <input type="file" class="form-control" name="hinhAnh" value="<?php echo $hinhAnh ?>" placeholder="Nhập tên hình ảnh">
            </div>
            <div class="mb-3">
                <label for="moTa" class="form-label">Mô Tả</label>
                <textarea class="form-control" name="moTa" rows="4" placeholder="Nhập mô tả sản phẩm"><?php echo $moTa; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="maDanhMuc" class="form-label">Danh Mục</label>
                <input type="text" class="form-control" name="maDanhMuc" value="<?php echo $maDanhMuc ?>" placeholder="Nhập danhmucj">
            </div>

            <!-- Nút sửa sản phẩm -->
            <button type="submit" class="btn btn-primary">Cập Nhật Sản Phẩm</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
