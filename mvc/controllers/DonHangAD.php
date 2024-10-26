<?php

class DonHangAD extends Controller

{

    public $DonHangModel;

    public function __construct()
    {
        $this->DonHangModel = $this->Model("DonHangADModel");
       
    }

    public function Show()
    {
        $data = $this->DonHangModel->showDonHang();
        $this->View("aoxau", [
            "page" => "qldonhang",
            "show" => $data
        ]);
    }

    public function FormUpdate($id)
    {
       // Lấy thông tin đơn hàng từ cơ sở dữ liệu dựa vào mã đơn hàng
    $data = $this->DonHangModel->getOrderById($id);
    
        // Hiển thị form cập nhật đơn hàng với dữ liệu hiện tại
        $this->View("aoxau", [
            "page" => "updateOrder",
            "donhang" => $data
        ]);
    }

    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $maDonHang = $_POST['maDonHang'];
            $maKhachHang = $_POST['maKhachHang'];
            $ngayDatHang = $_POST['ngayDatHang'];
            $tongTien = $_POST['tongTien'];
            $trangThai = $_POST['trangThai'];
            $trangThaiTT = $_POST['trangThaiTT'];
            $ngayGiaoDich = $_POST['ngayGiaoDich'];
            $ngayHoanThanh = $_POST['ngayHoanThanh'];

            // Kiểm tra nếu chưa thanh toán thì không cho phép sửa trạng thái giao hàng
    if ($trangThaiTT == '0' && $trangThai == '1') {
        // Gửi thông báo lỗi và chuyển hướng về trang cập nhật đơn hàng
        $_SESSION['error'] = "Không thể cập nhật trạng thái giao hàng khi chưa thanh toán.";
        header("Location: http://localhost/PHP-MVC-MASTER/DonHangAD/FormUpdate/$maDonHang");
        exit;
    }
    
            // Gọi phương thức updateOrder
            $result = $this->DonHangModel->updateOrder($maDonHang, $maKhachHang, $ngayDatHang, $tongTien, $trangThai, $trangThaiTT, $ngayGiaoDich, $ngayHoanThanh);

            if ($result) {
                // Hiển thị thông báo thành công và quay lại trang quản lý sách
                echo "<script>alert('Sửa thành công!');</script>";
                echo "<script>window.location.href = '/PHP-MVC-MASTER/DonHangAD/Show';</script>";
                exit;
            } else {
                echo "<script>alert('Sửa sách thất bại!');</script>";
            }
        }

    }
    
    public function deleteOrder($id){
        $data = $this->DonHangModel->delete($id);
        if ($data) {
            // Hiển thị thông báo thành công và quay lại trang quản lý sách
            echo "<script>alert('Xóa thành công!');</script>";
            echo "<script>window.location.href = '/PHP-MVC-MASTER/DonHangAD/Show';</script>";
            exit;
        } else {
            echo "<script>alert('Xóa sách thất bại!');</script>";
        }
    }



   
    

    
}



