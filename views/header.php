<!doctype html>
<html lang="en">
<head>
        
        <meta charset="utf-8" />
        <title><?= isset($this->title) ? $this->title : 'OKEBiling.' ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="OKEBILING membuat pembayaran semudah itu. Temukan kenyamanan dan kemudahan dalam melakukan pembayaran tagihan dengan menggunakan OKEBILING. Nikmati kemudahan ini dan pelajari lebih lanjut di sini." name="description" />
        <meta content="OKEBILING adalah platform pembayaran yang mudah digunakan dan praktis. Dengan OKEBILING, Anda bisa melakukan pembayaran dengan cepat dan aman. Temukan lebih banyak informasi tentang layanan pembayaran ini di sini." name="author" />
        <!-- App favicon -->
        <base href="<?=$this->baseUrl;?>"><!--[if lte IE 6]></base><![endif]-->
        <link rel="apple-touch-icon" sizes="57x57" href="<?=$this->baseUrl;?>/assets/images/ico/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?=$this->baseUrl;?>/assets/images/ico/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?=$this->baseUrl;?>/assets/images/ico/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?=$this->baseUrl;?>/assets/images/ico/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?=$this->baseUrl;?>/assets/images/ico/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?=$this->baseUrl;?>/assets/images/ico/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?=$this->baseUrl;?>/assets/images/ico/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?=$this->baseUrl;?>/assets/images/ico/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?=$this->baseUrl;?>/assets/images/ico/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?=$this->baseUrl;?>/assets/images/ico/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?=$this->baseUrl;?>/assets/images/ico/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?=$this->baseUrl;?>/assets/images/ico/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?=$this->baseUrl;?>/assets/images/ico/favicon-16x16.png">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <!-- plugin css -->
        <link href="<?=$this->baseUrl;?>/assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

        <!-- Layout Js -->
        <script src="<?=$this->baseUrl;?>/assets/js/layout.js"></script>
        <!-- Bootstrap Css -->
        <link href="<?=$this->baseUrl;?>/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?=$this->baseUrl;?>/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?=$this->baseUrl;?>/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        
       <!-- Custoom Asset-->
        <?php
            if (!empty($cssLinks)) {
                foreach ($cssLinks as $cssLink) {
                    echo "<link rel=\"stylesheet\" href=\"$cssLink\">";
                }
            }
        ?>



    </head>

