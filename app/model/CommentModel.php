<?php

/**
 * CommentModel represents a model for managing comments in the database.
 */
class CommentModel extends Database {
    
    const TASKTABLE = 'Ok_task_customer';
    const PROGTABLE = 'Ok_follow_task_progress';
    const HISTTABLE = 'Ok_task_progress_his';
    const FILETABLE = 'Ok_task_files';
    const USERTABLE = 'Ok_users';
    const COMMENTTABLE = 'Ok_task_comment';
    
    /**
     * Constructor for the CommentModel class.
     */
    public function __construct(){
        parent::__construct();
    }
    
    /**
     * Retrieves comments based on the given condition.
     *
     * @param array $conditional The condition to filter comments.
     * @return array|null Returns an array of comments or null if no comments are found.
     */
    public function getComment($conditional){
        return $this->db->select(self::COMMENTTABLE, [
            "[>]Ok_users" => ["iduser" => "id"]
        ], [
            'Ok_task_comment.idcomment',
            'Ok_task_comment.iduser',
            'Ok_task_comment.idtask',
            'Ok_task_comment.comment',
            'Ok_task_comment.created_at',
            'Ok_users.name',
            'Ok_users.position'
        ], $conditional);
    }
    
    /**
     * Sets a new comment in the database.
     *
     * @return int|bool Returns the ID of the inserted comment or false if unsuccessful.
     */
    public function setComment(){
        $data['iduser'] = session::get('_id'); // Assuming session handling for the user ID.
        return $this->db->insert(self::COMMENTTABLE, $data);
    }
}
