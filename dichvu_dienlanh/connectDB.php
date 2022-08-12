<?php
$conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASE);

if ($conn->connect_error) {
    die('fail to connect database' . $conn->connect_error);
}