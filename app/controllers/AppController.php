<?php
class App {
    public $urlSegments;
    public $baseUrl;
    public $requestMethod;
    protected $layout = 'index'; // Default layout
    public  $content ;
    protected $viewContent;



    public function __construct() {
        $this->requestMethod = URLController::getMetodeSegment();
        $this->urlSegments   = URLController::getUrlSegments();
        $this->baseUrl       = URLController::getBaseUrl();
    }
    public function Start() {
        if ($this->matchRoute($this->urlSegments)) {
            return; // Keluar dari metode start() setelah menemukan rute yang cocok
        }
    }
    public function matchRoute($urlSegments) {
        if (!empty($urlSegments)) {
            $page = $urlSegments[1];
            //daftarkan controller secara manual untuk menghindari konfilik
            $Controllers = [
                'home' => 'homeController',
                'dashboard' => 'dashboardController',
                'login' => 'loginController',
                'oke' => 'loginController',
            ];
            // jika controller berada di segment 1 maka lanjutkan ke level lebih tinggi yatu panggil filenya dan classnya
            // Di dalam matchRoute()
            if (isset($Controllers[$page])) {
                // Panggil loadController untuk mengambil instance controller yang sesuai
                $controller = $this->loadController($Controllers[$page]);
                if ($controller !== null) {
                    // Instance controller berhasil diperoleh, lanjutkan dengan pemanggilan aksi atau metode
                    // $controller->action();
                    return $controller;
                }
            } else {
                // Tangani kesalahan jika controller tidak ditemukan dalam daftar
                $this->processUnauthorized();
            }
        } else {
               die(header('Location: '.URLController::getBaseUrl().'/login'));
        }
    }
    private function processUnauthorized() {
        include('error.php');
    }
    
    private function loadController($controllerName) {
        // Tentukan direktori di mana controller-controller Anda disimpan
        $controllerDirectory = CONTROLLER_DIR;
        // Pastikan controller name aman untuk digunakan dan tidak mengandung karakter yang tidak diizinkan
        $controllerName = preg_replace('/[^a-zA-Z0-9]/', '', $controllerName);
        // Buat nama file controller yang sesuai
        $controllerFile = $controllerDirectory . $controllerName . '.php';
        // Periksa apakah file controller ada
        if (file_exists($controllerFile)) {
            // Muat file controller
            require_once $controllerFile;
            // Buat nama class controller yang sesuai
           
            $controllerClassName = $controllerName;

            // Periksa apakah class controller ada
            if (class_exists($controllerClassName)) {
                return new $controllerClassName();
            } else {
                // Tangani kesalahan jika class controller tidak ditemukan
                $this->processUnauthorized();
            }
        } else {
            // Tangani kesalahan jika file controller tidak ditemukan
            $this->processUnauthorized();
        }
    }
    


    public function layout($layoutName = null) {
        if ($layoutName !== null) {
        $this->layout = $layoutName;
        return $this;
        }else{
        $viewPath = LAYOUT . "index.php";
        $this->viewContent = $this->renderFile($viewPath);
        return $this;
        }
    }
    
    public function debug(){
        echo   $this->viewContent;
        
    }
    
    
    public function view($viewName, $data = []) {
        $viewPath = LAYOUT . "$viewName.php";
        $viewContent = $this->renderFile($viewPath, $data);
        if ($this->layout) {
            $layoutPath = LAYOUT . $this->layout . '.php';
            $layoutData = [
                'content' => $viewContent,
            ];
            
            
            $mergedArray = array_merge($data, $layoutData);
            echo $this->renderFile($layoutPath, $mergedArray);
        } else {
            echo $viewContent;
        }
    }

    private function renderFile($filePath, $data = []) {
        if (!file_exists($filePath)) {
            throw new Exception("File not found: $filePath");
        }
        extract($data);
        ob_start();
        include $filePath;
        return ob_get_clean();
    }



}