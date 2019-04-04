<?php
session_start();
include "sqlconnect.php";
if($_POST)
{
	$name=$_POST['name'];
	$pass=$_POST['pass'];
	
	$query="SELECT username from login where username='".$name."' and password='".$pass."'";
	$res=mysql_query($query) or die(mysql_error());
	if(mysql_num_rows($res)!=1)
	{
		$msg="Invalid User name and password.";
		header("location:home.php?msg=$msg");
	}
	else
	{
		$row=mysql_fetch_array($res);
		
		//echo "Clerk";
		$_SESSION['user']='staff';
		$_SESSION['loggedin']=1;
		$_SESSION['id']=$row['username'];
		$_SESSION['name']=$_POST['name'];
		header("location: staff.php");
	}
}
?>
		