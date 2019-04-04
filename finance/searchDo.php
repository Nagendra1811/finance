<?php 
session_start();
?>
<html>
<head>
<link href="assets/css/masterhead.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function check()
{
	var idre=/[0-9]+/i;
	var id=document.getElementById('bal');
	if(!idre.test(id.value.toString()))
	{
		window.alert('Enter Valid Amount');
		return false;
	}
}
</script>
</head>
<body bgcolor=#746f6f>
<?php include("sqlconnect.php"); 
if(isset($_SESSION['loggedin']))
echo "<a href=\"presearch.php\" > Back to  search </a>";
?>
<br/>
<br/>


<?php
$group=$_POST['bg'];

$query="SELECT docid,bal,customerid,name,photo from docmap,customer where docid=$group and docmap.custid=customer.customerid"; 
$results=mysql_query($query)
or die(mysql_error());

if(mysql_num_rows($results)==0)
{
	echo "Invalid Document-ID";
	echo "<br/>";
} 
else
{

$c=$cc=1;
$rows=mysql_fetch_array($results);

echo"<h2>Settlement<h2>";
echo "<div class=stext align=center>";
echo "Customer-id <b>" ;
echo $rows[2];
echo "</b>";
echo "</div>";
echo "<br/>";
echo "<div class=stext align=center>";
echo "Document-id <b>" ;
echo $rows[0];
echo "</b>";
echo "</div>";
echo "<br/>";
echo "<form name=gen2 method=post  target=frame1 action='print1.php' onsubmit='if( window.check ) { return check(); } return true;'>";

echo "<br>";
echo "<table width=100% border=0 cellspacing=5 cellpadding=5>";
echo "<tr>";
echo "<td align=left>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Name &nbsp;&nbsp;"; 
echo "<input name=id type=label value='$rows[3]' width=20px readonly> ";
echo "</td>";
echo "<td align=center>";
echo '<img src= "data:image/jpeg;base64,'.base64_encode( $rows['photo'] ).'" name=photo width=100 height=150 />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo "</td>";
echo "</tr>";
echo "</table>";

echo "<br><br>";

$query2="SELECT * from docmap where docid=$group"; 
$resu=mysql_query($query2)
or die(mysql_error());

$row1=mysql_fetch_array($resu);

$bal = $row1[15];
$princi = $row1[9];
$baldate = $row1[16];
$datetime1 = strtotime(date("Y-m-d"));
$datetime2 = strtotime($baldate);
$secs = $datetime1 - $datetime2;// == <seconds between the two times>
$days = $secs / 86400;

$per = ((14/12)/30)/100;

$si=$bal*$days*$per;
//
$bal=number_format((float)$bal, 2, '.', '');
$tot=$bal+$si;
$tot=number_format((float)$tot, 2, '.', '');
$si=number_format((float)$si, 2, '.', '');

echo "<table border=5 id='myTable3'>";
echo "<tr><th>Principal</th><th>Balance</th><th>Interest</th><th>Total</th><th>No. of days</th></tr>";

echo "<tr>";
echo "<td><input type='text' name='princi' id='princi' value='$princi' readonly></td>";
echo "<td><input type='text' name='bal1' id='bal1' value='$bal' readonly></td>";
echo "<td><input type='text' step='0.01' name='interest' id='interest' value='$si' readonly></td>";
echo "<td><input type='text' name='tot' id='tot' style='font-size: 12pt' value='$tot' readonly></td>";
echo "<td><input type='text' name='noof' id='noof' value='$days' readonly></td>";
echo "</tr>";

echo "</table>";

echo "<br><br>";
echo "Enter Amount : <input type=text name='bal' id='bal'><br><br>";

echo "<div class=stext ><input type = 'submit' value = 'submit'></div>";

echo "<input type=hidden name='dcid' value=$rows[0]>";
}
?>

</form>
</body>
</html>