<?php
class DangNhap extends Controller
{
    public $DangNhapModel;


    public function __construct()
    {
        $this->DangNhapModel = $this->model("DangNhapModel");
    }

    public function FormDangNhap()
    {
        $this->view("login", [
            "page" => "dangnhap"
        ]);
    }

    public function FormDangNhapAdmin()
    {
        $this->view("login", [
            "page" => "dangnhapAdmin"
        ]);
    }

    public function dangnhapAC()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $us = $_POST["username"];
            $pa = $_POST["password"];

            // Kiểm tra thông tin đăng nhập
            $data = $this->DangNhapModel->checkDN($us, $pa);
            $get_result = $this->DangNhapModel->get_info_user($us, $pa);
            $rs = json_decode($get_result, true);
            foreach ($rs as $row) {
                $makh = $row["MaKhachHang"];
                $tenkh = $row["TenKhachHang"];
                $sdt = $row["SDT"];
                $mk = $row["MatKhau"];
                $email = $row["Email"];
                $address = $row["DiaChi"];
            }
            $mang = array($makh, $tenkh, $sdt, $email, $address, $us, $pa);
            if ($data == "true") {
                // Đăng nhập thành công
                $_SESSION['ttuser'] = $mang;
                if (isset($_SESSION['thanhtoan'])) {
                    echo "<script>
                    alert('Thông báo: Bạn đã đăng nhập thành công!');
                    window.location.href = 'http://localhost/PHP-MVC-MASTER/Cart/pay';
                    </script>";
                } else {
                echo "<script>
                    alert('Thông báo: Bạn đã đăng nhập thành công!');
                    window.location.href = 'http://localhost/PHP-MVC-MASTER/home';
                </script>";
                exit();
                }
            } else {
                // Đăng nhập thất bại, hiển thị thông báo
                echo "<script>
                    alert('Thông báo: Bạn đã đăng nhập không thành công!');
                    window.location.href = 'http://localhost/PHP-MVC-MASTER/dangnhap/FormDangNhap';
                </script>";
            }
        }
    }

    public function dangxuatAC()
    {
        if (isset($_SESSION['ttuser'])) {
            unset($_SESSION['ttuser']);
            echo "<script>
                    alert('Thông báo: Bạn đã đăng xuất thành công!');
                    window.location.href = 'http://localhost/PHP-MVC-MASTER/home';
                </script>";
        }
    }

    public function dangxuatAD()
    {
        if (isset($_SESSION['data'])) {
            unset($_SESSION['data']);
            echo "<script>
                    alert('Thông báo: Bạn đã đăng xuất thành công!');
                    window.location.href = 'http://localhost/PHP-MVC-MASTER/homead/';
                </script>";
        }
    }

    public function dangnhapAdmin()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $us = $_POST["username"];
            $pa = $_POST["password"];

            // Kiểm tra thông tin đăng nhập
            $data = $this->DangNhapModel->checkDnAd($us, $pa);
            $get_result = $this->DangNhapModel->get_info_ad($us, $pa);
            $rs = json_decode($get_result, true);

            foreach ($rs as $row) {
                $matk = $row["MaTaiKhoan"];
                $manv = $row["MaNhanVien"];
                $tentk = $row["TenDangNhap"];
                $mk = $row["MatKhau"];
                $quyen = $row["Quyen"];
            }
            echo $mk;echo $quyen;
            $mang = array($matk, $manv, $tentk, $mk, $quyen);
            var_dump($mang);
            if ($data == "true") {
                // Đăng nhập thành công
                $_SESSION['data'] = $mang;
                
                echo "<script>
                    alert('Thông báo: Bạn đã đăng nhập thành công!');
                    window.location.href = 'http://localhost/PHP-MVC-MASTER/homead/';
                </script>";
                exit();
                
            } else {
                // Đăng nhập thất bại, hiển thị thông báo
                echo "<script>
                    alert('Thông báo: Bạn đã đăng nhập không thành công!');
                    window.location.href = 'http://localhost/PHP-MVC-MASTER/dangnhap/FormDangNhapAdmin';
                </script>";
            }
        }
    }
}
