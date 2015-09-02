<?php
<<<<<<< HEAD
require_once "controllers/authcontroller.php";
=======
require_once "controllers/IndexController.php";

>>>>>>> origin/master


//$requestURI = explode("/", parse_url(trim(strtolower($_SERVER["REQUEST_URI"]), "/"), PHP_URL_PATH));
session_start();
$requestURI = explode("/", strtolower($_SERVER["REQUEST_URI"]));

<<<<<<< HEAD
$controller = "authcontroller";
=======
$controller = "Test";
>>>>>>> origin/master
$action = "indexAction";

if(!empty($requestURI[2])) {
    $controller = $requestURI[2] . "controller";
}

if(!empty($requestURI[3])) {
    $action = $requestURI[3] . "Action";
}

if(method_exists($controller, $action)){
    $obj = new $controller;
    $obj->$action();
}
else{
    //echo "404" . $controller ." " . $action;
<<<<<<< HEAD
    require_once "views/404.php";
=======
    //require_once "views/404.php";
    var_dump("faaaaail");
>>>>>>> origin/master
}
