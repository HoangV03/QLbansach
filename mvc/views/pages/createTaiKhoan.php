<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Tài Khoản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Thêm Tài Khoản Nhân Viên</h2>
        <form action="http://localhost/PHP-MVC-MASTER/TaiKhoanNhanVien/create" method="POST" onsubmit="prependNV();">
            <div class="mb-3">
                <label for="MaTaiKhoan" class="form-label">Mã Tài Khoản</label>
                <div class="input-group">
                    <span class="input-group-text">NV</span>
                    <input type="text" class="form-control" id="MaTaiKhoan" name="MaTaiKhoan" placeholder="Chỉ nhập số" required pattern="\d*" title="Chỉ nhập số" maxlength="5">
                </div>
            </div>
            <div class="mb-3">
                <label for="MaNhanVien" class="form-label">Mã Nhân Viên</label>
                <input type="text" class="form-control" id="MaNhanVien" name="MaNhanVien" required>
            </div>
            <div class="mb-3">
                <label for="TenDangNhap" class="form-label">Tên Tài Khoản</label>
                <input type="text" class="form-control" id="TenDangNhap" name="TenDangNhap" required>
            </div>
            <div class="mb-3">
                <label for="MatKhau" class="form-label">Mật Khẩu</label>
                <input type="text" class="form-control" id="MatKhau" name="MatKhau" required>
            </div>
            <div class="mb-3">
                <label for="Quyen" class="form-label">Quyền</label>
                <select class="form-select" id="Quyen" name="Quyen" required>
                    <option value="1">Người Quản Trị</option>
                    <option value="0">Người Dùng</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Thêm Tài Khoản</button>
            <a href="http://localhost/PHP-MVC-MASTER/TaiKhoanNhanVien/Show" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>

    <script>
        // Chặn ký tự không phải số ở phần Mã Tài Khoản
        document.getElementById('MaTaiKhoan').addEventListener('input', function (e) {
            this.value = this.value.replace(/\D/g, ''); // Chỉ cho phép nhập số
        });

        // Hàm thêm tiền tố NV vào trước giá trị trước khi submit
        function prependNV() {
            var maTaiKhoanInput = document.getElementById('MaTaiKhoan');
            if (maTaiKhoanInput.value) {
                maTaiKhoanInput.value = 'NV' + maTaiKhoanInput.value; // Thêm tiền tố NV
            }
        }
    </script>

</body>

</html>
