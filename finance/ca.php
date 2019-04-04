<?php 
include "auth.php";
?>
<html>
<head>
<script type="text/javascript">
function check()
{
	
	var datere=/[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}/i;
	var id=document.getElementById('date');
	var id1=document.getElementById('date1');
	if(!idatere.test(id.value.toString()))
	{
		window.alert('Please Enter valid Date ');
		return false;
	}
	if(!idatere.test(id1.value.toString()))
	{
		window.alert('Please Enter valid Date');
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
<div class="cust"> <b> Cash Account </b> </div>
<div>
	<br/>
  <form name="ca" method=post action="statement.php" onsubmit="if( window.check ) { return check(); } return true;">
   <table width=100% border=0 cellspacing=5 cellpadding=5>
   <tr>
	<td width=50%>
       	<?php 
	include "sqlconnect.php";
	$query="Select ca from report";
	$res=mysql_query($query) or die(mysql_errno());
	echo "Balance  &nbsp; &nbsp;</td><td>";
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
	<td width=50%>
	 Start Date
	</td><td>
      <input type="text" id="date" name="date" >&nbsp;Year-Month-Date
    </td>   
   
   </tr>
   <tr>
   <td width=50%>
  End Date
	</td><td>
       <input id="date1" name="date1" type="text">&nbsp;Year-Month-Date
    </td>   
     </tr>
 
   <tr>
<td align=right>
<br>
<input type="submit" name="submit" value="Submit" >  
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
</tr>
</table>
</body>
</html>