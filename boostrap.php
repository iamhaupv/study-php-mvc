<?php
define("__DIR_ROOT_", __DIR__);
define('BASE_URL', '/study-php-mvc');
// handle webroot
if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === "on"){
    $webroot = "https://" . $_SERVER['HTTP_HOST'];
}else {
    $webroot = "http://" . $_SERVER['HTTP_HOST'];
}
// xử lý dấu \ => / để đồng bộ
$path = str_replace("\\", "/", __DIR__);
$folder = str_replace($_SERVER['DOCUMENT_ROOT'], "", $path);
define('__WEB_ROOT', $webroot . $folder);
// config auto require_once configs dir
$configs_dir = scandir('configs');
if(!empty($configs_dir)){
    foreach($configs_dir as $item){
        if($item != "." && $item != ".."){
            if(file_exists('configs/'.$item)){
                require_once "configs/".$item;
            }
        }
    }
}
// config auto require_once cores dir
$cores_dir = scandir('cores');
if(!empty($cores_dir)){
    foreach ($cores_dir as $item){
        if($item != "." && $item != ".."){
            if(file_exists('cores/'.$item)){
                require_once "cores/".$item;
            }
        }
    }
}

require_once "app/App.php";

// database
$db_config = array_filter($config['database']);
if(!empty($db_config)){
    require_once "cores/Connection.php";
    require_once "cores/Database.php";
    $db = new Database();
}

$app = new App();