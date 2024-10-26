<?php
class NhapKhoModel extends DB
{
    public function showNhapKho()
    {
        $sql = "SELECT * FROM tbl_NhapKho";
        $result = mysqli_query($this->con, $sql);
        $mang = array();
        while ($row = mysqli_fetch_array($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    public function createNhapKho($MaKho, $MaLoHang, $SoLuongNhap, $MaNhaCungCap, $NgayNhap, $DonGia)
    {
        $sql = "INSERT INTO tbl_NhapKho VALUES('$MaLoHang','$MaKho','$SoLuongNhap','$MaNhaCungCap','$NgayNhap','$DonGia')";
        $result = false;
        if (mysqli_query($this->con, $sql)) {
            $result = true;
        }
        echo $result;
        return json_encode($result);
    }

    public function updateNhapKho($MaKho, $MaLoHang, $SoLuongNhap, $MaNhaCungCap, $NgayNhap, $DonGia)
    {
        $sql = "UPDATE tbl_NhapKho 
        SET  MaKho = '$MaKho', SoLuongNhap = '$SoLuongNhap', MaNhaCungCap = '$MaNhaCungCap' ,NgayNhap ='$NgayNhap',DonGia = '$DonGia'
        WHERE MaLoHang = '$MaLoHang'";

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
        $sql = "SELECT * FROM tbl_NhapKho WHERE MaLoHang = '$id'";
        $result = mysqli_query($this->con, $sql);
        $mang = array();
        while ($row = mysqli_fetch_array($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    public function deleteNhapKho($id)
    {
        $sql = "DELETE FROM tbl_NhapKho WHERE MaLoHang = '$id'";
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
