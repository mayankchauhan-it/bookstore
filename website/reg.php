<?php
session_start();
include "connection.php";
//header("Location:registration.php?msg=$msg");
$username = $_POST['u_nm'];
$password =  $_POST['password'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$email = $_POST['email'];
$phoneno = $_POST['pno'];
$q="select * from user where u_nm='".$username."'";

$r = mysqli_num_rows(mysqli_query($db,$q)); 
//$r = mysql_num_rows(mysql_query("select * from registration where unm='".$username."' and pwd='".$password."'"));
//echo $r;
if($r<1)
{
//mysql_query("insert into registration(unm,pwd,city,cno,email,wsite,enm) values('$unm','$pwd','$city','$cno','$email','$wsite','$enm')");

//$sql = "INSERT INTO registration (u_nm,password,c_pass,bith_dt,address,city,state,phoneno,emailid) values('".$username."','".$password."','".$c_password."','".$birth_date."','",.$address."','".$city."','".$state."','".$phoneno."','".$email."')";
$sql = "INSERT INTO user (u_nm,password,address,city,state,email,pno) values('$username','$password','$address','$city','$state','$email','$phoneno')";

 //$sql = "INSERT INTO user values('".$_POST['unm']."')";
 //,'.$_POST['pwd'].','.$_POST['city'].','.$_POST['add'].','.$_POST['cno'].')';
// echo $sql;
$rs = mysqli_query($db,$sql);
if ($rs)
{
	$msg = "Successfully Registerd!!..";
	header("Location:login.php?msg=$msg");
}

}
else
{
	$msg = "Username already exists!!..";
	header("Location:registration.php?msg=$msg");
}
?>
