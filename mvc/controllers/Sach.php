<?php
class Sach extends Controller
{
    public $SachModel;
    public $DanhMucModelAD;
    public $KhoModel;

    public function __construct()
    {
        $this->SachModel = $this->Model("SachModel");
        $this->DanhMucModelAD = $this->Model("DanhMucModelAD");
        $this->KhoModel = $this->Model("KhoModel");
    }

    public function Sayhi()
    {
        $data = $this->SachModel->showSach();

        $this->View("aoxau", [
            "page" => "qlSach",
            "show" => $data
        ]);
    }

    public function Show()
    {
        $data = $this->SachModel->showSach();
        $this->View("aoxau", [
            "page" => "qlSach",
            "show" => $data
        ]);
    }

    public function FormCreate()
    {
        $data = $this->DanhMucModelAD->showDanhMuc();
        $data1 = $this->KhoModel->showKho();
        $this->View("aoxau", [
            "page" => "createSach",
            "danhmuc" => $data,
            "kho" => $data1
        ]);
    }

    public function create()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['btnsubmit'])) {
        $MaSach = $_POST['MaSach'];
        $MaKho = $_POST['MaKho'];
        $TenSach = $_POST['TenSach'];
        $TacGia = $_POST['TacGia'];
        $Gia = $_POST['Gia'];
        $SoLuong = $_POST['SoLuong'];
        $MaDanhMuc = $_POST['MaDanhMuc'];
        $MoTa = $_POST['MoTa'];

        // Xử lý ảnh
        $Anh = "default-image.png"; // Ảnh mặc định
        if ($_FILES['Anh']['name'] != "") {
            $Anh = $_FILES['Anh']['name'];
            $target_dir = "./public/image/";
            $target_file = $target_dir . basename($Anh);
            if (!move_uploaded_file($_FILES["Anh"]["tmp_name"], $target_file)) {
                echo "Lỗi khi tải ảnh lên.";
                return;
            }
        }

        // Gọi model để thêm sách vào CSDL
        $result = $this->SachModel->createSach($MaSach, $MaKho, $TenSach, $TacGia, $Gia, $SoLuong, $MaDanhMuc, $Anh, $MoTa);

        if ($result) {
            // Hiển thị thông báo thành công và quay lại trang quản lý sách
            echo "<script>alert('Thêm sách thành công!');</script>";
            echo "<script>window.location.href = '/PHP-MVC-MASTER/Sach/Show';</script>";
            exit;
        } else {
            echo "<script>alert('Thêm sách thất bại!');</script>";
        }
    }
}

public function update()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Lấy dữ liệu từ form
        $maSach = $_POST['maSach'];
        $maKho = $_POST['maKho'];
        $tenSach = $_POST['tenSach'];
        $tacGia = $_POST['tacGia'];
        $giaSach = $_POST['giaSach'];
        $soLuong = $_POST['soLuong'];
        $moTa = $_POST['moTa'];
        $maDanhMuc = $_POST['maDanhMuc'];

        // Xử lý upload hình ảnh
        if (isset($_FILES['hinhAnh']) && $_FILES['hinhAnh']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = './public/image/';
            $fileTmpPath = $_FILES['hinhAnh']['tmp_name'];
            $fileName = $_FILES['hinhAnh']['name'];
            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
            $newFileName = $maSach . '.' . $fileExtension;  // Đổi tên ảnh theo mã sách

            // Di chuyển file từ thư mục tạm đến thư mục upload
            $dest_path = $uploadDir . $newFileName;
            move_uploaded_file($fileTmpPath, $dest_path);
            $hinhAnh = $newFileName;
        } else {
            // Nếu không upload hình ảnh mới, giữ nguyên hình ảnh cũ
            $hinhAnh = $_POST['hinhAnh'];
        }

        // Gọi model để cập nhật sản phẩm
        $result = $this->SachModel->updateSach($maSach, $maKho, $tenSach, $tacGia, $giaSach, $soLuong, $hinhAnh, $moTa, $maDanhMuc);

        if ($result) {
            // Hiển thị thông báo thành công và quay lại trang quản lý sách
            echo "<script>alert('Sửa thành công!');</script>";
            echo "<script>window.location.href = '/PHP-MVC-MASTER/Sach/Show';</script>";
            exit;
        } else {
            echo "<script>alert('Sửa sách thất bại!');</script>";
        }
    }

    // Lấy thông tin sách để hiển thị trong form
    $data['sach'] = $this->SachModel->getSachById($_GET['id']);
    // $danhmucList['danhmucList'] = $this->DanhMucModel->getDanhMucById($_GET['id']);
    $this->view('pages/updateSach', $data);
}




    public function delete($id){
        $data = $this->SachModel->deleteSach($id);
        if ($data) {
            // Hiển thị thông báo thành công và quay lại trang quản lý sách
            echo "<script>alert('Xóa thành công!');</script>";
            echo "<script>window.location.href = '/PHP-MVC-MASTER/Sach/Show';</script>";
            exit;
        } else {
            echo "<script>alert('Xóa sách thất bại!');</script>";
        }
    }
   
   

    

    public function FormUpdate($id)
    {
        // Lấy thông tin sách theo ID
        $data = $this->SachModel->getSach($id);
        // $data1 = $this->NhapKhoModel->getNhapKho($id);
       // Lấy danh sách danh mục
    //    $danhmucList = $this->DanhMucModel->getDanhMuc($id); 
    
        // Hiển thị form cập nhật sách với dữ liệu sách hiện tại
        $this->view("aoxau", [
            "page" => "updateSach",
            "sach" => $data,
            // "kho1" =>$data1
            // "danhmucList" => $danhmucList
        ]);
    }


}
