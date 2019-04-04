<?php 
include "auth.php";
?>
<html>
<head>
<script type="text/javascript">
function check()
{
var idre=/[0-9]/i;
var id=document.getElementById('name');
if(!idre.test(id.value.toString()))
	{
		window.alert('Invalid Customer ID');
		return false;
	}
return true;
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
<div class="cust"> <b> Enter customer Id </b> </div>
<div>
	<br/>
   <form id="adddon" method=post action="ItemEntry.php" onsubmit="if( window.check ) { return check(); } return true;">

   <table width=100% border=0 cellspacing=5 cellpadding=5>
   <tr>
   <td width=35%>
    Customer ID
   </td>
   <td width=65%>
       <input class=box name="name" id="name" type="text" width=20px /> 
    </td>   
   </tr>
   
   <tr>
<td align=right>
<br>
<input type="submit" name="submit" value="Search" >  
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