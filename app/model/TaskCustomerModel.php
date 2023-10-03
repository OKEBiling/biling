<?php


class TaskCustomerModel extends Database {

    const MAINTABLE= 'Ok_task_customer';
    const PROGTABLE= 'Ok_task_progress';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getTask() {
        return $this->getTask = $this->db->select(self::MAINTABLE, '*');
    }
    
    public function insetTask($data) {
        $data['idfrom'] = session::get('_id');
         return $this->insetTask = $this->db->insert(self::MAINTABLE, $data);
        
    } 
    
    public function insetTaskProg($data) {
        return $this->insetTask = $this->db->insert(self::PROGTABLE, $data);
        
    }
    public function countsTask() {
        return $this->countsTask = $this->db->count(self::MAINTABLE);
    }
    
    public function setTask() {
        
    }


}