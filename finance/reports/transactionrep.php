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
<br><br>
<form action=transactionrep.php method=post>
<div align="center">
Select Month
&nbsp;&nbsp;<select name="month">
<?php 
if($_POST)
{
	//echo "<option value=".$_POST["month"].">".date("F",mktime(0,0,0,$_POST["month"]+1,0,0))."</option>";
	$s=($_POST["month"]==1)?"selected":"";
	echo "<option value=1 $s>January</option>";
	$s=($_POST["month"]==2)?"selected":"";
	echo "<option value=2 $s>February</option>";
	$s=($_POST["month"]==3)?"selected":"";
	echo "<option value=3 $s>March</option>";
	$s=($_POST["month"]==4)?"selected":"";
	echo "<option value=4 $s>April</option>";
	$s=($_POST["month"]==5)?"selected":"";
	echo "<option value=5 $s>May</option>";
	$s=($_POST["month"]==6)?"selected":"";
	echo "<option value=6 $s>June</option>";
	$s=($_POST["month"]==7)?"selected":"";
	echo "<option value=7 $s>July</option>";
	$s=($_POST["month"]==8)?"selected":"";
	echo "<option value=8 $s>August</option>";
	$s=($_POST["month"]==9)?"selected":"";
	echo "<option value=9 $s>September</option>";
	$s=($_POST["month"]==10)?"selected":"";
	echo "<option value=10 $s>October</option>";
	$s=($_POST["month"]==11)?"selected":"";
	echo "<option value=11 $s>November</option>";
	$s=($_POST["month"]==12)?"selected":"";
	echo "<option value=12 $s>December</option>";
}
else
{
	echo "<option value=1>January</option>";
	echo "<option value=2>February</option>";
	echo "<option value=3>March</option>";
	echo "<option value=4>April</option>";
	echo "<option value=5>May</option>";
	echo "<option value=6>June</option>";
	echo "<option value=7>July</option>";
	echo "<option value=8>August</option>";
	echo "<option value=9>September</option>";
	echo "<option value=10>October</option>";
	echo "<option value=11>November</option>";
	echo "<option value=12>December</option>";
}
?>
</select>
<input type="submit" value="Generate" name="submit"></input>
</div>
</form>
<?php
if($_POST)
{
	echo "<table align=\"center\" cellpadding=\"2\" cellspacing=\"2\" style=\"border:collapse;\" width=90%>";
	echo "<caption>Results for <b>".date("F",mktime(0,0,0,$_POST["month"]+1,0,0))."</b></caption>";
	echo "<tr style=\"background-color: 6495ED;color: FFFFFF;font-weight: bold\">";
	echo "<th>Customer</th>
		<th>Blood Group</th>
		<th>Units</th>
		<th>Processor</th>
		<th>Date Delivered</th>
		</tr>";
	include "sqlconnect.php";
	$query="SELECT customer.name,request.bgroup,request.unit,staff.name,ddel
			from customer,request,transaction,staff
			where customer.cid=request.cid and request.rid=transaction.rid
			and transaction.staffid=staff.staffid
			and (select month(ddel)=".$_POST["month"].")";
		
	$res=mysql_query($query) or die(mysql_error());
	if(!mysql_num_rows($res))
	{
		echo "<tr style=\"background-color: D3D3D3\" align=\"center\">";
		echo "<td colspan=5>No Results for the Selected Month.</td></tr>";
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
}
/*else 
{
	echo "<h3 align=center>Select Month</h1>";
}*/
?>
</body>
</html>