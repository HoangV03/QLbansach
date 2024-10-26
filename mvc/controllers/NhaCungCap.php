<?php
class NhaCungCap extends Controller
{
    public $NhaCungCapModel;

    public function __construct()
    {
        $this->NhaCungCapModel = $this->Model("NhaCungCapModel");
    }

    // Hiển thị danh sách nhà cung cấp
    public function Show()
    {
        $data = $this->NhaCungCapModel->showNhaCungCap();
        $this->View("aoxau", [
            "page" => "qlNhaCungCap",
            "show" => $data
        ]);
    }

    // Tạo nhà cung cấp mới
    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $MaNhaCungCap = $_POST['MaNhaCungCap'];
            $TenNhaCungCap = $_POST['TenNhaCungCap'];
            $DiaChi = $_POST['DiaChi'];
            $SDT = $_POST['SDT'];
            $Email = $_POST['Email'];

            $result = $this->NhaCungCapModel->createNhaCungCap($MaNhaCungCap, $TenNhaCungCap, $DiaChi, $SDT, $Email);
            echo $result;
        }
    }

    // Cập nhật thông tin nhà cung cấp
    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $MaNhaCungCap = $_POST['MaNhaCungCap'];
            $TenNhaCungCap = $_POST['TenNhaCungCap'];
            $DiaChi = $_POST['DiaChi'];
            $SDT = $_POST['SDT'];
            $Email = $_POST['Email'];
            

            $result = $this->NhaCungCapModel->updateNhaCungCap($MaNhaCungCap, $TenNhaCungCap, $DiaChi, $SDT, $Email );
            echo $result;
        }
    }

    // Xóa nhà cung cấp
    public function delete($id)
    {
        $result = $this->NhaCungCapModel->deleteNhaCungCap($id);
        echo $result;
    }

    // Hiển thị form thêm nhà cung cấp mới
    public function FormCreate()
    {
        $this->view("aoxau", [
            "page" => "createNhaCungCap"
        ]);
    }

    // Hiển thị form cập nhật thông tin nhà cung cấp
    public function FormUpdate($id)
    {
        $data = $this->NhaCungCapModel->getNhaCungCap($id);
        $this->view("aoxau", [
            "page" => "updateNhaCungCap",
            "data" => $data
        ]);
    }
}
