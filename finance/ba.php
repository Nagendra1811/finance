<?php 
include "auth.php";
?>
<html>
<head>
<script type="text/javascript">
function check()
{
	var idre=/[0-9]/;
	var id=document.getElementById('tot');
	if(!idre.test(id.value.toString()))
	{
		window.alert('Please Enter valid Amount');
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
<div class="cust"> <b> Bank Account </b> </div>
<div>
	<br/>
  <form name="ba" method=post action="statement.php" onsubmit="if( window.check ) { return check(); } return true;">
   <table width=100% border=0 cellspacing=5 cellpadding=5>
   
   <tr>
	<td width=65%>
	 Opening Balance
	</td><td>
       <input type="text" value=125000 width=20px style="font-size: 12pt" readonly>
    </td>   
   
   </tr>
   
    <tr>
	<td width=65%>
       	<?php 
	include "sqlconnect.php";
	$query="Select ba from report";
	$res=mysql_query($query) or die(mysql_errno());
	echo "Current Balance  &nbsp; &nbsp;</td><td>";
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
	</tr>
	<tr>
	<td width=65%>
	 Enter Amount
	</td><td>
       <input type="number" id="tot" name="tot" width=20px >
    </td>   
   
   </tr>

   <tr>
<td align=right>
<br>
<input type="submit" name="deposite" value="Deposite" >  
</td>
<td align=left>
<br>
<input type="submit" name="withdraw" value="Withdraw" >  
</td>
</tr>
</table>

    </form>
</div>        
</td>
</tr>
</table>
</body>
</html>