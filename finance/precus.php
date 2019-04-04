<?php 
include "auth.php";
?>
<html>
<head>
<link href="assets/css/premaster.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function check()
{
	var idre=/[0-9]+/i;
	var id=document.getElementById('id');
	if(!idre.test(id.value.toString()))
	{
		window.alert('Enter Valid Customer Id');
		return false;
	}
}
</script>
</head>
<body bgcolor=#746f6f>
<form name="customer" method="post" action="searchc.php" target=frame1 onsubmit="if( window.check ) { return check(); } return true;">
<table>
<tr>
<td>
<br/>
<br/>
<div class=text > Enter Customer Id  &nbsp; &nbsp;
<input type="text" name="cid" id="id">
</div>
</td>
</tr>
<tr>
<td align=right>
<?php 
	echo "<input type=\"submit\" value=\"Search\" name=\"submit\" >";
?>
</td>
</tr>

</table> 
</form>
</body>
</html>