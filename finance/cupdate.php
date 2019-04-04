<?php 
include "auth.php";
?>
<html>
<head>
<link href="assets/css/masterhead.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor=#746f6f>
<?php include("sqlconnect.php"); ?>

<a href="presearch.php" > Back to  search </a>

<br/>
<br/>
<?php
if(isset($_POST['submit'])) 
{  
echo "<div class=link align=center>";
echo " Updation successful for the CID  <b>" ;
echo $_POST['id'];
echo "</b>";
echo "</div>";
echo "<br/>";
echo "<br/>";

$query="update customer set name='".$_POST['name']."',
		gender='".$_POST['gender']."',
		dob='".$_POST['dob']."',
		fhname='".$_POST['sdw']."',
		hno='".$_POST['hno']."',
		location='".$_POST['loc']."',
		post='".$_POST['post']."',
		district='".$_POST['dis']."',
		state='".$_POST['state']."',
		pincode='".$_POST['pin']."',
		country='".$_POST['country']."',
		phone='".$_POST['phone']."',
		alternate='".$_POST['alt']."',
		proof='".$_POST['idproof']."',
		idnum='".$_POST['idnumber']."',
		mobile='".$_POST['mob']."'  where customerid='".$_POST['id']."' "; 
$results=mysql_query($query)
or die(mysql_error());
}
else if (isset($_POST['delete'])) 
{  
echo "<div class=link align=center>";
echo " Deletion successful for the CID  <b>" ;
echo $_POST['id'];
echo "</b>";
echo "</div>";
echo "<br/>";
echo "<br/>";

$query="delete from customer where customerid=".$_POST['id']." "; 
$results=mysql_query($query)
or die(mysql_error());
}

?>
</body>
</html>