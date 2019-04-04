<?php
session_start();
$_SESSION['loggedin']=0;
$_SESSION['user']=0;
$_SESSION['id']=0;
$_SESSION['name']=0;
session_destroy();
//echo "You are logged out";
header("location: home.php");
?>