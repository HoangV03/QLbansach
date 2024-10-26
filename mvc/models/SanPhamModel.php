<?php
class SanPhamModel extends DB
{
    public function showProduct($masach)
    {
        $sql = "SELECT * FROM tbl_sach WHERE MaSach = '$masach'";
        $mang = array();
        $result = mysqli_query($this->con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    public function showMenu()
    {
        $sql = "SELECT * FROM tbl_danhmuc";
        $mang = array();
        $result = mysqli_query($this->con, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    public function show_page($item_per_page, $current_page)
    {
        $item_per_page = $item_per_page;
        $offset = ($current_page - 1) * $item_per_page;
        $products = mysqli_query($this->con, "SELECT * FROM tbl_sach LIMIT $item_per_page OFFSET $offset");
        while ($row = mysqli_fetch_assoc($products)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    public function totailpages($item_per_page)
    {
        $totalRecord = mysqli_query($this->con, " SELECT * FROM tbl_sach ");
        $totalRecord = mysqli_num_rows($totalRecord);
        $totalPages = ceil($totalRecord / $item_per_page);
        return ($totalPages);
    }

    public function searchtotailpages($item_per_page,$tensach)
    {
        $tensach = "%" . $tensach . "%";
        $tensach = mysqli_real_escape_string($this->con, $tensach);
        $totalRecord = mysqli_query($this->con, " SELECT * FROM tbl_sach WHERE TenSach LIKE '$tensach'");
        $totalRecord = mysqli_num_rows($totalRecord);
        $totalPages = ceil($totalRecord / $item_per_page);
        return ($totalPages);
    }

    public function search_page($item_per_page, $current_page, $tensach)
    {
        $item_per_page = $item_per_page;
        $offset = ($current_page - 1) * $item_per_page;
        $tensach = "%" . $tensach . "%";
        $tensach = mysqli_real_escape_string($this->con, $tensach);
        // Thực hiện câu truy vấn
        $products = mysqli_query($this->con, "SELECT * FROM tbl_sach WHERE TenSach LIKE '$tensach' LIMIT $item_per_page OFFSET $offset");
        $mang = []; // Khởi tạo mảng trống trước khi sử dụng
        while ($row = mysqli_fetch_assoc($products)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    public function search($tensach)
    {
        // Thêm ký tự % để tìm kiếm gần giống
        $tensach = "%" . $tensach . "%";
        // Sử dụng mysqli_real_escape_string để tránh SQL injection
        $tensach = mysqli_real_escape_string($this->con, $tensach);
        // Thực hiện câu truy vấn, lưu ý chuỗi cần được bao quanh bởi dấu nháy đơn
        $sql = "SELECT * FROM tbl_sach WHERE TenSach LIKE '$tensach'";
        $result = mysqli_query($this->con, $sql);
        // Khởi tạo mảng trống
        $mang = array();
        // Đẩy dữ liệu vào mảng
        while ($row = mysqli_fetch_array($result)) {
            $mang[] = $row;
        }
        // Trả về kết quả dưới dạng JSON
        return json_encode($mang);
    }

    public function getSGK($id)
    {
        $sql = "SELECT * FROM tbl_sach WHERE MaDanhMuc = '$id'";
        $result = mysqli_query($this->con, $sql);
        $danhmucList = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $danhmucList[] = $row;
        }
        return json_encode($danhmucList);
    }
}
