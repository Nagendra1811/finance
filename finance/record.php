<?php 
include "auth.php";
?>
<html>
<head>
<link href="assets/css/masterhead.css" rel="stylesheet" type="text/css">
</head>

</style>
</head>
<body bgcolor=#746f6f>
<?php include("sqlconnect.php"); ?>
<br/>
<br/>
<?php

echo"<h2>Gold Loan Status<h2>";

echo "<form name=gen2 method=post  target=frame1 action='print1.php' onsubmit='if( window.check ) { return check(); } return true;'>";

echo "<br><br>";

echo "<table border=2 id='myTable3'>";
echo "<tr><th>Customer Id</th><th>Document Id</th><th>Name</th><th>Principal</th><th>Balance</th><th>Interest</th><th>Total</th><th>No. of days</th></tr>";

$query2="SELECT docid,bal,totamt,baldate,customerid,name,DATEDIFF(now(),baldate) as bb from docmap,customer where docmap.custid=customer.customerid and bal>0 order by bb desc"; 
$resu=mysql_query($query2)
or die(mysql_error());

while($row1=mysql_fetch_array($resu)){

$bal = $row1[1];
$princi = $row1[2];
$baldate = $row1[3];
$datetime1 = strtotime(date("Y-m-d"));
$datetime2 = strtotime($baldate);
$secs = $datetime1 - $datetime2;// == <seconds between the two times>
$days = $secs / 86400;

$per = ((14/12)/30)/100;

$si=$bal*$days*$per;

$bal=number_format((float)$bal, 2, '.', '');
$tot=$bal+$si;
$tot=number_format((float)$tot, 2, '.', '');
$si=number_format((float)$si, 2, '.', '');

echo "<tr>";
echo "<td>".$row1[4]."</td>";
echo "<td>".$row1[0]."</td>";
echo "<td>".$row1[5]."</td>";
echo "<td>$princi</td>";
echo "<td>$bal</td>";
echo "<td>$si</td>";
echo "<td>$tot</td>";
echo "<td>$days</td>";
echo "</tr>";
}
echo "</table>";

?>

</body>
</html>