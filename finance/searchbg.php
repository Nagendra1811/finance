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

<a href="presearch.php" > Back to  search </a>

<br/>
<br/>
<?php

$id= $_POST['cname'];
$query="SELECT customer.customerid,customer.name,customer.fhname,customer.phone,docmap.docid from customer inner join docmap on customer.name like '$id%' 
and customer.customerid=docmap.custid "; 
$results=mysql_query($query)
or die(mysql_error());

if(mysql_num_rows($results)==0)
{
	echo "No records found with Document ID!";
	echo "<br/>";
}
else
{
echo "<div class=stext align=center>";
echo "Details of the Customer having Customer Name <b>" ;
echo $_POST['cname'];
echo "</b> with Document ID";
echo "</div>";
echo "<br/>";
echo "<br/>";


echo "<table width=50% border=5 >";
echo "<tr><th>Customer id</th><th>Name</th><th>S/o D/o W/o</th><th>phone number</th><th>Document id</th></tr>";
while($rows=mysql_fetch_array($results)){
echo "<tr><td> ".$rows[0]."</td>";
echo "<td> ".$rows[1]."</td>";
echo "<td> ".$rows[2]."</td>";
echo "<td> ".$rows[3]."</td>";
echo "<td> ".$rows[4]."</td></tr>";
}
echo "</table>";
//$row=mysql_fetch_row($results);
}
echo "<br>";
$query1="SELECT customer.customerid,customer.name,customer.fhname,customer.phone from customer where customer.name like '$id%'"; 
$results1=mysql_query($query1)
or die(mysql_error());
if(mysql_num_rows($results1)==0)
{
	echo "No records found without Document ID!";
	echo "<br/>";
}
else{
echo "<div class=stext align=center>";
echo "Details of the Customer having Customer Name <b>" ;
echo $_POST['cname'];
echo "</b>";
echo "</div>";
echo "<br/>";
echo "<br/>";


echo "<table width=50% border=5 >";
echo "<tr><th>Customer id</th><th>Name</th><th>S/o D/o W/o</th><th>phone number</th></tr>";
while($row=mysql_fetch_array($results1)){
echo "<tr><td> ".$row[0]."</td>";
echo "<td> ".$row[1]."</td>";
echo "<td> ".$row[2]."</td>";
echo "<td> ".$row[3]."</td></tr>";
}
echo "</table>";

}
?>

</body>
</html>