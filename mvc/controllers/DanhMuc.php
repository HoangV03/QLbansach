<?php
class DanhMuc extends Controller
{
    public $SanPhamModel;

    public function __construct()
    {
        $this->SanPhamModel = $this->model("SanPhamModel");
    }

    public function show($id){
        $data = $this->SanPhamModel->getSGK($id);
        $menu = $this->SanPhamModel->showMenu();
        $this->view("aodep", [
            "page1" => "header",
            "page2" => "container",
            "page3" => "footer",
            "sp" => $data,
            "menu" => $menu,   
        ]);
    }
}
