<?php
class KhuyenMai extends Controller
{

    public $KhuyenMaiModel;

    public function __construct()
    {
        $this->KhuyenMaiModel = $this->Model("KhuyenMaiModel");
    }

    public function Sayhi()
    {
        $data = $this->KhuyenMaiModel->showKM();

        $this->View("aoxau", [
            "page" => "qlKhuyenMai",
            "show" => $data
        ]);
    }

    public function Show()
    {
        $data = $this->KhuyenMaiModel->showKM();
        $this->View("aoxau", [
            "page" => "qlKhuyenMai",
            "show" => $data
        ]);
    }

    public function create()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" ) {
            $discountCode = $_POST['discountCode'];
            $discountName = $_POST['discountName'];
            $discountPrice = $_POST['discountPrice'];
            $startDate = $_POST['startDate'];
            $endDate = $_POST['endDate'];

            $result = $this->KhuyenMaiModel->createKM($discountCode,$discountName,$discountPrice,$startDate,$endDate);
            echo $result;
        }
    }

    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $discountCode = $_POST['discountCode'];
            $discountName = $_POST['discountName'];
            $discountPrice = $_POST['discountPrice'];
            $startDate = $_POST['startDate'];
            $endDate = $_POST['endDate'];

            $result = $this->KhuyenMaiModel->updateKM($discountCode,$discountName,$discountPrice,$startDate,$endDate);
            echo "<script>              
                window.location.href = 'http://localhost/PHP-MVC-MASTER/KhuyenMai/show';
            </script>";
        }
    }

    public function delete($id){
        $data = $this->KhuyenMaiModel->deleteKM($id);
        echo "<script>              
                window.location.href = 'http://localhost/PHP-MVC-MASTER/KhuyenMai/show';
            </script>";
    }

    public function FormCreate()
    {
        $this->view("aoxau", [
            "page" => "createKhuyenMai"
        ]);
    }

    public function FormUpdate($id){
        $data = $this->KhuyenMaiModel->getKM($id);
        $this->view("aoxau", [
            "page" => "updateKhuyenMai",
            "data" => $data
        ]);
    }

    public function timkiem(){
        $search = '';
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            if(isset($_POST["timkiemkh"])){
                $search = $_POST["search"];
            }
        }
        $data = $this->KhuyenMaiModel->search($search);
        $this->View("aoxau", [
            "page" => "qlKhuyenMai",
            "show" => $data
        ]);

    }
}
