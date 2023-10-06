<?php
include_once MODEL_DIR . 'UserModel.php';

/**
 * Kelas mainController mengelola informasi pengguna dalam konten utama seperti header dan sidebar.
 * Fungsi ini hanya berlaku jika pengguna sudah masuk.
 */
class mainController extends App {
    private $userModel;

    /**
     * Konstruktor kelas mainController.
     */
    public function __construct() {
        if (session::get('logged_in')) {
            $this->userModel = new UserModel();
        }
    }

    /**
     * Metode ini digunakan untuk memeriksa pengguna.
     */
    public function getUsers($id = null) {
        if ($id === null) {
            $id = session::get('_id');
        }
        return $this->userModel->getUser($id)->get();
    }

    /**
     * Metode ini digunakan untuk mengambil semua data yang diperlukan.
     */
     
     public function roleUser(){
        
     }
     
     
     
     public function permissionUsers($id){
         
     }
     
     
     public function Permission($id=null){
         
        if ($id === null) {
            $id = session::get('_id');
        }
        return  $this->userModel->privilegeUsers($id); 
         
     }
    public function fetchData() {
        // Kode untuk mengambil data di sini
    }
    public function privilegeUsers(){
        return $this->userModel->privilegeUsers(session::get('_id'));
     ;
    }
}
