<?php
class DanhMucAD extends Controller
{
    public $DanhMucModel;

    public function __construct()
    {
        $this->DanhMucModel = $this->Model("DanhMucModelAD");
    }

    // Hiển thị danh mục
    public function Show()
    {
        $data = $this->DanhMucModel->showDanhMuc();
        $this->View("aoxau", [
            "page" => "qlDanhMuc",
            "show" => $data
        ]);
    }

    // Tạo nhà cung cấp mới
    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $MaDanhMuc = $_POST['MaDanhMuc'];
            $TenDanhMuc = $_POST['TenDanhMuc'];
        
            $result = $this->DanhMucModel->createDanhMuc($MaDanhMuc, $TenDanhMuc);
            echo $result;
        }
    }

    // Cập nhật thông tin danh mục
    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $MaDanhMuc = $_POST['MaDanhMuc'];
            $TenDanhMuc = $_POST['TenDanhMuc'];

            $result = $this->DanhMucModel->updateDanhMuc($MaDanhMuc, $TenDanhMuc );
            echo $result;
        }
    }

    // Xóa danh mục
    public function delete($id)
    {
        $result = $this->DanhMucModel->deleteDanhMuc($id);
        echo $result;
    }

    // Hiển thị form thêm danh mục mới
    public function FormCreate()
    {
        $this->view("aoxau", [
            "page" => "createDanhMuc"
        ]);
    }

    // Hiển thị form cập nhật thông tin danh mục
    public function FormUpdate($id)
    {
        $data = $this->DanhMucModel->getDanhMuc($id);
        $this->view("aoxau", [
            "page" => "updateDanhMuc",
            "data" => $data
        ]);
    }
}
