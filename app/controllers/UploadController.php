<?php
class FileUploader {
    private $uploadDirectory;

    public function __construct($uploadDirectory) {
        $this->uploadDirectory = $uploadDirectory;
        $this->createDirectoryIfNotExists($uploadDirectory);
    }

  public function uploadFile($fileInputName, $multiUpload = true) {
    if (isset($_FILES[$fileInputName])) {
        $files = $_FILES[$fileInputName];
        $fileCount = count($files['name']);
        $uploadResults = array(
            "error" => false,
            "original" => array(),
            "thumbnail" => array()
        );

        if (!$multiUpload && $fileCount > 1) {
            $uploadResults["error"] = "Hanya satu file yang diizinkan.";
            return $uploadResults;
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
                    $originalPath = $this->uploadDirectory . '/original/' . $newFileName;

                    if (move_uploaded_file($fileTempName, $originalPath)) {
                        $uploadResults["original"][$newFileName] = $originalPath;
                        $thumbnailPath = $this->createThumbnail($originalPath);
                        $uploadResults["thumbnail"][$newFileName] = $thumbnailPath;
                    } else {
                        $uploadResults["error"] = "Terjadi kesalahan saat mengunggah file.";
                    }
                } else {
                    $uploadResults["error"] = "Terjadi kesalahan saat mengunggah file.";
                }
            } else {
                $uploadResults["error"] = "Tipe file yang tidak valid.";
            }
        }

        return $uploadResults;
    } else {
        return "File tidak diberikan.";
    }
}


    private function createDirectoryIfNotExists($directory) {
        if (!file_exists($directory)) {
            mkdir($directory.'/original', 0777, true);
            mkdir($directory.'/thumbnail', 0777, true);
        }
    }
    private function createThumbnail($originalFilePath) {
        $thumbnailDirectory = $this->uploadDirectory . '/thumbnail';
        $thumbnailPath = $thumbnailDirectory . '/' . basename($originalFilePath);
        $im = new Imagick($originalFilePath);
    
        // Mengatur kompresi JPEG tanpa mengubah ukuran gambar
        $im->setImageCompression(Imagick::COMPRESSION_JPEG);
        $im->setImageCompressionQuality(40); // Sesuaikan dengan kualitas yang Anda inginkan (misalnya 70%)
    
        // Mengubah ukuran gambar berdasarkan persentase
        $im->scaleImage($im->getImageWidth() * 20 / 100, $im->getImageHeight() * 20 / 100);
    
        if ($im->writeImage($thumbnailPath)) {
            $im->destroy();
        }
        return $thumbnailPath;
    }

    
}
