<?php

include_once MODEL_DIR . 'connect.php';

class UserModel extends Database {
    protected $username;
    protected $password;
    
    public function __construct() {
        parent::__construct();
    }
    public function authenticateUser($username, $password) {
        // Validate input
        if (empty($username) || empty($password)) {
            return false;
        }
        $conditions = ["AND" => ["OR" => [ "password" => $username,"email" => $username,], "password" => $password]];
        if ($this->db->has('Ok_users', $conditions)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getUser($identifier, $all = false) {
        $conditions = ["AND" => ["id" => $identifier]];
        if ($all) {
            $this->user = $this->db->select('Ok_users', '*');
        } else {
            $this->user = $this->db->get('Ok_users', '*', $conditions);
        }
        return $this->user;
    }

}