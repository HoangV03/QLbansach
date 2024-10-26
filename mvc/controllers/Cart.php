<?php

// http://localhost/live/Home/Show/1/2

class Cart extends Controller
{

    public $QLDH;

    public $DangNhapModel;


    public function __construct()
    {
        $this->QLDH = $this->Model("DonHangModel");
        $this->DangNhapModel = $this->Model("DangNhapModel");
    }

    public function shoppingcart()
    {
        $this->view("aodep", [
            "page1" => "header",
            "page2" => "giohang",
            "page3" => "footer",
        ]);
    }

    public function detailOder()
    {
        $detailorder = $this->QLDH->showDetailOrder();
        $order = $this->QLDH->showOrder();
        $this->view("aodep", [
            "page1" => "header",
            "page2" => "donhanguser",
            "page3" => "footer",
            "DetailOr" => $detailorder,
            "order" => $order,
        ]);
    }

    public function pay()
    {
        $get_info = $this->DangNhapModel->get_info_user($_SESSION['ttuser'][5], $_SESSION['ttuser'][6]);
        if (isset($_SESSION["ttuser"])) {
            $this->view("aodep", [
                "page1" => "header",
                "page2" => "thanhtoan",
                "page3" => "footer",
                "info" => $get_info
            ]);
        } else {
            echo "<script>               
                window.location.href = 'http://localhost/php-MVC-MASTER/DangNhap/FormDangNhap';
                </script>";
        }
    }


