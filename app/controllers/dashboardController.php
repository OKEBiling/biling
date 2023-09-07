<?php

/**
*
*/

class dashboardController {
    private $isLogin;
    private $doLogin;

    public function __construct($actionSegments) {
        array_shift($actionSegments);
        if (count($actionSegments) > 0) {
            $actionSegments = array_combine(range(1, count($actionSegments)), $actionSegments);
        }
        $this->dashboard(Helper::reindexJsonArray($actionSegments));
        
        
    
        
    }



    public function dashboard($segment) {
        
        if(empty($segment)){
            $this->isLogin();
            
        }else{
            
            echo json_encode($segment);
            
            echo 'segment tidak di ketahui';
        }
    }

    public function isLogin() {

        if (Session::get('login')) {
            echo 'sudah login';
            
        } else {
           include BASIC_PATH.'login.php';
        }


    }

    public function doLogin() {}
}