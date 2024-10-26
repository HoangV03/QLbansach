<?php
class DonHangModel extends DB
{
    public function createOder($makh, $ngaydh, $tongtien)
    {
        // Câu lệnh SQL sửa lại
        $sql = "INSERT INTO tbl_donhang (MaKhachHang, NgayDatHang, TongTien, TrangThai, TrangThaiTT, NgayGiaoDuKien, NgayHoanThanh)
            VALUES ('$makh', '$ngaydh', '$tongtien', '', '', '', '')";

        $result = mysqli_query($this->con, $sql);
        // Kiểm tra kết quả và lấy MaDonHang nếu chèn thành công
        if ($result) {
            $maDonHang = mysqli_insert_id($this->con); // Lấy ID của bản ghi mới được chèn          
            return $maDonHang; // Trả về ID đơn hàng vừa tạo
        } else {
            // Xử lý lỗi nếu có
            return false;
        }
    }


    public function createDetailOder($madh,$masach,$soluong,$gia)
    {
        // INSERT INTO `tbl_chitietdonhang` 
        // (`MaChiTietDonHang`, `MaDonHang`, `MaSach`, `SoLuong`, `Gia`) 
        // VALUES (NULL, '1', 'S01', '1', '17000'), (NULL, '1', 'S06', '1', '14000');
        $sql = "INSERT INTO tbl_chitietdonhang (MaDonHang, MaSach, SoLuong,Gia)
            VALUES ($madh,'$masach',$soluong,$gia)";

        $result = false;
        if (mysqli_query($this->con, $sql)) {
            $result = true;
        }
        return json_encode($result);
    }

    public function showDetailOrder(){
        $sql = "SELECT tbl_chitietdonhang.MaDonHang, tbl_sach.TenSach, tbl_sach.Gia, tbl_chitietdonhang.SoLuong  
            FROM tbl_chitietdonhang 
            JOIN tbl_sach ON tbl_chitietdonhang.MaSach = tbl_sach.MaSach";
        $result = mysqli_query($this->con,$sql);
        $mang  = array();
        while ($row = mysqli_fetch_array($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    public function showOrder(){
        $sql = "SELECT * FROM tbl_donhang";
        $result = mysqli_query($this->con,$sql);
        $mang  = array();
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