    public function checkpaycart()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST["buynow"])) {
                $masachbn = $_POST['masach'];
                $tensachbn = $_POST["tensach"];
                $giabn = $_POST["gia"];
                $soluongbn = $_POST["soluong"];

                // Kiểm tra xem session thanhtoan đã tồn tại chưa
                if (!isset($_SESSION['thanhtoan'])) {
                    $_SESSION['thanhtoan'] = [];
                }

                // Thêm từng sản phẩm vào session thanhtoan
                for ($i = 0; $i < count($tensachbn); $i++) {
                    // Tạo mảng cho sản phẩm
                    $muatt = [
                        'tensach' => $tensachbn[$i],
                        'gia' => $giabn[$i],
                        'soluong' => $soluongbn[$i],
                        'masach' => $masachbn[$i],

                    ];
                    // Thêm vào session
                    $_SESSION['thanhtoan'][] = $muatt;
                }

                // Chuyển hướng đến trang thanh toán
                header("location:http://localhost/PHP-MVC-MASTER/Cart/pay");
                exit(); // Dùng exit() sau header để dừng script
            }

            if (isset($_POST["addcart"])) {

                if (!isset($_SESSION['giohang'])) {
                    $_SESSION['giohang'] = [];
                }

                $masach = $_POST['masach'];
                $anh = $_POST["anh"];
                $tensach = $_POST["tensach"];
                $gia = $_POST["gia"];
                // $soluong = $_POST["soluong"];
                $soluong = intval($_POST["soluong"][0]);
                // $soluong = isset($_POST["soluong"]) ? intval($_POST["soluong"]) : 1;
                echo($soluong);
                $totalsp = $_POST['totalsp'];
                $fl = 0;
                var_dump($_SESSION['giohang']);
                for ($i = 0; $i < sizeof($_SESSION['giohang']); $i++) {
                    if ($_SESSION['giohang'][$i][4] == $masach) {
                        $fl = 1;
                        $currentQuantity = intval($_SESSION['giohang'][$i][3]); 
                        // $soluong = $soluong + ($_SESSION['giohang'][$i][3]);
                        $_SESSION['giohang'][$i][3] = $currentQuantity+ $soluong;
                        break;
                    }
                }
                if ($fl == 0) {
                    $sp = [$anh, $tensach, $gia, $soluong, $masach, $totalsp];
                    $_SESSION['giohang'][] = $sp;
                }
                
                var_dump($_SESSION['giohang']);
                $firstMasach = urlencode($masach[0]);
                // echo var_dump($_SESSION["giohang"]);
                // echo "<script>
                // alert('Sản phẩm $tensach đã được thêm vào giỏ hàng.');
                // window.location.href = 'http://localhost/PHP-MVC-MASTER/sanpham/detailProdcut/$firstMasach';
                // </script>";
                echo "<script>
                alert('Sản phẩm $tensach đã được thêm vào giỏ hàng.');
                window.location.href = 'http://localhost/PHP-MVC-MASTER/home';
                </script>";
                exit();
            }

            if (isset($_POST["paynow"])) {
                if (isset($_POST["selected_products"])) {
                    $masachpn = $_POST['product_code'];
                    $tensachpn = $_POST["product_name"];
                    $giapn = $_POST["product_price"];
                    $soluongpn = $_POST["product_quantity"];

                    // Kiểm tra nếu session thanhtoan chưa tồn tại
                    if (!isset($_SESSION['thanhtoan'])) {
                        $_SESSION['thanhtoan'] = [];
                    }
                    // Lặp qua từng sản phẩm đã chọn
                    // foreach ($_POST["selected_products"] as $index) {
                    //     if (isset($tensachpn[$index], $giapn[$index], $soluongpn[$index], $masachpn[$index])) {
                    //         // Thêm từng sản phẩm vào session với cấu trúc đúng
                    //         $_SESSION['thanhtoan'][] = [
                    //             'tensach' => $tensachpn[$index],
                    //             'gia' => $giapn[$index],
                    //             'soluong' => $soluongpn[$index],
                    //             'masach' => $masachpn[$index]
                    //         ];
                    //     }
                    // }
                    if (isset($_POST["selected_products"]) && !empty($_POST["selected_products"])) {
                        // Khởi tạo session nếu chưa có
                        if (!isset($_SESSION['thanhtoan'])) {
                            $_SESSION['thanhtoan'] = [];
                        }

                        foreach ($_POST["selected_products"] as $index) {
                            // Kiểm tra sự tồn tại của các trường cần thiết
                            if (isset($tensachpn[$index], $giapn[$index], $soluongpn[$index], $masachpn[$index])) {
                                // Thêm sản phẩm vào session
                                $_SESSION['thanhtoan'][] = [
                                    'tensach' => $tensachpn[$index],
                                    'gia' => $giapn[$index],
                                    'soluong' => $soluongpn[$index],
                                    'masach' => $masachpn[$index]
                                ];
                            }
                        }
                    }


                    print_r($_SESSION['thanhtoan']);  // In ra để kiểm tra
                    header("location:http://localhost/PHP-MVC-MASTER/Cart/pay");
                    exit;
                }
            }
        }
    }

    public function completepay()
    {
        if (isset($_POST["completett"])) {
            $totailtt = $_POST["totailtt"];
            // var_dump( $totailtt);
            if (isset($_SESSION['thanhtoan'])) {
                if (!isset($_SESSION['compthanhtoan'])) {
                    $_SESSION['compthanhtoan'] = [];
                }
                // $tt = $_SESSION['thanhtoan'];
                $now = new DateTime('now', new DateTimeZone('Asia/Ho_Chi_Minh'));
                // echo $now->format('Y-m-d H:i:s');
                $ngaydh = $now->format('Y-m-d H:i:s'); // Chuyển đổi thành chuỗi
                $madh = $this->QLDH->createOder($_SESSION['ttuser'][0], $ngaydh, $totailtt);
                for ($i = 0; $i < sizeof($_SESSION['thanhtoan']); $i++) {
                    $rs = $this->QLDH->createDetailOder($madh, $_SESSION["thanhtoan"][$i]['masach'], $_SESSION["thanhtoan"][$i]['soluong'], $_SESSION["thanhtoan"][$i]['gia']);
                }
                echo $rs;
                if ($rs == "true") {
                    echo "<script>
                // alert('Bạn đặt hàng thành công');
                window.location.href = 'http://localhost/PHP-MVC-MASTER/Cart/detailOder';
                </script>";
                    exit();
                }else{
                    echo "<script>
                // alert('Bạn đặt hàng thất bại');
                window.location.href = 'http://localhost/PHP-MVC-MASTER/home';
                </script>";
                    exit();
                }
            }
        }
    }

    public function removecart($id)
    {
        array_splice($_SESSION['giohang'], $id, 1);
        echo "<script>              
                window.location.href = 'http://localhost/PHP-MVC-MASTER/Cart/shoppingcart';
            </script>";
    }
}
