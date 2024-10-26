<?php

    class TimKiem extends Controller{
        public $SanPhamModel;
    public function __construct()
    {
        $this->SanPhamModel = $this->model("SanPhamModel");
    }

    public function Show($current_page)
    {
        $current_page = !empty($current_page) ? $current_page :1;
        $data=$this->SanPhamModel->show_page($current_page);
        $this->view("aodep", [
            "page1" => "header",
            "page2" => "container",
            "sp" => $data
        ]);
    }
    }
?>