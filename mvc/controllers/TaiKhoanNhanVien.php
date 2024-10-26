<?php
class TaiKhoanNhanVien extends Controller
{
    public $TaiKhoanNhanVienModel;

    public function __construct()
    {
        $this->TaiKhoanNhanVienModel = $this->Model("TaiKhoanNhanVienModel");
    }

    // Hiển thị danh sách tài khoản nhân viên
    public function Show()
    {
        $data = $this->TaiKhoanNhanVienModel->showTaiKhoan();
        $this->View("aoxau", [
            "page" => "qlTaiKhoanNhanVien",
            "show" => $data
        ]);
    }

    // Tạo tài khoản mới
    public function create()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $MaTaiKhoan = $_POST['MaTaiKhoan'];
        $MaNhanVien = $_POST['MaNhanVien'];
        $TenDangNhap = $_POST['TenDangNhap'];
        $MatKhau = $_POST['MatKhau']; // Bỏ mã hóa mật khẩu
        $Quyen = $_POST['Quyen'];

        $result = $this->TaiKhoanNhanVienModel->createTaiKhoan($MaTaiKhoan, $MaNhanVien, $TenDangNhap, $MatKhau, $Quyen);
        echo $result;
    }
}

    // Cập nhật thông tin tài khoản
    public function update()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $MaTaiKhoan = $_POST['MaTaiKhoan'];
        $MaNhanVien = $_POST['MaNhanVien'];
        $TenDangNhap = $_POST['TenDangNhap'];
        $MatKhau = $_POST['MatKhau']; // Không mã hóa nếu cần
        $Quyen = intval($_POST['Quyen']); // Chuyển đổi quyền thành số nguyên

        $result = $this->TaiKhoanNhanVienModel->updateTaiKhoan($MaTaiKhoan, $MaNhanVien, $TenDangNhap, $MatKhau, $Quyen);
        echo $result;
    }
}

    // Xóa tài khoản
    public function delete($id)
    {
        $result = $this->TaiKhoanNhanVienModel->deleteTaiKhoan($id);
        echo $result;
    }

    // Hiển thị form tạo tài khoản mới
    public function FormCreate()
    {
        $listMaNhanVien = $this->TaiKhoanNhanVienModel->getAllMaNhanVien();
        $this->view("aoxau", [
            "page" => "createTaiKhoan",
            "listMaNhanVien" => $listMaNhanVien
        ]);
    }

    // Hiển thị form cập nhật thông tin tài khoản
    public function FormUpdate($id)
{
    $listMaNhanVien = $this->TaiKhoanNhanVienModel->getAllMaNhanVien();
    $data = $this->TaiKhoanNhanVienModel->getTaiKhoan($id);
    
    $this->view("aoxau", [
        "page" => "updateTaiKhoan",
        "listMaNhanVien" => $listMaNhanVien,
        "data" => $data
        
    ]);
}
}
