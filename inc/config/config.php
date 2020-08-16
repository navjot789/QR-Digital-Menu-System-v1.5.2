<?php
ob_start();
session_start();
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
setlocale(LC_TIME, "it_IT.utf8");
date_default_timezone_set('Europe/Rome');
$current_date = date('d-m-Y');
$current_time = date('H:i:s');

$currency= "&euro;";

include "db.inc.config.php";

$conn = mysqli_connect(DATABASE_HOST,DATABASE_USERNAME,DATABASE_PASSWORD,DATABASE_NAME);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}




?>