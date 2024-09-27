<?php
include "../admin/connection.php";
session_start();
$adminname = $_POST['a_nm'];
$password =  $_POST['a_pass'];
$sql = "select * from  admin where a_nm='".$adminname."' and a_pass='".$password."'";
$rs = mysqli_query($db, $sql);
$cnt=mysqli_num_rows($rs);

if($cnt>=1)
{
	$_SESSION['a_nm'] = $adminname;	
	header("Location:admin_index.php");
}
else
{
	$msg = "Username or Password are not correct, try again.";
	header("Location:admin_login.php?msg=$msg");
}
?>