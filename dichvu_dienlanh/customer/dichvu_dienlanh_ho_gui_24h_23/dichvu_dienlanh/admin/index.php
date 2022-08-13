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


// đang làm
$strController = ucfirst($c) . "Controller";
require "./Controller/$strController.php";

$controller = new $strController();
$controller->$a();