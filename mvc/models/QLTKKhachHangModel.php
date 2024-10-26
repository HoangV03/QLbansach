<?php
class QLTKKhachHangModel extends DB
{
    public function updateTKNV()
    {
        // UPDATE `tbl_taikhoankhachhang` SET `MatKhau` = '1' WHERE `tbl_taikhoankhachhang`.`MaKhachHang` = 1;

    }

    public function showall()
    {
        $sql = "SELECT * FROM tbl_taikhoankhachhang";
        $result = mysqli_query($this->con, $sql);
        $mang = array();
        while ($row = mysqli_fetch_array($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    public function getKH($id)
    {
        $sql = "SELECT * FROM tbl_taikhoankhachhang WHERE MaKhachHang = '$id'";
        $result = mysqli_query($this->con, $sql);
        $mang = array();
        while ($row = mysqli_fetch_array($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    public function updateKH($makh, $tenkh, $ngaysinh, $gioitinh, $sdt, $diachi, $email, $tendn, $matkhau)
    {
        $sql = "UPDATE tbl_taikhoankhachhang 
        SET TenKhachHang = '$tenkh', NgaySinh = '$ngaysinh', GioiTinh = '$gioitinh', SDT = '$sdt' , 
        DiaChi = '$diachi',Email = '$email',TenDangNhap = '$tendn', MatKhau = '$matkhau'
        WHERE MaKhachHang = '$makh'";

        $result = false;
        if (mysqli_query($this->con, $sql)) {
            $result = true;
        } else {
            // Log lỗi cụ thể của MySQL để dễ debug
            error_log("SQL Error: " . mysqli_error($this->con));
        }
        return json_encode($result);
    }

    public function deleteKH($id)
    {
        $sql = "DELETE FROM tbl_taikhoankhachhang WHERE MaKhachHang = '$id'";
        $result = false;
        if (mysqli_query($this->con, $sql)) {
            $result = true;
        } else {
            // Log lỗi cụ thể của MySQL để dễ debug
            error_log("SQL Error: " . mysqli_error($this->con));
        }
        return json_encode($result);
    }

    public function search($tenkh)
    {
        $tenkh = "%" . $tenkh . "%";      
        $tenkh = mysqli_real_escape_string($this->con, $tenkh);
        $sql = "SELECT * FROM tbl_taikhoankhachhang 
            WHERE TenKhachHang LIKE '$tenkh' 
            OR DiaChi LIKE '$tenkh'";
        $result = mysqli_query($this->con, $sql);
        $mang = array();
        while ($row = mysqli_fetch_array($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }
}
