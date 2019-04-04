<?php 
session_start();
?>
<html>
<head>
<link href="assets/css/masterhead.css" rel="stylesheet" type="text/css">
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

$query="SELECT docid,customerid,name,photo from docmap,customer where docid=$group and docmap.custid=customer.customerid"; 
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

echo"<h2>Document Details<h2>";
echo "<div class=stext align=center>";
echo "Customer-id <b>" ;
echo $rows[1];
echo "</b>";
echo "</div>";
echo "<br/>";
echo "<div class=stext align=center>";
echo "Document-id <b>" ;
echo $rows[0];
echo "</b>";
echo "</div>";
echo "<br/>";
echo "<form name=gen2 method=post  target=frame1 action='print.php'>";

echo "<div class=stext align=right><input type = 'submit' value = 'print'>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</div>";
echo "<br>";
echo "<table width=100% border=0 cellspacing=5 cellpadding=5>";
echo "<tr>";
echo "<td align=left>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Name &nbsp;&nbsp;"; 
echo "<input name=id type=label value=$rows[2] width=20px readonly> ";
echo "</td>";
echo "<td align=center>";
echo '<img src= "data:image/jpeg;base64,'.base64_encode( $rows['photo'] ).'" name=photo width=100 height=150 />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo "</td>";
echo "</tr>";
echo "</table>";

echo "<table border=5 id='myTable'>";
echo "<tr><th>Select item</th><th>Count</th><th>Stoned item</th><th>Purity</th><th>Gross wgt</th><th>Stone wgt</th><th>Net wgt</th><th>Remarks</th></tr>";

$query1="SELECT * from document where documentid=$group"; 
$result=mysql_query($query1)
or die(mysql_error());

while($row=mysql_fetch_array($result)){
echo "<tr>";
echo "<td><input type='text' id='sel$c' name='sel[]' value='$row[1]' readonly></td>";
echo "<td><input type='text' name='count[]' id='count$c' value='$row[2]' readonly></td>";
echo "<td><input type='text' name='stone[]' id='stone$c' value='$row[3]' readonly></td>";
echo "<td><input type='text' id='purity$c' name='purity[]' value='$row[4]' readonly></td>";
echo "<td><input type='text' name='grosswgt[]' id='grosswgt$c' value='$row[5]' readonly></td>";
echo "<td><input type='text' name='stwgt[]' id='stwgt$c' value='$row[6]' readonly></td>";
echo "<td><input type='text' name='netwgt[]' id='netwgt$c' value='$row[7]' readonly></td>";
echo "<td><input type='text' name='remarks[]' id='remarks$c' value='$row[8]' readonly></td>";
echo "</tr>";
$c++;
}
echo "</table>";

echo "<br>";

echo "<table border=5 id='myTable2'>";
echo "<tr><th>Item</th><th>Purity</th><th>Net wgt(Deducted)</th></tr>";
$query1="SELECT * from document where documentid=$group"; 
$result=mysql_query($query1)
or die(mysql_error());

while($row=mysql_fetch_array($result)){
echo "<tr>";
echo "<td><input type='text' name='item[]' id='item$cc' value='$row[1]' readonly></td>";
echo "<td><input type='text' name='pur[]' id='pur$cc' value='$row[4]' readonly></td>";
echo "<td><input type='text' name='ded[]' id='ded$cc' value='$row[9]' readonly></td>";
echo "</tr>";
$cc++;
}
echo "</table>";
echo "<br>";

$query2="SELECT * from docmap where docid=$group"; 
$resu=mysql_query($query2)
or die(mysql_error());

$row1=mysql_fetch_array($resu);

echo "<br>";
echo "<table border=5 id='myTable1'>";
echo "<tr><th>Total pieces</th><th>Total Gross Wgt</th><th>Total Stone wgt</th><th>total Net wgt</th><th>Remarks</th></tr>";

echo "<tr>";
echo "<td><input type='text' name='totp' id='totp' value='$row1[2]' readonly></td>";
echo "<td><input type='text' name='totgrosswgt' id='totgrosswgt' value='$row1[3]' readonly></td>";
echo "<td><input type='text' name='totstwgt' id='totstwgt' value='$row1[4]' readonly></td>";
echo "<td><input type='text' name='totnetwgt' id='totnetwgt' value='$row1[5]' readonly></td>";
echo "<td><input type='text' name='totremarks' id='totremarks' value='$row1[6]' readonly></td>";
echo "</tr>";

echo "</table>";
echo "<br><br>";
echo "Select Scheme : <input type='text' id='selScheme' name='selScheme' value='$row1[7]' readonly><br><br>";
echo "Gold rate per gram : <input type='text' id='gram' name='gram' value='$row1[8]' readonly>&nbsp;&nbsp;&nbsp;&nbsp;";
echo "Total Amount: <input type='text' id='totAmt' name='totAmt' value='$row1[9]' readonly><br><br>";

echo "<br><br>";
echo "<table border=5 id='myTable3'>";
echo "<tr><th>Date</th><th>Duration</th><th>Interest (14%)</th><th>Loan Amount</th><th>Remarks</th></tr>";

echo "<tr>";
echo "<td><input type='text' name='date' id='date' value='$row1[10]' readonly></td>";
echo "<td><input type='text' name='duration' id='duration' value='$row1[11]' readonly></td>";
echo "<td><input type='text' name='interest' id='interest' value='$row1[12]' readonly></td>";
echo "<td><input type='text' name='loanAmt' id='loanAmt' style='font-size: 12pt' value='$row1[13]' readonly></td>";
echo "<td><input name='loanremarks' id='loanremarks' value='$row1[14]' readonly></td>";
echo "</tr>";

echo "</table>";
echo "<br><br>";
echo "Remaining Balance : <input type='text' name='rem' id='rem' value='$row1[15]' readonly><br><br>";
echo "Last settlement : <input type='text' name='last' id='last' value='$row1[16]' readonly><br><br>";
echo "<input type=hidden name='dcid' value=$rows[0]>";
}
?>

</form>
</body>
</html>