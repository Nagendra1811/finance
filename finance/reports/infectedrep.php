<?php 
include "auth.php";
?>
<html>
<head>
<style>
td:HOVER {
	background-color:CCDDFF;
}
</style>
<body style="background-color: F0F8FF">
<br/><br/>
<table align="center" cellpadding="2" cellspacing="2" style="border:collapse;" width=90%>
<tr style="background-color: 6495ED;color: FFFFFF;font-weight: bold">
<th>Blood Id</th>
<th>Donor</th>
<th>Blood Group</th>
<th>Units</th>
<th>Reason</th>
<th>Processor</th>
</tr>
<?php
include "sqlconnect.php";
$query="Select i.bid,d.name,d.bgroup,unit,reason,s.name
		from infected i,staff s,donor d,donated dt
		where i.bid=dt.bid and s.staffid=i.staffid
		and dt.did=d.did";
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