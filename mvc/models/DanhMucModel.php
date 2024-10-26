<?php
class DanhMucModel extends DB
{
    public function getAllDanhMuc()
    {
        $sql = "SELECT * FROM tbl_danhmuc";
        $result = mysqli_query($this->con, $sql);
        $danhmucList = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $danhmucList[] = $row;
        }
        return json_encode($danhmucList);
    }   

   
}
