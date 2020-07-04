<?php
ob_start();
session_start();

date_default_timezone_set('Europe/Rome');
$current_date = date('d-m-Y');
$current_time = date('H:i:s');

$currency= "&euro;";

$conn = new mysqli('localhost', 'testing', '857fr@lT', 'test');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>