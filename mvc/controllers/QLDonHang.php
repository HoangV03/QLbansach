<?php

// http://localhost/live/Home/Show/1/2

class QLDonHang extends Controller{

    public $QLDH;

    public function __construct()
    {
        $this->QLDH = $this->Model("QuanLyDonHangModel");       
    }
    

}
?>