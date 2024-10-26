<?php
class Kho extends Controller
{

    public $KhoModel;

    public function __construct()
    {
        $this->KhoModel = $this->Model("KhoModel");
    }

    public function Sayhi()
    {
        $data = $this->KhoModel->showKho();

        $this->View("aoxau", [
            "page" => "qlkho",
            "show" => $data
        ]);
    }
    public function Show()
    {
        $data = $this->KhoModel->showKho();
        $this->View("aoxau", [
            "page" => "qlkho",
            "show" => $data
        ]);
    }

    public function create()
    {
        echo "controller";
        if ($_SERVER["REQUEST_METHOD"] === "POST" || isset($_POST['btnsubmit'])) {
            $MaKho = $_POST['MaKho'];
            $TenKho = $_POST['TenKho'];
            $DiaDiem = $_POST['DiaDiem'];
            $KichThuoc = $_POST['KichThuoc'];

            $result = $this->KhoModel->createKho($MaKho, $TenKho, $DiaDiem, $KichThuoc);
            header("Location: http://localhost/PHP-MVC-MASTER/Kho/show");
            echo $result;
        }
    }

    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" || isset($_POST['btnsubmit'])) {
            $MaKho = $_POST['MaKho'];
            $TenKho = $_POST['TenKho'];
            $DiaDiem = $_POST['DiaDiem'];
            $KichThuoc = $_POST['KichThuoc'];
            $result = $this->KhoModel->updateKho($MaKho, $TenKho, $DiaDiem, $KichThuoc);
            header("Location: http://localhost/PHP-MVC-MASTER/Kho/show");
            echo $result;
        }
    }

    public function delete($id)
    {
        $data = $this->KhoModel->deleteKho($id);
        echo $data;
        header("Location: http://localhost/PHP-MVC-MASTER/Kho/show");
    }

    public function FormCreate()
    {
        $this->view("aoxau", [
            "page" => "createKho"
        ]);
    }

    public function FormUpdate($id)
    {
        $data = $this->KhoModel->getKho($id);
        $this->view("aoxau", [
            "page" => "updateKho",
            "data" => $data
        ]);
    }
}
