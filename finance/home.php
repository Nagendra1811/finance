<?php 
session_start();
session_destroy();
?>
<html>
<title>
Finance
</title>
<head>
<link href="assets/css/home.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor=#746f6f>
<table width=100% height=50% border=2 align=center cellspacing=0 cellpadding=-2 class=borderfull border=2>
<tr>
<td bgcolor=#2a2a2a align=center valign="middle">
<h1 class=rep align="center"><br/><img src="assets/images/logo.png" align="middle" width=100px height=100px> Lakshmi Narayana Finance(R)
 </h1>
</td>
</tr>
<table width=100% height=100% border=0 cellspacing=0 align="center"  >
<tr>
<td width=30% height=35% valign="top" class="border2">
<form method=POST action=login.php>
<table style="border-color:#948f8f;border-style:solid;border-width:medium;" width="50%" border=0>
<caption style="background-color:silver;border-color:#746f6f;"><b>Login </b></caption>

<tr>
<td rowspan=3 align=center>
<img src="assets/images/security.png" width=50px"> </img>
</td>
<td><label>User Name:</label></td>
<td><input type="text" name="name"></input></td>
</tr>
<tr><td><label>Password:</label></td>
<td><input type="password" name="pass"></input></td></tr>
<tr align="center"><td>  &nbsp;
</td>
<td align=left> <input type="submit" value="Login"></input> &nbsp; &nbsp; <input type="reset" value="Cancel"></input></td></tr>
</table>
</form>
<?php if(isset($_GET['msg']))
	{
		echo $_GET['msg'];
	}
?>
</td>
</tr>
</table>
</body>
</html>