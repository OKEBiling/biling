<?php


class TaskCustomerModel extends Database {

    const MAINTABLE= 'Ok_task_customer';
    const PROGTABLE= 'Ok_follow_task_progress';
    
    public function __construct() {
        parent::__construct();
        

    }
    
    public function getTask($conditional=null) {
        if (!empty($conditional)) {
             return $this->getTask = $this->db->select(self::MAINTABLE,'*',$conditional);
        }else{
             return $this->getTask = $this->db->select(self::MAINTABLE,'*');  
        }
     
    }
    
    public function insetTask($data) {
        $data['idfrom'] = session::get('_id');
         return $this->insetTask = $this->db->insert(self::MAINTABLE, $data);
        
    } 
    
    public function followTask($data) {
        return $this->insetTask = $this->db->insert(self::PROGTABLE, $data);
        
    } 
    
    public function getFollowTask($data) {
        return $this->insetTask = $this->db->select(self::PROGTABLE);
        
    }
    
    
    public function countsTask() {
        return $this->countsTask = $this->db->count(self::MAINTABLE);
    }
    
    public function setTask() {
        
    }


}