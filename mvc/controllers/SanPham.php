<?php
    class SanPham extends Controller{
        public $SanPhamModel;

        public function __construct()
        {
            $this->SanPhamModel = $this->model("SanPhamModel");
        }

        public function detailProdcut($masach){
            $product = $this->SanPhamModel->showProduct($masach);
            $this->view("aodep",[
                "page1" => "header",
                "page2" => "chitietsanpham" ,
                "page3" => "footer",
                "detailSP" => $product
            ]);
        }

    }
?>