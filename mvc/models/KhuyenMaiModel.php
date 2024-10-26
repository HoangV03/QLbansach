<?php
class KhuyenMaiModel extends DB
{
    public function showKM()
    {
        $sql = "SELECT * FROM tbl_khuyenmai";
        $result = mysqli_query($this->con, $sql);
        $mang = array();
        while ($row = mysqli_fetch_array($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    public function createKM($MaGiamGia, $TenGiamGia, $SoTien, $TuNgay, $DenNgay)
    {
        $sql = "INSERT INTO tbl_khuyenmai VALUES('$MaGiamGia','$TenGiamGia','$SoTien','$TuNgay','$DenNgay')";
        $result = false;
        if (mysqli_query($this->con, $sql)) {
            $result = true;
        }
        return json_encode($result);
    }

    public function updateKM($MaGiamGia, $TenGiamGia, $SoTien, $TuNgay, $DenNgay)
    {
        $sql = "UPDATE tbl_khuyenmai 
        SET TenKM = '$TenGiamGia', SoTien = '$SoTien', TuNgay = '$TuNgay', DenNgay = '$DenNgay' 
        WHERE MaKM = '$MaGiamGia'";

        $result = false;
        if (mysqli_query($this->con, $sql)) {
            $result = true;
        } else {
            // Log lỗi cụ thể của MySQL để dễ debug
            error_log("SQL Error: " . mysqli_error($this->con));
        }
        return json_encode($result);
    }

    public function getKM($id)
    {
        $sql = "SELECT * FROM tbl_khuyenmai WHERE MaKM = '$id'";
        $result = mysqli_query($this->con, $sql);
        $mang = array();
        while ($row = mysqli_fetch_array($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    public function deleteKM($id){
        $sql = "DELETE FROM tbl_khuyenmai WHERE MaKM = '$id'";
        $result = false;
        if(mysqli_query($this->con,$sql)){
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
        $sql = "SELECT * FROM tbl_khuyenmai 
            WHERE TenKM LIKE '$tenkh' ";
        $result = mysqli_query($this->con, $sql);
        $mang = array();
        while ($row = mysqli_fetch_array($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }
}
