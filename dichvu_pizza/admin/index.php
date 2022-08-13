<?php
require "../config.php";
require "../connectDB.php";
require '../model/Order.php';
require '../model/OrderRepository.php';
require '../model/Customer.php';
require '../model/CustomerRepository.php';
require '../model/Service.php';
require '../model/ServiceRepostitory.php';


$c = isset($_GET["c"]) ? $_GET["c"] : "dashboard";
$a = isset($_GET["a"]) ? $_GET["a"] : "list";

// include "load.php";
session_id() || session_start();
if (!($c == "login" && $a == "login")) {
    if (empty($_SESSION["login"])) {
        header('location: /admin/');
    }
    //Đã login
}



include_once "controller/" . ucfirst($c) . "Controller.php";

$classController = ucfirst($c) . "Controller";
$controller = new $classController();
$controller->$a();


// $strController = ucfirst($c) . "Controller";
// require "./Controller/$strController.php";

// $controller = new $strController();
// $controller->$a();