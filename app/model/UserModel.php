<?php

include_once MODEL_DIR . 'connect.php';

class UserModel extends Database {
    protected $username;
    protected $password;
    public $id;
    public $userid;
    public function __construct() {
        parent::__construct();
    }

        public function authenticateUser($username, $password) {
            // Validate input
            if (empty($username) || empty($password)) {
                return false;
            }
            $conditions = ["AND" => ["OR" => [ "username" => $username,"email" => $username,], "password" => $password]];
            if ($this->db->has('Ok_users', $conditions)) {
                 $this->userid = $this->db->get('Ok_users', 'id',  ["AND" => ["OR" => [ "username" => $username,"email" => $username,]]]);
                return true;
            } else {
                return false;
            }
        }
         
        public function getUser($id = null, $conditional = []) {
            if (!empty($id)) {
                $conditions = ["AND" => ["id" => $id]];
                $this->user = $this->db->get('Ok_users',  ['id', 'name', 'username','email', 'permission_levels', 'role',], $conditions);
                return $this;
            } elseif (!empty($conditional)) {
                // Menerapkan penyaringan kondisional
                $this->user = $this->db->select('Ok_users', '*', $conditional);
                return $this->user;
            } else {
                return $this;
            }
        }
        
        public function all() {
            $this->user = $this->db->select('Ok_users', '*');
            return $this->user;
        }
        
        public function get() {
            return $this->user;
        }

    



}