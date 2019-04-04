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
<th>Branch</th>
<th>Address</th>
<th>Blood Group</th>
<th style=color:red>Units</th>
</tr>
<?php
include "sqlconnect.php";
$query="Select name,address,bgroup,unit
		from stock,branch
		where stock.brid=branch.brid order by name";
$flag=0;
$res=mysql_query($query) or die(mysql_error());
	if(!mysql_num_rows($res))
	{
		echo "<tr style=\"background-color: D3D3D3\" align=\"center\">";
		echo "<td colspan=4>No Results.</td></tr>";
	}
	else
	{
		while($row=mysql_fetch_array($res))
		{
			echo "<tr style=\"background-color: D3D3D3\" align=\"center\">";
			if(($flag=$flag%8)==0)
			{
				echo "<td rowspan=8>$row[0]</td>";
			}
			if(($flag=$flag%8)==0)
			{
				echo "<td rowspan=8>$row[1]</td>";
			}
			echo "<td>$row[2]</td>";
			echo "<td style=color:red>$row[3]</td>";
			echo "</tr>"; 
			$flag++;
		}
	}
	echo "</table>";
?>
</table>
</body>
</html>