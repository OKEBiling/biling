<!doctype html>
<html lang="en" class="light-style  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="/assets/" >
<head>
           <meta charset="utf-8" />
        <title><?php
        if (isset($this->title)) {echo $this->title;} elseif (isset($title)) {echo $title;} else {echo 'OKEBiling';}?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta content="OKEBILING membuat pembayaran semudah itu. Temukan kenyamanan dan kemudahan dalam melakukan pembayaran tagihan dengan menggunakan OKEBILING. Nikmati kemudahan ini dan pelajari lebih lanjut di sini." name="description" />
        <meta content="OKEBILING adalah platform pembayaran yang mudah digunakan dan praktis. Dengan OKEBILING, Anda bisa melakukan pembayaran dengan cepat dan aman. Temukan lebih banyak informasi tentang layanan pembayaran ini di sini." name="author" />
        <!-- App favicon -->
      
        <link rel="apple-touch-icon" sizes="57x57" href="/assets/img/ico/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/assets/img/ico/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/assets/img/ico/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/ico/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/assets/img/ico/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/assets/img/ico/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/assets/img/ico/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/assets/img/ico/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/ico/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/assets/img/ico/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/assets/img/ico/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/assets/img/ico/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/ico/favicon-16x16.png">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <meta name="csrf-token" content="<?= session::get('csrf_token'); ?>">
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
        <!-- Icons -->
        <link rel="stylesheet" href="/assets/vendor/fonts/boxicons.css" />
        <link rel="stylesheet" href="/assets/vendor/fonts/fontawesome.css" />
        <link rel="stylesheet" href="/assets/vendor/fonts/flag-icons.css" />
        <!-- Core CSS -->
        <link rel="stylesheet" href="/assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
        <link rel="stylesheet" href="/assets/vendor/css/rtl/theme-bordered.css" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="/assets/css/demo.css" />
        <!-- Vendors CSS -->
        <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
        <link rel="stylesheet" href="/assets/vendor/libs/typeahead-js/typeahead.css" />
        <!-- Vendor -->
        <link rel="stylesheet" href="/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
        <!-- Page CSS -->
        <!-- Page -->
        <link rel="stylesheet" href="/assets/vendor/css/pages/page-auth.css">
        <!-- Helpers -->
        <script src="/assets/vendor/js/helpers.js"></script>
        <script src="/assets/vendor/js/template-customizer.js"></script>
        <script src="/assets/js/config.js"></script>
        <!-- Custom-->
        <?php 

include_once('header.php');
if (!empty($cssLinks)) {
    foreach ($cssLinks as $cssLink) {
        echo "<link rel=\"stylesheet\" href=\"$cssLink\">";
    }
}


?> 

</head>