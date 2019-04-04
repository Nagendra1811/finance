<?php 
include "auth.php";
?>
<head>
<link href="assets/css/masterhead.css" rel="stylesheet" type="text/css">
</head>
<?php include("sqlconnect.php"); ?>
<?php

$n=$_POST['name'];
$g=$_POST['gender'];
$no=$_POST['phone'];
$db=$_POST['dob'];
$idnum=$_POST['idnum'];
$dreg = date("Y-m-d");

$qq="select name,phone from customer where phone=$no";
$rr=mysql_query($qq);
$ro=mysql_fetch_array($rr);
if($ro['phone']==$no)
{
echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;Customer already registered with Name <b>".$ro['name']." </b>please try other phone Number";
}
else
{
$image = addslashes(file_get_contents($_FILES['filepr']['tmp_name']));
$image1 = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
 
$query="insert into customer values(null, 
		'".$_POST['name']."',
		'".$_POST['gender']."',
		'".$_POST['dob']."',
		'".$_POST['sdw']."',
		'".$_POST['house']."',
		'".$_POST['address']."',
		'".$_POST['post']."',
		'".$_POST['district']."',
		'".$_POST['state']."',
		'".$_POST['pin']."',
		'".$_POST['country']."',
		'".$_POST['phone']."',
		'".$_POST['Al']."',
		'".$_POST['mob']."',
		'".$_POST['proof']."',
		'".$image."',
		'".$image1."',
		'".$dreg."',
		'".$idnum."')";
$r=mysql_query($query);
if(!$r)
die(mysql_error());
else
{
echo "<div class=stext>"; 
echo " &nbsp; &nbsp;&nbsp; $n has been successfully registered on $dreg  " ;
$query2="Select * from customer where phone=$no";
$res=mysql_query($query2)
or
die(mysql_error());
echo "<br/> <br/> <div align=center> "; 
echo " <b> ID of the customer is ";

$rows=mysql_fetch_array($res);
	echo "$rows[0]";

echo "</b>";
echo " <br/> <br/> <a href=\"addcust.php\" style=\"text-decoration:none \" > Back to Add Customer </a> ";
echo "</div>";
echo "</div>";
}
}
?>