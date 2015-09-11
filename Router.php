<?php

include "Database.php";
require_once "controllers/AjaxController.php";
require_once "controllers/AdminController.php";
require_once "controllers/ViewController.php";



//$requestURI = explode("/", parse_url(trim(strtolower($_SERVER["REQUEST_URI"]), "/"), PHP_URL_PATH));
session_start();
$requestURI = explode("/", strtolower($_SERVER["REQUEST_URI"]));

//die(var_dump($requestURI));


$controller = "ViewController";
$action = "indexAction";


if(!empty($requestURI[2])) {
    $controller = $requestURI[2] . "Controller";
}

if(!empty($requestURI[3])) {
    $action = $requestURI[3] . "Action";

}
if(!empty($requestURI[4])) {
    $param = $requestURI[4];

}

if(method_exists($controller, $action)){
    $obj = new $controller;
    //$obj->$action();
    call_user_func_array(array($obj, $action), array(isset($param)));
}
else{
    //echo "404" . $controller ." " . $action;
    require_once "views/404.php";
}
