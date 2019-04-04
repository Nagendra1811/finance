<?php 
include "auth.php";
?>
<head>
<link href="assets/css/premaster.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function check()
{
	var idre=/[0-9]+/i;
	var id=document.getElementById('bg');
	if(!idre.test(id.value.toString()))
	{
		window.alert('Enter Valid Document Id');
		return false;
	}
}
</script>
</head>
<body>
<table>
<tr>
<td>
<form name="customer" method="post" action="searchDo.php" target="frame1" onsubmit="if( window.check ) { return check(); } return true;">
<br/>
<br/>
<div class=text > Enter Document Id &nbsp; &nbsp;
<input type="text" name="bg" id="bg">
</div>
</td>
</tr>
<tr>
<td align=right>
<input type="submit" value="Search" name="submit" >
</td>
</tr>
</table> 
</body>
</html>