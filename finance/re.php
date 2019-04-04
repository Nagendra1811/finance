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
<div class="cust"> <b> Reverse Entry </b> </div>
<div>
	<br/>
  <form name="re" method=post action="statement.php" onsubmit="if( window.check ) { return check(); } return true;">
   <table width=100% border=0 cellspacing=5 cellpadding=5>
   
	
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
<input type="submit" name="add" value="Add" >  
</td>
<td align=left>
<br>
<input type="submit" name="subtract" value="Subtract" >  
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