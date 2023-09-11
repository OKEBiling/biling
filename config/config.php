<?php



@date_default_timezone_set('Asia/Jakarta');
@set_time_limit(1200);
@ini_set("max_execution_time",1200);
@ini_set('memory_limit','500M');//
@ini_set('session.cache_expire',1800);

//Load Define Folder
define('BASIC_PATH',str_replace('\\','/',dirname(dirname(__FILE__))).'/');
define('LIB_DIR',       BASIC_PATH .'app/'); 
define('CONFIG_DIR',    BASIC_PATH .'config/'); 
define('PLUGIN_DIR',    BASIC_PATH .'plugins/');
define('ASSETS_DIR',    BASIC_PATH .'assets/');
define('CONTROLLER_DIR',LIB_DIR .'controllers/');
define('MODEL_DIR',     LIB_DIR .'model/');
define('LAYOUT',      BASIC_PATH .'views/');
define('FUNCTION_DIR',	LIB_DIR .'function/');
define('DEFAULT_PERRMISSIONS',0755);
