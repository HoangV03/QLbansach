<?php
class NhanVienModel extends DB
{
    // Hiển thị danh sách tất cả nhân viên
    public function showNhanVien()
    {
        $sql = "SELECT * FROM tbl_nhanvien";
        $result = mysqli_query($this->con, $sql);
        $mang = array();
        while ($row = mysqli_fetch_array($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }
    public function getAllNhanVien() {
        $sql = "SELECT * FROM tbl_nhanvien";
        $result = mysqli_query($this->con, $sql);
        $nhanviens = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $nhanviens[] = $row;
        }
        return $nhanviens; // Trả về mảng dữ liệu thay vì JSON để dễ xử lý trong Controller
    }

    // Tạo nhân viên mới
    public function createNhanVien($MaNhanVien, $TenNhanVien, $NgaySinh, $GioiTinh, $QueQuan, $SDT, $Email, $NgayNhanViec)
    {
        $sql = "INSERT INTO tbl_nhanvien (MaNhanVien, TenNhanVien, NgaySinh, GioiTinh, QueQuan, SDT, Email, NgayNhanViec) 
                VALUES ('$MaNhanVien', '$TenNhanVien', '$NgaySinh', '$GioiTinh', '$QueQuan', '$SDT', '$Email', '$NgayNhanViec')";
        
        if (mysqli_query($this->con, $sql)) {
            // Lưu thông báo thành công vào session
            session_start();
            $_SESSION['success_message'] = "Thêm nhân viên thành công!";
            
            // Chuyển hướng về trang danh sách nhân viên sau khi cập nhật thành công
            header("Location: http://localhost/PHP-MVC-MASTER/NhanVien/show");
            exit(); // Ngừng thực hiện script sau khi chuyển hướng
        } else {
            error_log("SQL Error: " . mysqli_error($this->con)); // Để dễ dàng debug
        }
    }

    // Cập nhật thông tin nhân viên
    public function updateNV($MaNhanVien, $TenNhanVien, $NgaySinh, $GioiTinh, $QueQuan, $SDT, $Email, $NgayNhanViec)
    {
        $sql = "UPDATE tbl_nhanvien 
                SET TenNhanVien = '$TenNhanVien', NgaySinh = '$NgaySinh', GioiTinh = '$GioiTinh', QueQuan = '$QueQuan', 
                    SDT = '$SDT', Email = '$Email', NgayNhanViec = '$NgayNhanViec' 
                WHERE MaNhanVien = '$MaNhanVien'";
        
        if (mysqli_query($this->con, $sql)) {
            // Lưu thông báo thành công vào session
            session_start();
            $_SESSION['success_message'] = "Cập nhật nhân viên thành công!";
            
            // Chuyển hướng về trang danh sách nhân viên sau khi cập nhật thành công
            header("Location: http://localhost/PHP-MVC-MASTER/NhanVien/show");
            exit(); // Ngừng thực hiện script sau khi chuyển hướng
        } else {
            error_log("SQL Error: " . mysqli_error($this->con)); // Để dễ dàng debug
        }
    }

    // Lấy thông tin chi tiết của một nhân viên
    public function getNV($id)
    {
        $sql = "SELECT * FROM tbl_nhanvien WHERE MaNhanVien = '$id'";
        $result = mysqli_query($this->con, $sql);
        $mang = array();
        while ($row = mysqli_fetch_array($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    // Xóa một nhân viên
    public function deleteNV($id)
    {
        $sql = "DELETE FROM tbl_nhanvien WHERE MaNhanVien = '$id'";
        if (mysqli_query($this->con, $sql)) {         
            // Chuyển hướng về trang danh sách nhân viên sau khi cập nhật thành công
            header("Location: http://localhost/PHP-MVC-MASTER/NhanVien/show");
            exit(); // Ngừng thực hiện script sau khi chuyển hướng
        } else {
            error_log("SQL Error: " . mysqli_error($this->con)); // Để dễ dàng debug
        }
    }
}
