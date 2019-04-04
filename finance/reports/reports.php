<?php 
include "auth.php";
?>
<html>
<head>
<link href="assets/css/masterlinks.css" rel="stylesheet" type="text/css">
<style>
body
{
	margin:0px;
}
a
{
	text-decoration:none;
	font-family:monospace;
	font-size:14px;
	color:teal;
}
a:hover
{
	text-decoration:underline;
	font-family:monospace;
	font-size:14px;
	color:teal;
}

h3
{
	text-decoration: overline;
	font-family:Arial;
	font-size:18px;
	letter-spacing:5px;
	color:teal;
}
</style>
</head>
<body style="background-color: F0F8FF">
<table border=0 width=100% height=100%> 
<tr>
<td width=16% style="vertical-align:top;">
<br/>
<h3>&nbsp; Reports &nbsp;</h3>
		<div style="margin-left: -15px;">
		<ul style="list-style-type: square; line-height:30px; ">
			<li><a href="customerrep.php" target=rframe class=simple>
			Customers Report </a></li>
			<li><a href="donorrep.php" target=rframe class=simple> Donors
			Report </a></li>
			<li><a href="branchrep.php" target=rframe class=simple>
			Branches Report </a></li>
			<li><a href="donatedrep.php" target=rframe class=simple>
			Blood Donation Report </a></li>
			<li><a href="staffrep.php" target=rframe class=simple>
			Employees Report </a></li>
			<li><a href="Request.php" target=rframe class=simple>
			Request Report </a></li>
			<li><a href="stock.php" target=rframe class=simple>
			Stock Report </a></li>
		
		</div>
</td>
<td align=center width=84%>
<iframe name="rframe" src="../assets/images/r.png" width=100% height=100%>
</iframe>
</td>
</tr>
</table>
</body>
</html>