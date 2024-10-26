<?php
class Home extends Controller
{
    public $SanPhamModel;
    public $item_per_page = 10;
    public function __construct()
    {
        $this->SanPhamModel = $this->model("SanPhamModel");
    }

    public function SayHi()
    {  
        if (isset($_SESSION['thanhtoan'])) {
            unset($_SESSION['thanhtoan']);          
        }     
        $current_page =1;
        $data=$this->SanPhamModel->show_page($this->item_per_page,$current_page);  
        $page = $this->SanPhamModel->totailpages($this->item_per_page);
        $menu = $this->SanPhamModel->showMenu();
        $this->view("aodep", [
            "page1" => "header",
            "page2" => "container",
            "page3" => "footer",
            "sp" => $data,
            "trang" => $page,
            "cur_page" =>$current_page,
            "menu" => $menu,
        ]);
    } 
    
    public function page($current_page)
    {
        $current_page = !empty($current_page) ? $current_page :1;        
        $data=$this->SanPhamModel->show_page($this->item_per_page,$current_page);  
        $page = $this->SanPhamModel->totailpages($this->item_per_page);    
        $menu = $this->SanPhamModel->showMenu();
        $this->view("aodep", [
            "page1" => "header",
            "page2" => "container",
            "page3" => "footer",
            "sp" => $data,
            "trang" => $page,
            "cur_page" =>$current_page,
            "menu" => $menu,
        ]);
    
    }

    public function timkiem(){
        $search = '';
        if($_SERVER["REQUEST_METHOD"] === "POST"){
            if(isset($_POST["timkiem"])){
                $search = $_POST["namesearch"];
            }
        }
        $data = $this->SanPhamModel->search($search);
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
