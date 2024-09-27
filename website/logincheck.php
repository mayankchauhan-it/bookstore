<?php
session_start();
//include "header.php";
include "connection.php";
$username = $_POST['u_nm'];
$password =  $_POST['password'];
$sql = "select * from  user where u_nm='".$username."' and password='".$password."'";
$rs = mysqli_query($db, $sql);
$cnt=mysqli_num_rows($rs);

if($cnt>=1)
{
	$_SESSION['u_nm'] = $username;	
	header("Location:index.php");
}
else
{
	$msg = "Username or Password are not correct, try again.";
	header("Location:login.php?msg=$msg");
}
?>