<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Danh Mục</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center">Thêm Danh Mục</h2>
        <form action="http://localhost/PHP-MVC-MASTER/DanhMuc/create" method="POST">
            <div class="mb-3">
                <label for="MaDanhMuc" class="form-label">Mã Danh Mục</label>
                <input type="text" class="form-control" id="MaDanhMuc" name="MaDanhMuc" required>
            </div>
            <div class="mb-3">
                <label for="TenDanhMuc" class="form-label">Tên Danh Mục</label>
                <input type="text" class="form-control" id="TenDanhMuc" name="TenDanhMuc" required>
            </div>
            <button type="submit" class="btn btn-primary">Thêm Danh Mục</button>
            <a href="http://localhost/PHP-MVC-MASTER/DanhMuc/show" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</body>

</html>
