<?php
//session_start();
ob_start();
$host = "localhost:3306";
$user = "root";
$password = "";
$dbname= "horizon";
$db = mysqli_connect($host, $user, $password,$dbname);
//$rs = mysqli_select_db($dbname,$db);
?>