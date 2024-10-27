<?php
class NhapKho extends Controller
{

    public $NhapKhoModel;
    public $NhanVienModel;
    public $KhoModel;
    public $SachModel;
    public $NhaCungCapModel;

    public function __construct()
    {
        $this->NhapKhoModel = $this->Model("NhapKhoModel");
        $this->NhanVienModel = $this->Model("NhanVienModel");
        $this->KhoModel = $this->Model("KhoModel");
        $this->SachModel = $this->Model("SachModel");
        $this->NhaCungCapModel = $this->Model("NhaCungCapModel");
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
            $MaSach = $_POST['MaSach'];
            $SoLuong = $_POST['SoLuong'];
            $MaNhaCungCap = $_POST['MaNhaCungCap'];
            $NgayNhap = date('Y-m-d', strtotime($_POST['NgayNhap']));
            $DonGia = $_POST['DonGia'];
            $MaNhanVien = $_POST['MaNhanVien'];

            $result = $this->NhapKhoModel->createNhapKho($MaKho, $MaSach, $SoLuong, $MaNhaCungCap, $NgayNhap, $DonGia, $MaNhanVien);
            echo $NgayNhap;
            echo $result;
            header("Location: http://localhost/PHP-MVC-MASTER/NhapKho/show");
        }
    }

    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" || isset($_POST['btnsubmit'])) {
            $MaKho = $_POST['MaKho'];
            $MaSach = $_POST['MaSach'];
            $SoLuong = $_POST['SoLuong'];
            $MaNhaCungCap = $_POST['MaNhaCungCap'];
            $NgayNhap = date('Y-m-d', strtotime($_POST['NgayNhap']));
            $DonGia = $_POST['DonGia'];

            $result = $this->NhapKhoModel->updateNhapKho($MaKho, $MaSach, $SoLuong, $MaNhaCungCap, $NgayNhap, $DonGia);
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
        $data = $this->KhoModel->showKho();
        $data1 = $this->NhanVienModel->showNhanVien();
        $data2 = $this->SachModel->showSach();
        $data3 = $this->NhaCungCapModel->showNhaCungCap();
        $this->view("aoxau", [
            "page" => "createNhapKho",
             "kho" => $data,
             "nhanvien" => $data1,
             "sach" => $data2,
             "nha" =>$data3
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
