<?php 
include "auth.php";
?>
<html>
<head>
<style>
a:FOCUS
{
text-decoration:none;
color:#000000;
}
td:HOVER {
	background-color:CCDDFF;
}
</style>
<body style="background-color: F0F8FF">
<br/><br/>
<table align="center" cellpadding="2" cellspacing="2" style="border:collapse;" width=90%>
<tr style="background-color: 6495ED;color: FFFFFF;font-weight: bold">
<th>Customer</th>
<th>Blood Group</th>
<th>Units</th>
<th>Date Requested</th>
<th>Amount Paid</th>
</tr>
<?php
include "sqlconnect.php";
$query="SELECT c.name,bgroup,unit,dreq,amtpaid
		from customer c,request r
		where c.cid=r.cid";
$res=mysql_query($query) or die(mysql_error());
if(!mysql_num_rows($res))
	{
		echo "<tr style=\"background-color: D3D3D3\" align=\"center\">";
		echo "<td colspan=6>No Results.</td></tr>";
	}
	else
	{
		while($row=mysql_fetch_array($res))
		{
			echo "<tr style=\"background-color: D3D3D3\" align=\"center\">";
			echo "<td>$row[0]</td>";
			echo "<td>$row[1]</td>";
			echo "<td>$row[2]</td>";
			echo "<td>$row[3]</td>";
			echo "<td>$row[4]</td>";
			echo "</tr>"; 
		}
	}
	echo "</table>";
?>
</table>
</body>
</html>