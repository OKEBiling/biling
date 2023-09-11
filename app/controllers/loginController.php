<?php


/**
 * 
 */
class loginController extends App{
    public $login;
    
    public function __construct(){
        parent::__construct();
        if ($this->requestMethod==='GET') {
          $this->login();
        } else if ($this->requestMethod==='POST') {
         $this->loginform();
        }
    }
    
    
    public function doLogin(){
        
        
    }
    public function login(){
        
        $this->titile='Login - OKEBiling';
        $this->renderView('login', $data = []);
        
    }
    
    public function loginform(){
        echo json_encode($_POST);
        
    }
    
    
    
}