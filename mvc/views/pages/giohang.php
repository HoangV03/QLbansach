<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <?php
  // function showsp()
  // {
  //   $totalAll = 0;
  //   for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
  //     $total_per_item = $_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3];
  //     $totalAll = $totalAll + $total_per_item;
  //     echo '
  //       <tr>
  //               <td>
  //                 <input type="checkbox" name="selected_products[]" value="'.$i.'">
  //               </td>
  //               <td>
  //                 <div class="d-flex align-items-center">
  //                   <img src="'. $_SESSION['giohang'][$i][0] .'" class="img-fluid me-3" alt="Product Image" width="50" height="50">
  //                   <span>'. $_SESSION['giohang'][$i][1] .'</span>
  //                   <input type="hidden" name="product_name[]" value="'.$_SESSION['giohang'][$i][1].'">
  //                 </div>
  //               </td>
  //               <td>'. number_format($_SESSION['giohang'][$i][2], 0, ",", ".") .' đ
  //                   <input type="hidden" name="product_price[]" value="'.$_SESSION['giohang'][$i][2].'">
  //                   <input type="hidden" name="product_code[]" value="'.$_SESSION['giohang'][$i][4].'">
  //               </td>
  //               <td>
  //                 <input type="number" class="form-control" name="product_quantity[]" value="'. $_SESSION['giohang'][$i][3] .'" min="1" max="'. $_SESSION['giohang'][$i][5] .'" style="width: 80px;">
  //               </td>
  //               <td>'. number_format($total_per_item, 0, ",", ".") .' đ</td>
  //               <td>
  //                 <a href="http://localhost/PHP-MVC-MASTER/Cart/removecart/'.$i.'" class="btn btn-danger btn-sm" style="align-content: center;">Remove</a>
  //               </td>
  //       </tr>';
  //   }
  //   return $totalAll;
  // }
  
//   function showsp() {
//     $totalAll = 0;
//     for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
//         // Tính tổng cho từng mặt hàng
//         var_dump($_SESSION['giohang']);
//         $total_per_item = $_SESSION['giohang'][$i][2][0] * $_SESSION['giohang'][$i][3][0];
//         $totalAll += $total_per_item; // Cộng dồn tổng
//         echo '
//             <tr>
//                 <td>
//                     <input type="checkbox" name="selected_products[]" value="' . $i . '">
//                 </td>
//                 <td>
//                     <div class="d-flex align-items-center">
//                         <img src="' . $_SESSION['giohang'][$i][0][0] . '" class="img-fluid me-3" alt="Product Image" width="50" height="50">
//                         <span>' . $_SESSION['giohang'][$i][1][0] . '</span>
//                         <input type="hidden" name="product_name[]" value="' . $_SESSION['giohang'][$i][1][0] . '">
//                     </div>
//                 </td>
//                 <td>' . number_format($_SESSION['giohang'][$i][2][0], 0, ",", ".") . ' đ
//                     <input type="hidden" name="product_price[]" value="' . $_SESSION['giohang'][$i][2][0] . '">
//                     <input type="hidden" name="product_code[]" value="' . $_SESSION['giohang'][$i][4][0] . '">
//                 </td>
//                 <td>
//                     <input type="number" class="form-control" name="product_quantity[]" value="' . $_SESSION['giohang'][$i][3][0] . '" min="1" max="' . $_SESSION['giohang'][$i][5][0] . '" style="width: 80px;">
//                 </td>
//                 <td>' . number_format($total_per_item, 0, ",", ".") . ' đ</td>
//                 <td>
//                     <a href="http://localhost/PHP-MVC-MASTER/Cart/removecart/' . $i . '" class="btn btn-danger btn-sm" style="align-content: center;">Remove</a>
//                 </td>
//             </tr>';
//     }
//     return $totalAll;
// }
function showsp() {
  $totalAll = 0;
  for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
      // Tính tổng cho từng mặt hàng
      var_dump($_SESSION['giohang']);
      $total_per_item = $_SESSION['giohang'][$i][2][0] * $_SESSION['giohang'][$i][3]; // Sửa dòng này
      $totalAll += $total_per_item; // Cộng dồn tổng
      echo '
          <tr>
              <td>
                  <input type="checkbox" name="selected_products[]" value="' . $i . '">
              </td>
              <td>
                  <div class="d-flex align-items-center">
                      <img src="' . $_SESSION['giohang'][$i][0][0] . '" class="img-fluid me-3" alt="Product Image" width="50" height="50">
                      <span>' . $_SESSION['giohang'][$i][1][0] . '</span>
                      <input type="hidden" name="product_name[]" value="' . $_SESSION['giohang'][$i][1][0] . '">
                  </div>
              </td>
              <td>' . number_format($_SESSION['giohang'][$i][2][0], 0, ",", ".") . ' đ
                  <input type="hidden" name="product_price[]" value="' . $_SESSION['giohang'][$i][2][0] . '">
                  <input type="hidden" name="product_code[]" value="' . $_SESSION['giohang'][$i][4][0] . '">
              </td>
              <td>
                  <input type="number" class="form-control" name="product_quantity[]" value="' . $_SESSION['giohang'][$i][3] . '" min="1" max="' . $_SESSION['giohang'][$i][5][0] . '" style="width: 80px;"> <!-- Sửa dòng này -->
              </td>
              <td>' . number_format($total_per_item, 0, ",", ".") . ' đ</td>
              <td>
                  <a href="http://localhost/PHP-MVC-MASTER/Cart/removecart/' . $i . '" class="btn btn-danger btn-sm" style="align-content: center;">Remove</a>
              </td>
          </tr>';
  }
  return $totalAll;
}

  ?>

  <div class="container mt-5">
    <h2 class="mb-4">Shopping Cart</h2>
    <form action="http://localhost/PHP-MVC-MASTER/Cart/checkpaycart" method="POST" >
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Select</th>
              <th scope="col">Product</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Total</th>
              <th scope="col">Remove</th>
            </tr>
          </thead>
          <tbody>
            <?php $totalAll = showsp(); ?>
          </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-between">
        <h4>Total: <?php echo number_format($totalAll, 0, ",", ".");?> đ</h4>
        
        <button type="submit" class="btn btn-primary" name="paynow" style="margin-bottom:30px;">Proceed to Checkout</button>
      </div>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
