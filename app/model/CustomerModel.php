<?php
include_once MODEL_DIR . 'connect.php';
/**
*
*/
class CustomerModel extends Database {
    
    const FILTEROUTPUT = []; 
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getCustomer() {
        if (!empty($id)) {
            $conditions = ["AND" => ["id" => $id]];
            $this->user = $this->db->get('Ok_customer', '*', $conditions);
            return $this;
        } elseif (!empty($conditional)) {
            // Menerapkan penyaringan kondisional
            $this->user = $this->db->select('Ok_customer', '*', $conditional);
            return $this->user;
        } else {
            return $this;
        }
    }

    public function all() {
        $this->customer = $this->db->select('Ok_customer', '*');
        return $this;
    }
    
    public function get() {
        return $this->customer;
    }
    
    public function countCustomer(){
        $this->countCustomer = $this->db->count('Ok_customer');
         return $this->countCustomer;
    }

}