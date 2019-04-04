<?php 
include "auth.php";
?>
<head>
<link href="assets/css/masterhead.css" rel="stylesheet" type="text/css">
</head>
<?php include("sqlconnect.php"); ?>
<?php
//$add=$_POST['id'];
$n=$_POST['bid'];
$no=$_POST['unit'];

$query2="update scheme set amount=$no where name='$n'";
$res=mysql_query($query2)
or
die(mysql_error());

echo "<div class=stext>";
echo " &nbsp; &nbsp;&nbsp; Update successfull <br/> <br/>" ;

$query="Select * from scheme";
	$res=mysql_query($query) or die(mysql_errno());
		//echo "<select id=id name=id>";
		echo "<label><b>Scheme</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><b>Rate</b></label><br><br>";
		while($row=mysql_fetch_array($res))
		{
			echo "<label>".$row['name']."</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>".$row['amount']."</label><br><br>";
		}
	//echo "</select></td>";

echo "</b>";
echo " <br/> <br/> <a href=\"donate.php\" style=\"text-decoration:none \" > Back to Stock Update </a> ";
echo "</div>";
echo "</div>";
?>