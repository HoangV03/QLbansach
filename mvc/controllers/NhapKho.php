<?php
class NhapKho extends Controller
{

    public $NhapKhoModel;

    public function __construct()
    {
        $this->NhapKhoModel = $this->Model("NhapKhoModel");
    }

    public function Sayhi()
    {
        $data = $this->NhapKhoModel->showNhapKho();

        $this->View("aoxau", [
            "page" => "qlNhapKho",
            "show" => $data
        ]);
    }

    public function Show()
    {
        $data = $this->NhapKhoModel->showNhapKho();
        $this->View("aoxau", [
            "page" => "qlNhapKho",
            "show" => $data
        ]);
    }

    public function create()
    {

        if ($_SERVER["REQUEST_METHOD"] === "POST" || isset($_POST['btnsubmit'])) {
            $MaKho = $_POST['MaKho'];
            $MaLoHang = $_POST['MaLoHang'];
            $SoLuongNhap = $_POST['SoLuongNhap'];
            $MaNhaCungCap = $_POST['MaNhaCungCap'];
            $NgayNhap = date('Y-m-d', strtotime($_POST['NgayNhap']));
            $DonGia = $_POST['DonGia'];

            $result = $this->NhapKhoModel->createNhapKho($MaKho, $MaLoHang, $SoLuongNhap, $MaNhaCungCap, $NgayNhap, $DonGia);
            echo $NgayNhap;
            echo $result;
            header("Location: http://localhost/PHP-MVC-MASTER/NhapKho/show");
        }
    }

    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" || isset($_POST['btnsubmit'])) {
            $MaKho = $_POST['MaKho'];
            $MaLoHang = $_POST['MaLoHang'];
            $SoLuongNhap = $_POST['SoLuongNhap'];
            $MaNhaCungCap = $_POST['MaNhaCungCap'];
            $NgayNhap = date('Y-m-d', strtotime($_POST['NgayNhap']));
            $DonGia = $_POST['DonGia'];

            $result = $this->NhapKhoModel->updateNhapKho($MaKho, $MaLoHang, $SoLuongNhap, $MaNhaCungCap, $NgayNhap, $DonGia);
            header("Location: http://localhost/PHP-MVC-MASTER/NhapKho/show");
            echo $result;
        }
    }

    public function delete($id)
    {
        $data = $this->NhapKhoModel->deleteNhapKho($id);
        echo $data;
        header("Location: http://localhost/PHP-MVC-MASTER/NhapKho/show");
    }

    public function FormCreate()
    {
        $this->view("aoxau", [
            "page" => "createNhapKho"
        ]);
    }

    public function FormUpdate($id)
    {
        $data = $this->NhapKhoModel->getNhapKho($id);
        $this->view("aoxau", [
            "page" => "updateNhapKho",
            "data" => $data
        ]);
    }
}
