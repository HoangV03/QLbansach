<?php
class KhoModel extends DB
{
    public function showKho()
    {
        $sql = "SELECT * FROM tbl_kho";
        $result = mysqli_query($this->con, $sql);
        $mang = array();
        while ($row = mysqli_fetch_array($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    public function createKho($MaKho, $TenKho, $DiaDiem, $KichThuoc)
    {
        $sql = "INSERT INTO tbl_kho VALUES('$MaKho','$TenKho','$DiaDiem','$KichThuoc')";
        $result = false;
        if (mysqli_query($this->con, $sql)) {
            $result = true;
        }
        return json_encode($result);
    }

    public function updateKho($MaKho, $TenKho, $DiaDiem, $KichThuoc)
    {
        $sql = "UPDATE tbl_kho 
        SET MaKho = '$MaKho', TenKho = '$TenKho', DiaDiem = '$DiaDiem', KichThuoc = '$KichThuoc' 
        WHERE MaKho = '$MaKho'";

        $result = false;
        if (mysqli_query($this->con, $sql)) {
            $result = true;
        } else {
            // Log lỗi cụ thể của MySQL để dễ debug
            error_log("SQL Error: " . mysqli_error($this->con));
        }
        return json_encode($result);
    }


    public function getKho($id)
    {
        $sql = "SELECT * FROM tbl_kho WHERE Makho = '$id'";
        $result = mysqli_query($this->con, $sql);
        $mang = array();
        while ($row = mysqli_fetch_array($result)) {
            $mang[] = $row;
        }
        return json_encode($mang);
    }

    public function deleteKho($id)
    {
        $sql = "DELETE FROM tbl_kho WHERE MaKho = '$id'";
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
