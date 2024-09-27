<?php
session_start();
include "connection.php";

// Ensure you pass the database connection to mysqli_query
mysqli_query($db, "DELETE FROM cart");

// Unset session variables and destroy the session
unset($_SESSION['a_nm']);
session_destroy();

// Redirect to login page
header("Location:admin_login.php");
exit(); // Always call exit after header redirection
?>
