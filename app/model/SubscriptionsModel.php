<?php

class SubscriptionsModel extends Database{
    
    /**
     * 
     */
       public function __construct() {
        parent::__construct();
    }
    
            
        public function  getSubscriptions($id = null, $conditional = []) {
            if (!empty($id)) {
                $conditions = ["AND" => ["id" => $id]];
                $this->subscriptions = $this->db->get('Ok_subscriptions',  ['id', 'package', 'profile','service', 'amount',], $conditions);
                return $this;
            } elseif (!empty($conditional)) {
                // Menerapkan penyaringan kondisional
                $this->subscriptions = $this->db->select('Ok_subscriptions', '*', $conditional);
                return $this->subscriptions;
            } else {
                return $this;
            }
        }
        
        
         public function  getSubscriptionsID($id) {
                $conditions = ["AND" => ["id" => $id]];
                $this->subscriptions = $this->db->get('Ok_subscriptions',  ['id', 'package', 'profile','service', 'amount',], $conditions);
                return  $this->subscriptions ;
        }
        /**
         * Mengambil semua data pengguna
         * @return array|bool
         */
        public function all() {
            $this->subscriptions = $this->db->select('Ok_subscriptions', '*');
            return $this->subscriptions;
        }
        
        public function get() {
            return $this->subscriptions;
        }

}