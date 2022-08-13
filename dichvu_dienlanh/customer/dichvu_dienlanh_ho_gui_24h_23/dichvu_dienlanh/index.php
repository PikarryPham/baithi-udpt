<?php
session_start();
require './config.php';
require './connectDB.php';
require './model/Order.php';
require './model/OrderRepository.php';
require './model/Customer.php';
require './model/CustomerRepository.php';
require './model/Service.php';
require './model/ServiceRepostitory.php';
// require 'model/Register.php';
// require 'model/RegisterRepostitory.php';
//controller
$c = $_GET['c'] ?? 'order';
//action
$a = $_GET['a'] ?? 'home';
// run hàm index của controller orderController
$strController = ucfirst($c) . "Controller";
require "./site/controller/$strController.php";
$controller = new $strController;
// echo $strController;
$controller->$a();

// http://dichvu_dienlanh.com/?c=order&a=home