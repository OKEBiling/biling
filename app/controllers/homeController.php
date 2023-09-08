<?php

/**
 * 
 */
class homeController extends App{
    private $isLogin;
    private $doLogin;
    /**
     * 
     * 
     * 
     */
    public function __construct()
    {
        $this->isLogin();
        
        
            }
            
            
    public function isLogin(){
        
        if (Session::get('login')) {
          echo 'sudah login';
        } else {
          echo 'belum login';
        }
        
        
    }
    
    
    public function doLogin(){
        
        
        
    }
}