<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Thêm Tài Khoản Khách Hàng</h2>
        <form method="POST" action="http://localhost/PHP-MVC-MASTER/KhuyenMai/create">
            <div class="mb-3">
                <label for="discountCode" class="form-label">Mã giảm giá</label>
                <input type="text" class="form-control" name="discountCode" placeholder="Nhập mã giảm giảm">
            </div>
            <div class="mb-3">
                <label for="discountName" class="form-label">Tên mã giảm giá</label>
                <input class="form-control" name="discountName" rows="3" placeholder="Nhập tên mã giảm giá"></input>
            </div>
            <div class="mb-3">
                <label for="discountPrice" class="form-label">Số tiền</label>
                <input type="number" class="form-control" name="discountPrice" placeholder="Nhập Số tiền">
            </div>
            
            <div class="mb-3">
                <label for="productDate" class="form-label">Từ ngày</label>
                <input type="date" class="form-control" name="startDate">
            </div>
            <div class="mb-3">
                <label for="productDate" class="form-label">Đến ngày</label>
                <input type="date" class="form-control" name="endDate">
            </div>
           

            <!-- Nút thêm sản phẩm -->
            <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
        </form>
    </div> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
