<?php
class ADKhachHang extends Controller
{

    public $QLTKKhachHangModel;

    public function __construct()
    {
        $this->QLTKKhachHangModel = $this->model("QLTKKhachHangModel");
    }

    public function SayHi()
    {
        $data = $this->QLTKKhachHangModel->showall();
        $this->view("aoxau", [
            "page" => "QLtkkh",
            "show" => $data
        ]);
    }

    public function Show()
    {
        $data = $this->QLTKKhachHangModel->showall();
        $this->view("aoxau", [
            "page" => "QLtkkh",
            "show" => $data
        ]);
    }

    public function FormUpdate($id) {
        $data = $this->QLTKKhachHangModel->getKh($id);
        $this->view("aoxau", [
            "page" => "updateTKKhachHang",
            "data" => $data
        ]);
    }

    public function update()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Lấy dữ liệu từ form
        $makh = $_POST['makh'];
        $tenkh = $_POST['namekh'];
        $ngaysinh = $_POST['brith'];
        $gioitinh = $_POST['gender'];
        $sdt = $_POST['sdt'];
        $diachi = $_POST['add'];
        $email = $_POST['email'];
        $tendn = $_POST['tdn'];
        $matkhau = $_POST['mk'];

        // Gọi hàm update trong model để cập nhật thông tin khách hàng
        $result = $this->QLTKKhachHangModel->updateKH($makh,$tenkh, $ngaysinh, $gioitinh, $sdt, $diachi, $email, $tendn, $matkhau);

        // Chuyển hướng sau khi cập nhật
        echo "<script>              
            window.location.href = 'http://localhost/PHP-MVC-MASTER/ADKhachHang/show';
        </script>";
    }
}


    public function delete($id){
        $data = $this->QLTKKhachHangModel->deleteKH($id);
        echo "<script>              
                window.location.href = 'http://localhost/PHP-MVC-MASTER/ADKhachHang/show';
            </script>";
    }

    public function timkiem(){
        $search = '';
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            if(isset($_POST["timkiemkh"])){
                $search = $_POST["search"];
            }
        }
        $data = $this->QLTKKhachHangModel->search($search);
        $this->view("aoxau", [
            "page" => "QLtkkh",
            "show" => $data
        ]);

    }
}
