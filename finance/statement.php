<html>
<head>
<style>
   
body {
  background: rgb(204,204,204); 
}

div.bb{
position : relative;
left : 250;
top : 20;
}
div.pp{
position : relative;
left : 350;
}
div.ppp{
position : relative;
left : 350;
}
div.bbb{
position : relative;
left : 250;
top : 0;
}

div.t{
position : relative;
left : 500;
}
div.tt{
position : relative;
left : 500;
}
    </style>
<script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=1000px,height=842px');
       //popupWin.document.open();
       //popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        //popupWin.document.close();
		window.print();
            }
 </script>
</head>
<body>
<form>
<?php 
include("sqlconnect.php");

$tot=$_POST['tot'];
$dreg = date("Y-m-d");

if(isset($_POST['add'])) 
{
$que="update report set ca=ca+$tot where slno=1 "; 
$resu=mysql_query($que)
or die(mysql_error());
$qu="insert into statement(slno,date,particular,debit,credit,balance) select 'null','$dreg','Reverse Entry','','$tot',ca from report where slno=1";
$rrr=mysql_query($qu)
or die(mysql_error());
echo "<br>Money successfully added to Cash Acount!";
}
else if(isset($_POST['subtract'])) 
{ 
$que="update report set ca=ca-$tot where slno=1 "; 
$resu=mysql_query($que)
or die(mysql_error());
$qu="insert into statement(slno,date,particular,debit,credit,balance) select 'null','$dreg','Reverse Entry','$tot','',ca from report where slno=1";
$rrr=mysql_query($qu)
or die(mysql_error());
echo "<br>Money successfully subtracted from Cash Acount!";
}
else if(isset($_POST['deposite'])) 
{ 
$que="update report set ca=ca-$tot, ba=ba+$tot where slno=1 "; 
$resu=mysql_query($que)
or die(mysql_error());
$qu="insert into statement(slno,date,particular,debit,credit,balance) select 'null','$dreg','Deposited to Bank','$tot','',ca from report where slno=1";
$rrr=mysql_query($qu)
or die(mysql_error());
echo "<br>Money successfully Deposited to Bank!";
}
else if(isset($_POST['withdraw'])) 
{  
$que="update report set ca=ca+$tot, ba=ba-$tot where slno=1 "; 
$resu=mysql_query($que)
or die(mysql_error());
$qu="insert into statement(slno,date,particular,debit,credit,balance) select 'null','$dreg','Withdrawn from Bank','','$tot',ca from report where slno=1";
$rrr=mysql_query($qu)
or die(mysql_error());
echo "<br>Money successfully Withdrawn from Bank!";
}
else if(isset($_POST['submit'])) 
{  
echo "<div id='divToPrint'>";
echo "<h2>Lakshmi Narayana Finance(R)</h2>";
echo "Reg. DRN/NML/YMC/08/2017-18&nbsp;&nbsp;Siddapura. ph-no : 9449203611<br>";
echo "<br><br>";
echo "<table >";
echo "<tr>
	<td width=65%>
	 Opening Balance
	</td><td>
       <input type='text' value=200000 width=20px style='font-size: 12pt' readonly>
    </td>   
   
   </tr></table><br>";
$d1=$_POST['date'];
$d2=$_POST['date1'];
$query="SELECT date,particular,debit,credit,balance from statement where date BETWEEN '$d1' AND '$d2'"; 
$results=mysql_query($query)
or die(mysql_error());
echo "<table border=5>";
echo "<tr><th>Date</th><th>Particular</th><th>Debit</th><th>Credit</th><th>Balance</th></tr>";
while($row=mysql_fetch_array($results)){
echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td></tr>";
}
echo "</table>";
echo "<input type='button' value='print' onclick='window.print();' />";
echo "</div>";
}
?>
</form>
</body>
</html>