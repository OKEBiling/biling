<?php


class TaskCustomerModel extends Database {

    const MAINTABLE = 'Ok_task_customer';
    const PROGTABLE = 'Ok_follow_task_progress';
    const HISTTABLE = 'Ok_task_progress_his';

    public function __construct() {
        parent::__construct();


    }

    public function getTask($conditional = null) {
        if (!empty($conditional)) {
            return $this->getTask = $this->db->select(self::MAINTABLE, [
                "[>]Ok_subscriptions" => ["subscriptions" => "id"]
            ], [
                'Ok_task_customer.id',
                'Ok_task_customer.firstname',
                'Ok_task_customer.lastname',
                'Ok_task_customer.idfrom',
                'Ok_task_customer.created_at',
                'Ok_task_customer.alamat',
                'Ok_task_customer.status',
                'Ok_subscriptions.package'
            ], $conditional);
        } else {
            return $this->getTask = $this->db->select(self::MAINTABLE, '*');
        }
    }

    public function getTaskDetail($conditional) {
        return $this->getTask = $this->db->get(self::MAINTABLE, [
            "[>]Ok_subscriptions" => ["subscriptions" => "id"]
        ], [
            'Ok_task_customer.id',
            'Ok_task_customer.firstname',
            'Ok_task_customer.lastname',
            'Ok_task_customer.idfrom',
            'Ok_task_customer.created_at',
            'Ok_task_customer.alamat',
            'Ok_task_customer.status',
            'Ok_subscriptions.package',
            'Ok_subscriptions.amount',
            'Ok_subscriptions.service'
        ], $conditional);
    }

    public function insetTask($data) {
        $data['idfrom'] = session::get('_id');
        $this->insetTask = $this->db->insert(self::MAINTABLE, $data);
        return $this->insetTask;
    }

    public function followTask($data) {
        return $this->insetFollowTask = $this->db->insert(self::PROGTABLE, $data);

    }

    public function insertHisTask($data) {
        $data['iduser'] = session::get('_id');
        return $this->insertHisTask = $this->db->insert(self::HISTTABLE, $data);
    }
    
    
    public function updateTask($data,$conditional){
         return $this->updateTask = $this->db->update(self::MAINTABLE, $data, $conditional);
    }
    
    
    public function getHisTask($data) {
        return $this->getTask = $this->db->select(self::HISTTABLE, [
            "[>]Ok_users" => ["iduser" => "id"],
        ], [
            self::HISTTABLE.'.idcustomer',
            self::HISTTABLE.'.type',
            self::HISTTABLE.'.iduser',
            self::HISTTABLE.'.comment',
            self::HISTTABLE.'.subject',
            self::HISTTABLE.'.task',
            self::HISTTABLE.'.status',
            self::HISTTABLE.'.created_at',
            'Ok_users.name',
            'Ok_users.position'
        ], $data);

    }

    public function getFollowTask($id) {
        return $this->insetFollowTask = $this->db->has(self::PROGTABLE, [
            "AND" => [
                "iduser" => session::get('_id'),
                "idcustomer" => $id
            ]]);

    }


    public function countsTask() {
        return $this->countsTask = $this->db->count(self::MAINTABLE);
    }

    public function setTask() {}


}