<?php
class DanhMucModelAD extends DB
{
    // Hiển thị danh sách tất cả danh mục
    public function showDanhMuc()
    {
        $sql = "SELECT * FROM tbl_DanhMuc";
        $result = mysqli_query($this->con, $sql);
        $mang = array();
        while ($row = mysqli_fetch_array($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    // Thêm danh mục mới
    public function createDanhMuc($MaDanhMuc, $TenDanhMuc )
    {
        $sql = "INSERT INTO tbl_DanhMuc (MaDanhMuc, TenDanhMuc) 
                VALUES ('$MaDanhMuc', '$TenDanhMuc' )";
        
        if (mysqli_query($this->con, $sql)) {
            // Lưu thông báo thành công vào session
            session_start();
            $_SESSION['success_message'] = "Thêm danh mục thành công!";
            
            // Chuyển hướng về trang danh mục sau khi cập nhật thành công
            header("Location: http://localhost/PHP-MVC-MASTER/DanhMucAD/show");
            exit(); // Ngừng thực hiện script sau khi chuyển hướng
        } else {
            error_log("SQL Error: " . mysqli_error($this->con)); // Để dễ dàng debug
        }
    }

    // Cập nhật thông tin danh mục
    public function updateDanhMuc($MaDanhMuc, $TenDanhMuc )
    {
        $sql = "UPDATE tbl_DanhMuc
                SET TenDanhMuc = '$TenDanhMuc' 
                
                WHERE MaDanhMuc = '$MaDanhMuc'";
        
        if (mysqli_query($this->con, $sql)) {
            // Lưu thông báo thành công vào session
            session_start();
            $_SESSION['success_message'] = "Cập nhật danh mục thành công!";
            
            // Chuyển hướng về trang danh mục sau khi cập nhật thành công
            header("Location: http://localhost/PHP-MVC-MASTER/DanhMucAD/show");
            exit(); // Ngừng thực hiện script sau khi chuyển hướng
        } else {
            error_log("SQL Error: " . mysqli_error($this->con)); // Để dễ dàng debug
        }
    }

    // Lấy thông tin chi tiết của một danh mục
    public function getDanhMuc($MaDanhMuc)
    {
        $sql = "SELECT * FROM tbl_DanhMuc WHERE MaDanhMuc = '$MaDanhMuc'";
        $result = mysqli_query($this->con, $sql);
        $mang = array();
        while ($row = mysqli_fetch_array($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    // Xóa một danh mục
    public function deleteDanhMuc($MaDanhMuc)
    {
        $sql = "DELETE FROM tbl_DanhMuc WHERE MaDanhMuc = '$MaDanhMuc'";
        if (mysqli_query($this->con, $sql)) {
            // Chuyển hướng về trang danh mục sau khi cập nhật thành công
            header("Location: http://localhost/PHP-MVC-MASTER/DanhMucAD/show");
            exit(); // Ngừng thực hiện script sau khi chuyển hướng
        } else {
            error_log("SQL Error: " . mysqli_error($this->con)); // Để dễ dàng debug
        }
    }
}
