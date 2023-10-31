<?php

class FileModel extends Database
{
    
    const MAINTABLE = 'Ok_task_files';

    public function __construct() {
        parent::__construct();
    }



    public function GetFile($conditional) {
        return $this->GetFile = $this->db->select(self::MAINTABLE, [
                'idfiles',
                'file_name',
                'file_path',
            ], $conditional);
        
    }


public function GetFileWitemaps($conditional) {
    $sql = "SELECT idfiles, GROUP_CONCAT(file_name) as file_names, GROUP_CONCAT(file_path) as file_paths FROM Ok_task_files WHERE $conditional GROUP BY idfiles";
    
    $result = $this->db->query($sql)->fetchAll();

    foreach ($result as &$row) {
            unset($row[0]);
       
        $row['file_names'] = explode(',', $row['file_names']);
        $row['file_paths'] = explode(',', $row['file_paths']);
        
    }

    return $row;
}

public function setFile($data) {
        $data['iduser'] = session::get('_id');
        $this->setFile = $this->db->insert(self::MAINTABLE, $data);
        return  $this->setFile;
    }
}