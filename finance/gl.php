<?php 
include "auth.php";
?>
<html>
<head>

<style>
input:FOCUS
{
	background-color:#bbbbbb;
	border-color:brown;
	color:#662211;
	font-size:medium;
}
input:HOVER {
	border-color:#0f0f0f;
}
</style>
<link href="assets/css/masterhead.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor=#746f6f >
<table border=0 width=100%> 
<tr>
<td width=70%>
<div class="cust"> <b> Gold loan </b> </div>
<div>
	<br/>
  <form name="gl"  >
   <table width=100% border=0 cellspacing=5 cellpadding=5>
   <tr>
	<td width=50%>
       	<?php 
	include "sqlconnect.php";
	$query="Select gl from report";
	$res=mysql_query($query) or die(mysql_errno());
	echo "Balance  &nbsp; &nbsp;</td><td width=50%>";
	if(!mysql_num_rows($res))
	echo "No Details available.";
	else
	{
		//echo "<select id=id name=id>";
		//echo "<label><b>scheme</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><b>Rate</b></label><br><br>";
		$row=mysql_fetch_array($res);
			echo "<input type='text' name='bal' value=$row[0] style='font-size: 12pt' readonly>";
	echo "</td>";
	}
	?>
</table>

    </form>
</div>        
</td>
</tr>
</table>
</body>
</html>