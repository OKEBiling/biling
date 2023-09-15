<?php

/**
*
*/

class dashboardController extends App {
    private $isLogin;
    private $doLogin;

    public function __construct() {

        parent::__construct();
        if ($this->requestMethod === 'GET') {
            $this->init();
        } else if ($this->requestMethod === 'POST') {
            $this->processPost();
        }
    }

    public function init() {
        $this->title = 'Dashboard - Okebiling';
        $this->layout()->view('dashboard', $this->LoadLib());
        
    }

    public function isLogin() {
        
        
    }



    public function LoadLib() {
        return [
            'cssLinks' => [
            ],
            'scripts' => [
            ],
        ];
    }
}