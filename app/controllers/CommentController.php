<?php

// Import atau gunakan CommentModel jika belum di-autoload atau di-include.

/**
 * CommentController berfungsi sebagai pengontrol aksi terkait komentar.
 */
class CommentController {
    protected $commentModel;

    /**
     * Constructor untuk CommentController.
     */
    public function __construct() {
        $this->commentModel = new CommentModel();
    }

    /**
     * Menampilkan komentar berdasarkan kriteria tertentu.
     *
     * @param array $conditional Kriteria untuk pengambilan komentar.
     */
    public function showComments($conditional) {
        $this->comments = $this->commentModel->getComment($conditional);
        
          include LAYOUT . "Comment.php";
    }

    /**
     * Menambahkan komentar baru ke dalam database.
     *
     * @param string $newComment Isi komentar baru.
     */
    public function addComment($newComment,$idtask) {
        // Asumsi sederhana: Session atau user ID diambil secara langsung.
        $userId = session::get('_id'); // Sesuaikan dengan sistem autentikasi yang digunakan.

        // Menyiapkan data untuk komentar baru.
        $data = [
            'iduser' => $userId,
            'idtask' => $idtask,
            'comment' => $newComment,
            // Jika diperlukan, tambahkan data lain seperti 'idtask', 'created_at', dll.
        ];

        // Menyimpan komentar baru ke dalam database.
        $insertedCommentID = $this->commentModel->setComment($data);

        if ($insertedCommentID) {
            // Berhasil menyimpan komentar. Lakukan aksi yang sesuai, seperti memberikan notifikasi, dll.
        } else {
            // Gagal menyimpan komentar. Tangani kasus gagal penyimpanan.
        }
    }
}

// Contoh penggunaan:
// $commentController = new CommentController();
// $commentController->showComments($someCondition); // Tampilkan komentar berdasarkan kondisi tertentu.
// $commentController->addComment("Ini adalah komentar baru!"); // Menambahkan komentar baru.
