<?php

/**
*
*/

class dashboardController extends App{
    private $isLogin;
    private $doLogin;

    public function __construct() {
        
        
        
        parent::__construct();
        $this->titile='Dashboard - Okebiling';

        $this->dashboard(Helper::reindexJsonArray($this->urlSegments));

    }



    public function dashboard($segment) {
        
        if(empty($segment)){
           return  Helper::redirectLogin(true);
            
        }else{
            
            return  Helper::redirectLogin(true);
        }
    }

    public function isLogin() {

        if (Session::get('login')) {
            echo 'sudah login';
            
        } else {
            
           return  Helper::redirectLogin(true);
        }


    }

    public function doLogin() {}
}