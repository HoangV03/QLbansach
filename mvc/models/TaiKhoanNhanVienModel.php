<?php
class TaiKhoanNhanVienModel extends DB
{
    // Hiển thị danh sách tất cả tài khoản nhân viên
    public function showTaiKhoan()
    {
        $sql = "SELECT * FROM tbl_taikhoannhanvien";
        $result = mysqli_query($this->con, $sql);
        $mang = array();
        while ($row = mysqli_fetch_array($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    // Tạo tài khoản mới
    public function createTaiKhoan($MaTaiKhoan, $MaNhanVien, $TenDangNhap, $MatKhau, $Quyen)
{
    $Quyen = intval($Quyen); // Chuyển đổi quyền thành số nguyên
    $sql = "INSERT INTO tbl_taikhoannhanvien (MaTaiKhoan, MaNhanVien, TenDangNhap, MatKhau, Quyen) 
            VALUES ('$MaTaiKhoan','$MaNhanVien', '$TenDangNhap', '$MatKhau','$Quyen')";
    
    if (mysqli_query($this->con, $sql)) {
        session_start();
        $_SESSION['success_message'] = "Thêm tài khoản thành công!";
        header("Location: http://localhost/PHP-MVC-MASTER/TaiKhoanNhanVien/show");
        exit();
    } else {
        error_log("SQL Error: " . mysqli_error($this->con));
    }
}

    // Cập nhật thông tin tài khoản
    public function updateTaiKhoan($MaTaiKhoan, $MaNhanVien, $TenDangNhap, $MatKhau, $Quyen)
{
    $Quyen = intval($Quyen); // Chuyển đổi quyền thành số nguyên
    $sql = "UPDATE tbl_taikhoannhanvien 
            SET MaNhanVien = '$MaNhanVien', TenDangNhap = '$TenDangNhap', MatKhau = '$MatKhau', 
            Quyen = '$Quyen' 
            WHERE MaTaiKhoan = '$MaTaiKhoan'";
    
    if (mysqli_query($this->con, $sql)) {
        session_start();
        $_SESSION['success_message'] = "Cập nhật tài khoản thành công!";
        header("Location: http://localhost/PHP-MVC-MASTER/TaiKhoanNhanVien/show");
        exit();
    } else {
        error_log("SQL Error: " . mysqli_error($this->con));
    }
}

    // Lấy thông tin chi tiết của một tài khoản
    public function getTaiKhoan($MaTaiKhoan)
    {
        $sql = "SELECT * FROM tbl_taikhoannhanvien WHERE MaTaiKhoan = '$MaTaiKhoan'";
        $result = mysqli_query($this->con, $sql);
        $mang = array();
        while ($row = mysqli_fetch_array($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    // Xóa một tài khoản
    public function deleteTaiKhoan($MaTaiKhoan)
    {
        $sql = "DELETE FROM tbl_taikhoannhanvien WHERE MaTaiKhoan = '$MaTaiKhoan'";
        if (mysqli_query($this->con, $sql)) {
            // Chuyển hướng về trang danh sách tài khoản sau khi cập nhật thành công
            header("Location: http://localhost/PHP-MVC-MASTER/TaiKhoanNhanVien/show");
            exit(); // Ngừng thực hiện script sau khi chuyển hướng
        } else {
            error_log("SQL Error: " . mysqli_error($this->con)); // Để dễ dàng debug
        }
    }
}
