<?php
class NhapKhoModel extends DB
{
    public function showNhapKho()
    {
        $sql = "SELECT * FROM tbl_nhapkho";
        $result = mysqli_query($this->con, $sql);
        $mang = array();
        while ($row = mysqli_fetch_array($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    public function createNhapKho($MaKho, $MaSach, $SoLuong, $MaNhaCungCap, $NgayNhap, $DonGia, $MaNhanVien)
    {
        $sql = "INSERT INTO tbl_nhapkho VALUES('$MaKho','$MaSach','$SoLuong','$MaNhaCungCap','$NgayNhap','$DonGia','$MaNhanVien')";
        $result = false;
        if (mysqli_query($this->con, $sql)) {
            $result = true;
        } else {
            // Log lỗi cụ thể của MySQL để dễ debug
            error_log("SQL Error: " . mysqli_error($this->con));
        }
        return json_encode($result);
    }

    public function updateNhapKho($MaKho, $MaSach, $SoLuong, $MaNhaCungCap, $NgayNhap, $DonGia)
    {
        $sql = "UPDATE tbl_nhapkho 
        SET  MaKho = '$MaKho', SoLuong = '$SoLuong', MaNhaCungCap = '$MaNhaCungCap' ,NgayNhap ='$NgayNhap',DonGia = '$DonGia'
        WHERE MaSach = '$MaSach'";

        $result = false;
        if (mysqli_query($this->con, $sql)) {
            $result = true;
        } else {
            // Log lỗi cụ thể của MySQL để dễ debug
            error_log("SQL Error: " . mysqli_error($this->con));
        }
        return json_encode($result);
    }

    public function getNhapKho($id)
    {
        $sql = "SELECT * FROM tbl_nhapkho WHERE MaSach= '$id'";
        $result = mysqli_query($this->con, $sql);
        $mang = array();
        while ($row = mysqli_fetch_array($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    public function deleteNhapKho($id)
    {
        $sql = "DELETE FROM tbl_nhapkho WHERE MaSach = '$id'";
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
