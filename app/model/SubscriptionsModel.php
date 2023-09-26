<?php
/**
 * 
 */
class SubscriptionsModel extends Database {
 
    public function __construct() {
        parent::__construct();
    }
    
    
    public function getSubscriptions($id = null, $conditional = []) {
        if (!empty($id)) {
                $conditions = ["AND" => ["id" => $id]];
                $this->Subscriptions = $this->db->get('Ok_subscriptions', $conditions);
                return $this;
            } else {
                // Menerapkan penyaringan kondisional
                $this->Subscriptions = $this->db->select('Ok_subscriptions', '*');
                return $this->Subscriptions;
            }
    }
    
    
    

}