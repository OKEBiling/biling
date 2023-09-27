<?php
include_once MODEL_DIR . 'CustomerModel.php';
include_once MODEL_DIR . 'SubscriptionsModel.php';
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
        $this->CustomerModel = new CustomerModel();
        array_shift($this->urlSegments);
        if ($this->requestMethod === 'GET') {
            if ($this->urlSegments) {
                switch ($this->urlSegments[0]) {
                    case 'add':
                        return $this->add();
                        break;
                    case 'del':
                        break;
                    default:
                        return $this->getCustomer();
                        break;
                }
            } else {
                $this->getCustomer();
            }
        } else if ($this->requestMethod === 'POST') {
            $this->processPost();
        }

    }


    public function add() {
        
        $this->subscriptions = new SubscriptionsModel();
        $this->title = 'Add Customer - Okebiling';
        $this->layout()->view('addcustomer', $this->loadlib());

    }

  public function loadlib() {
        return [
        'cssLinks' => [
            'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css',
            '/assets/vendor/libs/select2/select2.css',
            '/assets/vendor/libs/bootstrap-select/bootstrap-select.css'],
        'scripts' => [
            '/assets/vendor/libs/leaflet/leaflet.js',
            '/assets/js/forms-selects.js?'.rand(1,100),
            '/assets/vendor/libs/select2/select2.js',
            '/assets/vendor/libs/cleavejs/cleave.js',
            '/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js',
            '/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js',
            '/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js',
            '/assets/js/customer.js?'.rand(1,100)]];
    }

    public function getCustomer() {
        $this->customerall = $this->CustomerModel->all();
        $this->title = 'Customer - Okebiling';
        
        return $this->layout()->view('customer', $this->loadlib());


    }
    
    
    public function processPost(){
         $this->title = 'Add Customer - Okebiling';
       echo json_encode($_POST);
    }
}