<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8f9fa; /* Màu nền nhẹ */
        }
        .login-container {
            width: 500px;
            padding: 20px;
            border: 1px solid #ced4da; /* Đường viền */
            border-radius: 5px; /* Bo góc */
            background-color: white; /* Màu nền của form */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Đổ bóng nhẹ */
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="mb-4 text-center">Đăng Nhập Trang Quản Lý</h2>
        <form method="POST" action="http://localhost/php-MVC-MASTER/DangNhap/dangnhapAdmin">
            <div class="mb-3">
                <label for="username" class="form-label">Tên Đăng Nhập</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Nhập tên đăng nhập" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật Khẩu</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Đăng Nhập</button>
            <div class="mt-3 text-center">
                <!-- <a href="http://localhost/PHP-MVC-MASTER/DangKi">Chưa có tài khoản? Đăng ký ngay</a> -->
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
