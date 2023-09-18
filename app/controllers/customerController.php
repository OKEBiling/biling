<?php
include_once MODEL_DIR . 'CustomerModel.php';

/**
 * 
 */
class customerController extends App
{
    
    /**
     * 
     */
    public function __construct(){
        parent::__construct();
        $this->CustomerModel = new CustomerModel();
       if ($this->requestMethod === 'GET') {
            $this->init();
        } else if ($this->requestMethod === 'POST') {
            $this->processPost();
        }
       
    }
    
    public function init(){
        $this->getCustomer();
        $this->title = 'Customer - Okebiling';
        $this->layout()->view('customer', []);
    }
    
    
    public function getCustomer(){
        $this->customerall= $this->CustomerModel->all();
        return $this->customerall;
    }
}