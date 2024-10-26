<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Giao Diện Thanh Toán</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <?php
  // var_dump($_SESSION["thanhtoan"]);
  $info = json_decode($data["info"], true);
  foreach ($info as $row) {
    $tenkh = $row["TenKhachHang"];
    $email = $row["Email"];
    $diachi = $row["DiaChi"];
    $sdt = $row["SDT"];
  }
  function showbill()
  {
    $totalAllPrice = 0;

    // Duyệt qua từng sản phẩm trong session thanhtoan
    for ($i = 0; $i < sizeof($_SESSION["thanhtoan"]); $i++) {
      // Tính tổng giá cho từng sản phẩm
      $totalprice = $_SESSION["thanhtoan"][$i]['gia'] * $_SESSION["thanhtoan"][$i]['soluong'];

      // Cộng tổng tiền vào tổng tất cả sản phẩm
      $totalAllPrice += $totalprice;

      // In ra từng dòng của hóa đơn
      echo '
            <tr>
                <td>' . htmlspecialchars($_SESSION["thanhtoan"][$i]['tensach']) . '</td>
                <td>' . htmlspecialchars($_SESSION["thanhtoan"][$i]['soluong']) . '</td>
                <td>' . number_format($_SESSION["thanhtoan"][$i]['gia'], 0, ',', '.') . 'đ</td>
                <td>' . number_format($totalprice, 0, ',', '.') . 'đ</td>
            </tr>
        ';
    }

    // Trả về tổng tiền của tất cả các sản phẩm
    return $totalAllPrice;
  }

  ?>

  <div class="container mt-5">
    <h2 class="text-center mb-4">Thông Tin Thanh Toán</h2>
    <form action="http://localhost/PHP-MVC-MASTER/Cart/completepay" method="POST">
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="fullname" class="form-label">Họ và tên</label>
          <input type="text" class="form-control" id="fullname" name="tenkh" value="<?php echo htmlspecialchars($tenkh) ?>" placeholder="Nhập họ và tên">
        </div>
        <div class="col-md-6">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email) ?>" placeholder="Nhập email">
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label for="phone" class="form-label">Số điện thoại</label>
          <input type="text" class="form-control" id="phone" name="sdt" value="<?php echo htmlspecialchars($sdt) ?>" placeholder="Nhập số điện thoại">
        </div>
        <div class="col-md-6">
          <label for="address" class="form-label">Địa chỉ</label>
          <input type="text" class="form-control" id="address" name="diachi" value="<?php echo htmlspecialchars($diachi) ?>" placeholder="Nhập địa chỉ">
        </div>
      </div>

      <h4 class="mt-4">Sản phẩm đã chọn</h4>
      <div class="table-responsive mb-4">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Tên sản phẩm</th>
              <th>Số lượng</th>
              <th>Giá</th>
              <th>Tổng</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (isset($_SESSION['thanhtoan']) && !empty($_SESSION['thanhtoan'])) {
              // Session tồn tại và có dữ liệu
              $totalAllPrice = showbill();
            } else {
              echo '<tr><td colspan="4" class="text-center">Không có sản phẩm nào trong giỏ hàng để thanh toán.</td></tr>';
            }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <th colspan="3" class="text-end">Tổng cộng</th>
              <th><?php echo number_format($totalAllPrice, 0, ',', '.') . 'đ'; ?></th>
              <input type="hidden" name="totailtt" value="<?php echo $totalAllPrice?>">
              <?php //echo "son". var_dump($totalAllPrice);
              //exit();
              ?>
            </tr>
          </tfoot>
        </table>
      </div>

      <h4>Phương thức thanh toán</h4>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="paymentMethod" id="cod" checked>
        <label class="form-check-label" for="cod">
          Thanh toán khi nhận hàng
        </label>
      </div>
      <!-- <div class="form-check">
        <input class="form-check-input" type="radio" name="paymentMethod" id="creditCard">
        <label class="form-check-label" for="creditCard">
          Thẻ tín dụng / Ghi nợ
        </label>
      </div> -->

      <div class="d-grid mt-4">
        <button type="submit" class="btn btn-primary btn-lg" name="completett" style="margin-bottom:30px;">Hoàn tất thanh toán</button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>