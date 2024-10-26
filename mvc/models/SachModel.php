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

    public function createSach($MaSach, $MaKho, $TenSach, $TacGia, $Gia, $SoLuong, $MaDanhMuc, $Anh, $MoTa)
{
    $sql = "INSERT INTO tbl_sach (MaSach, MaKho, TenSach, TacGia, Gia, SoLuong, MaDanhMuc, Anh, MoTa) 
            VALUES ('$MaSach', $MaKho, '$TenSach', '$TacGia', '$Gia', '$SoLuong', '$MaDanhMuc', '$Anh', '$MoTa')";
    $result = false;
    if (mysqli_query($this->con, $sql)) {
        $result = true;
    } else {
        error_log("SQL Error: " . mysqli_error($this->con));
    }
    return json_encode($result);
}
    

    public function updateSach($maSach, $MaKho, $tenSach, $tacGia, $giaSach, $soLuong, $hinhAnh, $moTa, $maDanhMuc)
{
    $sql = "UPDATE tbl_sach 
        SET TenSach = '$tenSach', TacGia = '$tacGia', Gia = '$giaSach', SoLuong = '$soLuong', Anh = '$hinhAnh', MoTa = '$moTa',
        MaDanhMuc = '$maDanhMuc' 
        WHERE MaSach = '$maSach' and MaKho = '$MaKho'";

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



