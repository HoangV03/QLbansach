<?php
class DonHangADModel extends DB
{

    public function showDonHang()
    {
        $sql = "SELECT * FROM tbl_donhang";
        $result = mysqli_query($this->con, $sql);
        $mang = array();
        while ($row = mysqli_fetch_array($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    public function updateOrder($maDonHang, $maKhachHang, $ngayDatHang, $tongTien, $trangThai, $trangThaiTT, $ngayGiaoDich, $ngayHoanThanh)
    {
        $sql = "UPDATE tbl_donhang 
                SET MaKhachHang = '$maKhachHang', 
                    NgayDatHang = '$ngayDatHang', 
                    TongTien = '$tongTien', 
                    TrangThai = '$trangThai', 
                    TrangThaiTT = '$trangThaiTT', 
                    NgayGiaoDuKien = '$ngayGiaoDich', 
                    NgayHoanThanh = '$ngayHoanThanh' 
                WHERE MaDonHang = '$maDonHang'";

        $result = false;
        if (mysqli_query($this->con, $sql)) {
            $result = true;
        } else {
            // Log lỗi cụ thể của MySQL để dễ debug
            error_log("SQL Error: " . mysqli_error($this->con));
        }
        return json_encode($result);
    }

    // Phương thức để lấy thông tin đơn hàng theo ID (nếu chưa có)
    public function getOrderById($id)
    {
        $sql = "SELECT * FROM tbl_donhang WHERE MaDonHang = '$id'";
        $result = mysqli_query($this->con, $sql);
        $mang = array();
        while ($row = mysqli_fetch_array($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    // Phương thức xóa đơn hàng (đã có trước đó)
    public function deleteOrder($id)
    {
        $sql = "DELETE FROM tbl_donhang WHERE MaDonHang = '$id'";
        
        $result = false;
        if (mysqli_query($this->con, $sql)) {
            $result = true;
        } else {
            error_log("SQL Error: " . mysqli_error($this->con));
        }
        return json_encode($result);
    }
    

    
}

