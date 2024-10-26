<?php

// http://localhost/php.../Home/Show/1/2

class DangKi extends Controller{

    public $DangNhapModel;


    public function __construct()
    {
        $this->DangNhapModel = $this->model("DangNhapModel");
    }

    public function SayHi(){
        $this->view("login",[
            "page" => "createDangKiKH"
        ]);    
    } 

    public function create(){
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            if (isset($_POST['btn_dangkikh'])) {
                $hoten = $_POST['fullName'];
                $ngaysinh = $_POST['birthDate'];
                $gioitinh = $_POST['gender'];
                $sdt = $_POST['phone'];
                $diachi = $_POST['address'];
                $email = $_POST['email'];
                $us = $_POST['username'];
                $pa = $_POST['password'];
            }
            $data = $this->DangNhapModel->createKH($hoten,$ngaysinh,$gioitinh,$sdt,$diachi,$email,$us,$pa);
            if($data == "true"){
                echo "<script>
                    alert('Thông báo: Bạn đã đăng kí thành công!');
                    window.location.href = 'http://localhost/PHP-MVC-MASTER/DangNhap/FormDangNhap';
                </script>";
            }

        }
    }
}
?>