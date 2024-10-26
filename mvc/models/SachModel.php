<?php
class SachModel extends DB
{
    public function showSach()
    {
        $sql = "SELECT * FROM tbl_sach";
        $result = mysqli_query($this->con, $sql);
        $mang = array();
        while ($row = mysqli_fetch_array($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    public function createSach($MaSach, $TenSach, $Gia, $SoLuong, $MaDanhMuc, $Anh, $MoTa)
{
    $sql = "INSERT INTO tbl_sach (MaSach, TenSach, Gia, SoLuong, MaDanhMuc, Anh, MoTa) 
            VALUES ('$MaSach', '$TenSach', '$Gia', '$SoLuong', '$MaDanhMuc', '$Anh', '$MoTa')";
    $result = false;
    if (mysqli_query($this->con, $sql)) {
        $result = true;
    } else {
        error_log("SQL Error: " . mysqli_error($this->con));
    }
    return json_encode($result);
}
    

    public function updateSach($maSach, $tenSach, $giaSach, $soLuong, $hinhAnh, $moTa)
{
    $sql = "UPDATE tbl_sach 
        SET TenSach = '$tenSach', Gia = '$giaSach', SoLuong = '$soLuong', Anh = '$hinhAnh', MoTa = '$moTa' 
        WHERE MaSach = '$maSach'";

    $result = false;
        if (mysqli_query($this->con, $sql)) {
            $result = true;
        } else {
            error_log("SQL Error: " . mysqli_error($this->con));
        }
        return json_encode($result);
}
    

    public function getSach($id)
    {
        $sql = "SELECT * FROM tbl_sach WHERE MaSach = '$id'";
        $result = mysqli_query($this->con, $sql);
        $mang = array();
        while ($row = mysqli_fetch_array($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    public function deleteSach($id)
    {
        $sql = "DELETE FROM tbl_sach WHERE MaSach = '$id' ";
        $result = false;
        if (mysqli_query($this->con, $sql)) {
            $result = true;
        } else {
            // Log lỗi cụ thể của MySQL để dễ debug
            error_log("SQL Error: " . mysqli_error($this->con));
        }
        return json_encode($result);
    }


   
    
}



