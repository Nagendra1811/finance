<?php 
include "auth.php";
?>
<html>
<head>
<script type="text/javascript">
function check()
{
	var idre=/[0-9]/;
	var namere=/[a-z]+/i;
	var id=document.getElementById('ea');
	var n=document.getElementById('name');
	if(!namere.test(n.value.toString()))
	{
		window.alert('Invalid Name');
		return false;
	}
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
<div class="cust"> <b> Billings </b> </div>
<div>
	<br/>
  <form name="bil" method=post action="printrecipt.php" onsubmit="if( window.check ) { return check(); } return true;">
   <table width=100% border=0 cellspacing=5 cellpadding=5>
   <tr>
	<td width=65%>
       	<?php 
	include "sqlconnect.php";
	$query="Select bil from report";
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
	<td width=65%>
	 Name
	</td><td>
       <input type="text" id="name" name="name" width=20px>
    </td>   
   
   </tr>
	<tr>
	<td width=65%>
	 Enter Amount
	</td><td>
       <input type="number" id="ea" name="ea" width=20px onchange="cha()">
    </td>   
   
   </tr>
   <tr>
   <td width=65%>
  Charges
	</td><td>
       <input type="number" id="ch" name="ch" width=20px onchange="cha()">
    </td>   
     </tr>
       <tr>
    <td width=65%>
	 Total
	
	</td><td>
       <input type="text" id="tot" name="tot" width=20px readonly>
    </td>   
  
   </tr>
   <script>
   function cha(){
var ii=Number(document.getElementById('ea').value);
var jj=Number(document.getElementById('ch').value);
document.getElementById('tot').value=ii+jj;
}
   </script>
   <tr>
<td align=right>
<br>
<input type="submit" name="bil" value="Submit" >  
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