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
<th>Donor</th>
<th>Gender</th>
<th>Blood Group</th>
<th>Address</th>
<th>Phone</th>
<th>e-mail</th>
<th>Date Registered</th>
</tr>
<?php
include "sqlconnect.php";
$query="Select name,gender,donor.bgroup,address,phone,email,dreg
		from donor";
$res=mysql_query($query) or die(mysql_error());
	if(!mysql_num_rows($res))
	{
		echo "<tr style=\"background-color: D3D3D3\" align=\"center\">";
		echo "<td colspan=7>No Results.</td></tr>";
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
				echo "<td>$row[6]</td>";
				echo "</tr>"; 
			}
	}
	echo "</table>";
?>
</table>
</body>
</html>