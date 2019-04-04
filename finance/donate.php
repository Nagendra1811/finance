<?php 
include "auth.php";
?>
<html>
<head>
<script type="text/javascript">
function check()
{
	var idre=/[0-9]+/i;
	var id=document.getElementById('unit');
	if(!idre.test(id.value.toString()))
	{
		window.alert('Please Enter Amount');
		return false;
	}
}
</script>
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
<div class="cust"> <b> Update gold rate </b> </div>
<div>
	<br/>
  <form id="addDonation" method=post action="donationentry.php" onsubmit="if( window.check ) { return check(); } return true;">
   <table width=100% border=0 cellspacing=5 cellpadding=5>
   <tr>
    <td width=65%>
       	<?php 
	include "sqlconnect.php";
	$query="Select * from scheme";
	$res=mysql_query($query) or die(mysql_errno());
	if(!mysql_num_rows($res))
	echo "No Details available.";
	else
	{
		echo "Scheme  &nbsp; &nbsp;</td><td>";
		//echo "<select id=id name=id>";
		echo "<label><b>scheme</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label><b>Rate</b></label><br><br>";
		while($row=mysql_fetch_array($res))
		{
			echo "<label>".$row['name']."</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>".$row['amount']."</label><br><br>";
		}
	//echo "</select></td>";
	}
	?>
    </td>   
   
   </tr>
   <tr>
   <td width=65%>
	<div>  
	<?php
	$query="Select * from scheme";
	$res=mysql_query($query) or die(mysql_errno());
	if(!mysql_num_rows($res))
	echo "No Details available.";
	else
	{
		echo "Select scheme to update &nbsp; &nbsp;</td><td>";
		echo "<select id=id1 name=bid>";
		while($row=mysql_fetch_array($res))
		{
			echo "<option>".$row['name']."</option>";
		}
	echo "</select></td>";
	}
	?>
 </div>
    </td>   
     </tr>
       <tr>
    <td width=65%>
	 Enter Amount to update
	
	</td><td>
       <input type="text" id="unit" name="unit" width=20px/>
    </td>   
  
   </tr>
   <tr>
<td align=right>
<br>
<input type="submit" name="submit" value="Save Record" >  
</td>
<td align=left>
<br>
<input type="reset" name="reset" value="Clear Fields" >  
</td>
</tr>
</table>

    </form>
</div>        
</td>

<td align=center width=30%>


</td>
</tr>
</table>
</body>
</html>