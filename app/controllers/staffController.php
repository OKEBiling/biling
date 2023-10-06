<?php


/**
 * 
 */
class staffController extends App
{
    
    /**
     * 
     */
    public function __construct()
    {
        parent::__construct();
        $this->title = 'User - Okebiling';
        return $this->layout()->view('userpermission',[]);   // code...
    }
}