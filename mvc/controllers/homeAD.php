<?php

// http://localhost/live/Home/Show/1/2

class HomeAD extends Controller{

    
    // Must have SayHi()
    function SayHi(){
        $this->view("aoxau",[
            "page"=>"qlHomeAD"
        ]);       
    }
}
?>