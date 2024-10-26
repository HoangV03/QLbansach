<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng đã mua</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
$order = json_decode($data["order"], true);  
$detail = json_decode($data["DetailOr"], true);  

function show($order, $detail) {
    foreach ($order as $row) {
        $madonhang = $row["MaDonHang"];
        echo '
            <div class="order-item mb-5">
            <h5 class="text-dark">Chi tiết đơn hàng ' . $madonhang . '</h5> 
            <table class="table table-bordered">
                <thead>
                    <tr>                  
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Tổng cộng</th>
                    </tr>
                </thead>
                <tbody>';

        $tongdon = 0;  
        foreach ($detail as $item) {
            if($item["MaDonHang"] === $madonhang){

                $tensach = $item["TenSach"];
                $soluong = $item["SoLuong"];
                $gia = $item["Gia"];
                $tongsp = $soluong * $gia;  
                echo '
                <tr>
                    <td>' . $tensach . '</td>
                    <td>' . $soluong . '</td>
                    <td>' . number_format($gia, 0, ',', '.') . ' VND</td>
                    <td>' . number_format($tongsp, 0, ',', '.') . ' VND</td>
                </tr>';
                $tongdon += $tongsp;
            }
        }
        echo '
                </tbody>
            </table>
            <div class="text-end">
                <strong>Tổng tiền: ' . number_format($tongdon, 0, ',', '.') . ' VND</strong>
            </div>
        </div>';
    }
}
?>

<div class="container mt-5">
    <h2 class="mb-4">Chi tiết các đơn hàng đã mua</h2>


    <div class="order-details">
        <?php show($order,$detail)?>
        <!-- <div class="order-item mb-5">
            <h5 class="text-dark">Chi tiết đơn hàng DH001</h5> 
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Tổng cộng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Sản phẩm A</td>
                        <td>2</td>
                        <td>500,000 VND</td>
                        <td>1,000,000 VND</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Sản phẩm B</td>
                        <td>1</td>
                        <td>1,000,000 VND</td>
                        <td>1,000,000 VND</td>
                    </tr>
                </tbody>
            </table>
            <div class="text-end">
                <strong>Tổng tiền: 2,000,000 VND</strong>
            </div>
        </div>        -->


        <!-- Bạn có thể thêm các đơn hàng khác tương tự -->
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
