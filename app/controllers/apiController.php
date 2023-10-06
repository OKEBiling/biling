<?php


/**
 * 
 */
class apiController extends App 
{
    
    /**
     * 
     */
    public function __construct()
    {
       parent::__construct();
       $this->init();
    }
    
    
    
    public function init(){
        echo 'api';
    }
}