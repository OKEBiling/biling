<?php
class FileUploader {
    private $uploadDirectory;
    private $thumbnailDirectory;

    public function __construct($uploadDirectory) {
        $this->uploadDirectory = $uploadDirectory;
        $this->thumbnailDirectory = $uploadDirectory; // Direktori thumbnail akan sama dengan direktori asli.
        $this->createDirectoriesIfNotExists($uploadDirectory);
    }

    public function uploadFile($fileInputName, $multiUpload = true) {
        if (isset($_FILES[$fileInputName])) {
            $files = $_FILES[$fileInputName];
            $fileCount = count($files['name']);
            $uploadResults = array();
            if (!$multiUpload && $fileCount > 1) {
                return "Hanya satu file yang diizinkan.";
            }
            for ($i = 0; $i < $fileCount; $i++) {
                $fileName = $files['name'][$i];
                $fileTempName = $files['tmp_name'][$i];
                $fileSize = $files['size'][$i];
                $fileError = $files['error'][$i];

                $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');

                if (in_array($fileExtension, $allowedExtensions)) {
                    if ($fileError === 0) {
                        $newFileName = uniqid() . '.' . $fileExtension;
                        $destination = $this->uploadDirectory . '/original/' . $newFileName;

                        if (move_uploaded_file($fileTempName, $destination)) {
                            $uploadResults[] = $destination;
                            $this->createThumbnail($destination); // Buat thumbnail
                        } else {
                            $uploadResults[] = "Terjadi kesalahan saat mengunggah file.";
                        }
                    } else {
                        $uploadResults[] = "Terjadi kesalahan saat mengunggah file.";
                    }
                } else {
                    $uploadResults[] = "Tipe file yang tidak valid.";
                }
            }

            return $uploadResults;
        } else {
            return "File tidak diberikan.";
        }
    }

    private function createDirectoriesIfNotExists($directory) {
        if (!file_exists($directory)) {
            mkdir($directory . '/original', 0777, true);
        }
    }

    private function createThumbnail($originalFilePath) {
        list($width, $height) = getimagesize($originalFilePath);

        $thumbnailWidth = 100;
        $thumbnailHeight = 100;
        $thumbnail = imagecreatetruecolor($thumbnailWidth, $thumbnailHeight);

        $source = imagecreatefromjpeg($originalFilePath); // Ubah sesuai dengan jenis gambar yang diunggah (jpeg/png/gif).

        imagecopyresized($thumbnail, $source, 0, 0, 0, 0, $thumbnailWidth, $thumbnailHeight, $width, $height);

        $thumbnailPath = $this->thumbnailDirectory . '/thumbnail/' . basename($originalFilePath);
        imagejpeg($thumbnail, $thumbnailPath); // Simpan thumbnail.

        imagedestroy($thumbnail);
        imagedestroy($source);
    }
}
