<?php


class TaskCustomerModel extends Database {

    const MAINTABLE = 'Ok_task_customer';
    const PROGTABLE = 'Ok_follow_task_progress';
    const HISTTABLE = 'Ok_task_progress_his';
    const FILETABLE = 'Ok_task_files';
    const USERTABLE = 'Ok_users';

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
            'Ok_task_customer.SN',
            'Ok_task_customer.modem',
            'Ok_task_customer.email',
            'Ok_task_customer.username',
            'Ok_task_customer.password',
            'Ok_task_customer.firstname',
            'Ok_task_customer.lastname',
            'Ok_task_customer.idfrom',
            'Ok_task_customer.created_at',
            'Ok_task_customer.alamat',
            'Ok_task_customer.status',
            'Ok_task_customer.phoneNumber',
            'Ok_task_customer.kelurahan',
            'Ok_task_customer.kecamatan',
            'Ok_task_customer.kabupaten',
            'Ok_task_customer.provinsi',
            'Ok_task_customer.lat',
            'Ok_task_customer.lng',
            'Ok_task_customer.type',
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
            "[>]". self::USERTABLE => ["iduser" => "id"],
        ], [
            self::HISTTABLE.'.idcustomer',
            self::HISTTABLE.'.type',
            self::HISTTABLE.'.iduser',
            self::HISTTABLE.'.comment',
            self::HISTTABLE.'.subject',
            self::HISTTABLE.'.task',
            self::HISTTABLE.'.message',
            self::HISTTABLE.'.schedule',
            self::HISTTABLE.'.status',
            self::HISTTABLE.'.cr',
            self::HISTTABLE.'.idfiles',
            self::HISTTABLE.'.created_at',
            self::USERTABLE.'.name',
            self::USERTABLE.'.position'
        ], $data);

    }
        
    public function getHisPhotos($id) {
      return $result = $this->db->select(self::FILETABLE, [
            "idfiles",
            "file_path"
        ], [
            "idtask" => $id, // Sesuaikan dengan idtask yang diinginkan
        ]);
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

    public function getTableColumns($tableName) {
         return $this->insetFollowTask = $this->db->query("DESCRIBE $tableName")->fetchAll(PDO::FETCH_COLUMN);
    }
    
    
    public function getLatestMessage($idTertentu){
   return $this->db->select(self::HISTTABLE, [
            'message', 'created_at'
        ], [
            'task'=>'status',
            'idcustomer' => $idTertentu,
            'ORDER' => ['created_at' => 'DESC'], 
            'LIMIT' => 1 
        ]);
    }
}