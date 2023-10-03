<?php
include_once MODEL_DIR . 'CustomerModel.php';
include_once MODEL_DIR . 'SubscriptionsModel.php';
include_once MODEL_DIR . 'TaskCustomerModel.php';
include_once CONTROLLER_DIR . 'customerTaskController.php';
/**
*
*/
class customerController extends App
{

    /**
    *
    */
    public function __construct() {
        parent::__construct();
        $this->urlSegments = URLController::getSegments();
        $this->init();
    }
    public function init() {
        error_reporting(0);
        array_shift($this->urlSegments);
        switch ($this->urlSegments[0]) {
            case 'task':
                return new customerTaskController();
                break;
            default:
                return $this->CustomerView();
                break;
        }
    }
    public function CountTask() {
          $this->TaskCustomerModel = new TaskCustomerModel();
        return $this->TaskCustomerModel->countsTask();
    }
    
    public function CustomerView() {
         $this->CustomerModel = new CustomerModel();
        $this->customerall = $this->CustomerModel->all();
        $this->title = 'Customer - Okebiling';
        return $this->layout()->view('customer', $this->loadlib());

    }
    
    public function loadlib() {
        return [];
    }
}