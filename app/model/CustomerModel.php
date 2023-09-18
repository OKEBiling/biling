<?php
include_once MODEL_DIR . 'connect.php';

/**
*
*/
class CustomerModel extends Database
{
    
    
     const DATAOUTPUT = ['id', 'service_number', 'id_ODP', 'id_OLT', 'nama', 'alamat', 'email', 'phone', 'koordinat', 'COF', 'username', 'subscriptions', 'anual', 'status', 'updated_at', 'created_at']; 
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
            $this->user = $this->db->select('Ok_customer', '*', $conditional);
            return $this->user;
        } else {
            return $this;
        }
    }


    public function setCustomer() {}

    public function all() {
        $this->customer = $this->db->select('Ok_customer', self::DATAOUTPUT);
        return $this;
    }

    public function get() {
        return $this->customer;
    }

}