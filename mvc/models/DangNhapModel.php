<?php
class DangNhapModel extends DB{
    public function checkDN($us,$pa){
        $sql = "SELECT * FROM tbl_taikhoankhachhang 
        WhERE TenDangNhap = '$us' AND MatKhau = '$pa'";
        $result = false;
        $query=mysqli_query($this->con,$sql);
        if(mysqli_num_rows($query) > 0){
            $result = true;
        }
        return json_encode($result);
    }

    public function createKH($hoten,$ngaysinh,$gioitinh,$sdt,$diachi,$email,$us,$pa){
        $sql = "INSERT INTO tbl_taikhoankhachhang (TenKhachHang, NgaySinh, GioiTinh, SDT, DiaChi, Email, TenDangNhap, MatKhau)
        VALUES ('$hoten','$ngaysinh','$gioitinh','$sdt','$diachi','$email','$us','$pa')";
        $result = false;
        if(mysqli_query($this->con,$sql)){
            $result = true;
        }
        return json_encode($result);
    }

    public function checkDnAd($us,$pa){
        $sql = "SELECT * FROM tbl_taikhoannhanvien 
        WhERE TenDangNhap = '$us' AND MatKhau = '$pa'";
        $result = false;
        $query=mysqli_query($this->con,$sql);
        if(mysqli_num_rows($query) > 0){
            $result = true;
        }
        return json_encode($result);
    }

    public function get_info_ad($us,$pa){
        $sql = "SELECT * FROM tbl_taikhoannhanvien
        WHERE TenDangNhap = '$us' AND MatKhau = '$pa'";
        $mang=array();
        $result = mysqli_query($this->con,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $mang[] = $row;
        }
        return json_encode($mang);
    }
    public function get_info_user($us,$pa){
        $sql = "SELECT * FROM tbl_taikhoankhachhang
        WHERE TenDangNhap = '$us' AND MatKhau = '$pa'";
        $mang=array();
        $result = mysqli_query($this->con,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $mang[] = $row;
        }
        return json_encode($mang);
    }
}
?>