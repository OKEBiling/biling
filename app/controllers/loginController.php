<?php


/**
 * 
 */
class loginController extends App{
    public $login;
    /**
     * 
     */
     
     
    public function __construct(){
     
        parent::__construct();
        
        $this->renderView('login', $data = []);
       
    }
    
    
    
    public function doLogin(){
        
        
    }
    public function login(){
        
        echo json_encode($this->urlSegments);
        
    }
    
}