<?php
include_once MODEL_DIR . 'UserModel.php';
/**
 * Kelas mainController mengelola informasi pengguna dalam konten utama seperti header dan sidebar. 
 * Fungsi ini hanya berlaku jika pengguna sudah masuk.
 */
 
class mainController extends App {

    /**
     * Konstruktor kelas mainController.
     */
    public function __construct() {
      if (session::get('logged_in')) {
         $this->iduser = session::get('_id');
         $this->userModel = new UserModel();
      }
    }
    /**
     * Metode ini digunakan untuk memeriksa pengguna.
     */
     
    public function getUsers() {
    return $this->userModel->getUser($this->iduser)->get();
        
    }

    /**
     * Metode ini digunakan untuk mengambil semua data yang diperlukan.
     */
    public function fetchData() {
        // Kode untuk mengambil data di sini
    }
}
