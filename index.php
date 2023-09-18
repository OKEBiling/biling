<?php
//oke
require_once 'config/config.php';
require_once FUNCTION_DIR.'Helper.php';
require_once CONTROLLER_DIR.'URLController.php';
require_once CONTROLLER_DIR.'SessionController.php';
require_once CONTROLLER_DIR.'AppController.php';
require_once CONTROLLER_DIR.'mainController.php';


$app = new App();

$app->Start();