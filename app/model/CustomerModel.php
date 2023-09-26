<?php
include_once MODEL_DIR . 'connect.php';

/**
*
*/
class CustomerModel extends Database {
    
    
    const DATAOUTPUT = ['id', 'idservice', 'idODP', 'idOLT','idONU','nama', 'alamat', 'email', 'phone', 'koordinat', 'idCOF', 'username', 'subscriptions', 'anual', 'status', 'updated_at', 'aktivasi','idseles','created_at']; 
    public function __construct() {
        parent::__construct();
    }

    public function getCustomer() {
        if (!empty($id)) {
            $conditions = ["AND" => ["id" => $id]];
            $this->user = $this->db->get('Ok_customer', self::DATAOUTPUT, $conditions);
            return $this;
        } elseif (!empty($conditional)) {
            // Menerapkan penyaringan kondisional
            $this->user = $this->db->select('Ok_customer', self::DATAOUTPUT, $conditional);
            return $this->user;
        } else {
            return $this;
        }
    }


    public function setCustomer() {
        
        
    }

    public function all() {
        $this->customer = $this->db->select('Ok_customer', self::DATAOUTPUT);
        return $this;
    }

    public function get() {
        return $this->customer;
    }

    public function addCustomer(){
        
    }



}