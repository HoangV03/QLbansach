<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Đơn Hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost/PHP-MVC-MASTER/public/css/style2.css">
</head>

<body>
    <!-- Kiểm tra và hiển thị thông báo lỗi nếu có -->
    <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?php 
                echo $_SESSION['error']; 
                unset($_SESSION['error']); // Xóa lỗi sau khi hiển thị
                ?>
            </div>
        <?php endif; ?>


    <?php
    // Giải mã dữ liệu JSON
    $data = json_decode($data["donhang"], true);
    foreach ($data as $row) {
        $maDonHang = $row["MaDonHang"];
        $maKhachHang = $row["MaKhachHang"];
        $ngayDatHang = $row["NgayDatHang"];
        $tongTien = $row["TongTien"];
        $trangThai = $row["TrangThai"];
        $trangThaiTT = $row["TrangThaiTT"];
        $ngayGiaoDich = $row["NgayGiaoDuKien"];
        $ngayHoanThanh = $row["NgayHoanThanh"];
    }
    ?>
    <div class="container mt-5">
        <h2 class="mb-4">Sửa Đơn Hàng</h2>
        <form method="POST" action="http://localhost/PHP-MVC-MASTER/DonHangAD/update">
            <div class="mb-3">
                <label for="maDonHang" class="form-label">Mã Đơn Hàng</label>
                <input type="text" class="form-control" name="maDonHang" value="<?php echo $maDonHang ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="maKhachHang" class="form-label">Mã Khách Hàng</label>
                <input type="text" class="form-control" name="maKhachHang" value="<?php echo $maKhachHang ?>" placeholder="Nhập mã khách hàng">
            </div>
            <div class="mb-3">
                <label for="ngayDatHang" class="form-label">Ngày Đặt Hàng</label>
                <input type="date" class="form-control" name="ngayDatHang" value="<?php echo $ngayDatHang ?>" placeholder="Chọn ngày đặt hàng">
            </div>
            <div class="mb-3">
                <label for="tongTien" class="form-label">Tổng Tiền</label>
                <input type="number" class="form-control" name="tongTien" value="<?php echo $tongTien ?>" placeholder="Nhập tổng tiền">
            </div>
            <div class="mb-3">
                <label for="trangThai" class="form-label">Trạng Thái</label>
                <select class="form-select" name="trangThai" aria-label="Trạng Thái">
                    <option value="0" <?php echo $trangThai == '0' ? 'selected' : ''; ?>>Chưa Giao</option>
                    <option value="1" <?php echo $trangThai == '1' ? 'selected' : ''; ?>>Đã Giao</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="trangThaiTT" class="form-label">Trạng Thái Thanh Toán</label>
                <select class="form-select" name="trangThaiTT" aria-label="Trạng Thái Thanh Toán">
                    <option value="0" <?php echo $trangThaiTT == '0' ? 'selected' : ''; ?>>Chưa Thanh Toán</option>
                    <option value="1" <?php echo $trangThaiTT == '1' ? 'selected' : ''; ?>>Đã Thanh Toán</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="ngayGiaoDich" class="form-label">Ngày Giao Dịch Thanh Toán</label>
                <input type="date" class="form-control" name="ngayGiaoDich" value="<?php echo $ngayGiaoDich ?>">
            </div>
            <div class="mb-3">
                <label for="ngayHoanThanh" class="form-label">Ngày Hoàn Thành</label>
                <input type="date" class="form-control" name="ngayHoanThanh" value="<?php echo $ngayHoanThanh ?>">
            </div>

            <!-- Nút sửa đơn hàng -->
            <button type="submit" class="btn btn-primary">Cập Nhật Đơn Hàng</button>
        </form>
    </div>

    <!-- Thêm JavaScript để kiểm tra trạng thái thanh toán và khóa trạng thái giao hàng -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const paymentStatus = document.getElementById("trangThaiTT");
            const orderStatus = document.getElementById("trangThai");

            // Hàm kiểm tra trạng thái thanh toán và điều chỉnh trạng thái giao hàng
            function checkPaymentStatus() {
                if (paymentStatus.value == '0') { // Chưa thanh toán
                    orderStatus.disabled = true; // Khóa trạng thái giao hàng
                } else {
                    orderStatus.disabled = false; // Mở khóa trạng thái giao hàng
                }
            }

            // Kiểm tra trạng thái thanh toán khi tải trang
            checkPaymentStatus();

            // Lắng nghe sự thay đổi của trạng thái thanh toán
            paymentStatus.addEventListener("change", checkPaymentStatus);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

