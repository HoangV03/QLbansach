<?php

class NhanVien extends Controller
{
    public $NhanVienModel;

    public function __construct()
    {
        $this->NhanVienModel = $this->Model("NhanVienModel");
    }

    public function Show()
{
    $data = $this->NhanVienModel->showNhanVien();
    
    $this->View("aoxau", [
        "page" => "qlNhanVien",
        "show" => $data
    ]);
}



    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $MaNhanVien = $_POST['MaNhanVien'];
            $TenNhanVien = $_POST['TenNhanVien'];
            $NgaySinh = $_POST['NgaySinh'];
            $GioiTinh = $_POST['GioiTinh'];
            $QueQuan = $_POST['QueQuan'];
            $SDT = $_POST['SDT'];
            $Email = $_POST['Email'];
            $NgayNhanViec = $_POST['NgayNhanViec'];

            $result = $this->NhanVienModel->createNhanVien($MaNhanVien, $TenNhanVien, $NgaySinh, $GioiTinh, $QueQuan, $SDT, $Email, $NgayNhanViec);
            echo $result;
        }
    }

    // Cập nhật thông tin nhân viên
    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $MaNhanVien = $_POST['MaNhanVien'];
            $TenNhanVien = $_POST['TenNhanVien'];
            $NgaySinh = $_POST['NgaySinh'];
            $GioiTinh = $_POST['GioiTinh'];
            $QueQuan = $_POST['QueQuan'];
            $SDT = $_POST['SDT'];
            $Email = $_POST['Email'];
            $NgayNhanViec = $_POST['NgayNhanViec'];

            $result = $this->NhanVienModel->updateNV($MaNhanVien, $TenNhanVien, $NgaySinh, $GioiTinh, $QueQuan, $SDT, $Email, $NgayNhanViec);
            echo $result;
        }
    }

    // Xóa nhân viên
    public function delete($id)
    {
        $result = $this->NhanVienModel->deleteNV($id);
        echo $result;
    }

    // Hiển thị form tạo nhân viên mới
    public function FormCreate() {
        $this->view("aoxau", [
            "page" => "createNhanVien"
        ]);
    }

    // Hiển thị form cập nhật thông tin nhân viên
    public function FormUpdate($id)
    {
        $data = $this->NhanVienModel->getNV($id);
        $this->view("aoxau", [
            "page" => "updateNhanVien",
            "data" => $data
        ]);
    }
    
}
