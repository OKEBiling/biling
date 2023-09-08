<?php
//oke
require_once 'config/config.php';
require_once FUNCTION_DIR.'Helper.php';
require_once CONTROLLER_DIR.'URLController.php';
require_once CONTROLLER_DIR.'Session.php';
require_once CONTROLLER_DIR.'App.php';


$app = new App();

$app->Start();