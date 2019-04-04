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
<th>Donor</th>
<th>Customer</th>
<th>Blood Group</th>
<th>Units</th>
<th>Date Requested</th>
<th>Date Delivered</th>
</tr>
<?php
include "sqlconnect.php";
$query="SELECT donor.name,customer.name,
		request.bgroup,request.unit,dreq,ddel 
		from donor,customer,request,transaction,donated
		where customer.cid=request.cid and
		donor.did=donated.did and donated.bid=transaction.bid
		and request.rid=transaction.rid";
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
			echo "<td>$row[5]</td>";
			echo "</tr>"; 
		}
	}
	echo "</table>";
?>
</table>
</body>
</html>