<?php
class NhaCungCapModel extends DB
{
    // Hiển thị danh sách tất cả nhà cung cấp
    public function showNhaCungCap()
    {
        $sql = "SELECT * FROM tbl_nhacungcap";
        $result = mysqli_query($this->con, $sql);
        $mang = array();
        while ($row = mysqli_fetch_array($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    // Thêm nhà cung cấp mới
    public function createNhaCungCap($MaNhaCungCap, $TenNhaCungCap, $DiaChi, $SDT, $Email)
    {
        $sql = "INSERT INTO tbl_nhacungcap (MaNhaCungCap, TenNhaCungCap, DiaChi , SDT, Email) 
                VALUES ('$MaNhaCungCap', '$TenNhaCungCap', '$DiaChi', '$SDT', '$Email')";
        
        if (mysqli_query($this->con, $sql)) {
            // Lưu thông báo thành công vào session
            session_start();
            $_SESSION['success_message'] = "Thêm nhà cung cấp thành công!";
            
            // Chuyển hướng về trang danh sách nhà cung cấp sau khi cập nhật thành công
            header("Location: http://localhost/PHP-MVC-MASTER/NhaCungCap/show");
            exit(); // Ngừng thực hiện script sau khi chuyển hướng
        } else {
            error_log("SQL Error: " . mysqli_error($this->con)); // Để dễ dàng debug
        }
    }

    // Cập nhật thông tin nhà cung cấp
    public function updateNhaCungCap($MaNhaCungCap, $TenNhaCungCap, $DiaChi, $SDT, $Email)
    {
        $sql = "UPDATE tbl_nhacungcap
                SET TenNhaCungCap = '$TenNhaCungCap', DiaCHi = '$DiaChi', 
                    SDT = '$SDT', Email = '$Email' 
                WHERE MaNhaCungCap = '$MaNhaCungCap'";
        
        if (mysqli_query($this->con, $sql)) {
            // Lưu thông báo thành công vào session
            session_start();
            $_SESSION['success_message'] = "Cập nhật tài khoản thành công!";
            
            // Chuyển hướng về trang danh sách nhà cung cấp sau khi cập nhật thành công
            header("Location: http://localhost/PHP-MVC-MASTER/NhaCungCap/show");
            exit(); // Ngừng thực hiện script sau khi chuyển hướng
        } else {
            error_log("SQL Error: " . mysqli_error($this->con)); // Để dễ dàng debug
        }
    }

    // Lấy thông tin chi tiết của một nhà cung cấp
    public function getNhaCungCap($MaNhaCungCap)
    {
        $sql = "SELECT * FROM tbl_nhacungcap WHERE MaNhaCungCap = '$MaNhaCungCap'";
        $result = mysqli_query($this->con, $sql);
        $mang = array();
        while ($row = mysqli_fetch_array($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    // Xóa một nhà cung cấp
    public function deleteNhaCungCap($MaNhaCungCap)
    {
        $sql = "DELETE FROM tbl_nhacungcap WHERE MaNhaCungCap = '$MaNhaCungCap'";
        if (mysqli_query($this->con, $sql)) {
            // Chuyển hướng về trang danh sách tài khoản sau khi cập nhật thành công
            header("Location: http://localhost/PHP-MVC-MASTER/NhaCungCap/show");
            exit(); // Ngừng thực hiện script sau khi chuyển hướng
        } else {
            error_log("SQL Error: " . mysqli_error($this->con)); // Để dễ dàng debug
        }
    }
}
