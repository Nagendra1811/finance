<?php 
session_start();
//print_r($_SESSION);
if(($_SESSION['user']!='staff')||($_SESSION['loggedin']!=1))
{
	header("location:home.php");
}
?>
<html>
<head>
<link href="assets/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width=100% " height=100% cellpadding=0 cellspacing=0 border=2>
	<tr>
		<td rowspan=2 height=92% bgcolor=#00000 width=13%
			style="min-width: 200px;" valign=top class="border">
		<div class="menudiv">
		<h3>Welcome <?php echo $_SESSION['name']?></h3>
Today is: <?php
print (date("d-m-Y")) ;
?>

<br>
		<span class="menu">
		<br/>
		<P> <font size=4px>  STAFF'S MENU </font></P>
		<ul class="menulist">
			<li><a href="addcust.php" target="frame1"> Add Customer </a></li>
			<li><a href="addItem.php" target="frame1"> Add Item </a></li>
			<li><a href="presearch.php" target="frame1"> Search </a></li>
			<li><a href="donate.php" target="frame1"> Update rate </a></li>
			<li><a href="dona.php" target="frame1"> Settlement </a></li>
			<li><a href="report.php" target="frame1"> Report </a></li>
			<li><a href="record.php" target="frame1"> Gold Loan Status</a></li>
		</ul>
		</span>			
		</div>


		</td>

		<td width=87% height=10% bgcolor=#05083f>
		<div class="header"><img src="assets/images/logo.png" height="50"
			width="50" align="absmiddle" /> &nbsp; &nbsp; &nbsp; &nbsp; Lakshmi Narayana Finance(R)</div>
		</td>
	</tr>
	<tr>
		<td width=87% height=82% bgcolor=#746f6f align=center>
		<iframe
			bgcolor=#746f6f frameborder=1, scrolling=auto, name="frame1"
			 src="assets/images/logo.png" width=100% height=100% align=middle style=border:none;>
		This is Frame 1 </iframe></td>
	</tr>

	<tr>
		<td colspan=2 height=8% bgcolor=black>
		<div style="margin-left: 15px"><img src="assets/images/lock.png"
			border=0 align="absmiddle"><a href=loggedout.php class="link">
		&nbsp;Log Out </a> 
		
		</td>
	</tr>
</table>
</body>
</html>