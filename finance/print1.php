<html>
<head>
<style>
   /* body {
        height: 842px;
        width: 595px;
        margin-left: auto;
        margin-right: auto;
    }*/
body {
  background: rgb(204,204,204); 
}
/*page {
  background: white;
  display: block;
  margin: 0.5 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A4"] {  
  width: 21cm;
  height: 29.7cm; 
}*/
div.aa {
    position: absolute;
	left : 100;
	top : 250;
	width : 500;
}
div.aaa {
    position: absolute;
	left : 600;
	top : 250;
	width : 500;
}
div.bb{
position : relative;
left : 50;
top : 50;
}
div.pp{
position : relative;
left : 350;
top : 250;
}
div.ppp{
position : relative;
left : 350;
top : 800;
}
div.bbb{
position : absolute;
left : 550;
top : 50;
}
div.t{
position : relative;
left : 250;
top : 20;
}
div.tt{
position : relative;
left : 800;
top : 0;
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
$id=$_POST['dcid'];
$pay=$_POST['bal'];
$query="SELECT name,customerid,totamt,bal,baldate from docmap,customer where docid=$id and docmap.custid=customer.customerid"; 
$results=mysql_query($query)
or die(mysql_error());
$rows=mysql_fetch_array($results);

$bal = $rows[3];
$baldate = $rows[4];

$datetime1 = strtotime(date("Y-m-d"));
$datetime2 = strtotime($baldate);
$secs = $datetime1 - $datetime2;// == <seconds between the two times>
$days = $secs / 86400;

$per = ((14/12)/30)/100;

$si=$bal*$days*$per;

$princi=$pay-$si;
$bal=$bal-$princi;

$date = date("Y-m-d");

$query1="update docmap set bal='".$bal."',
		baldate='".$date."'  where docid='".$id."' "; 
$results=mysql_query($query1)
or die(mysql_error());

//$date = date("Y-m-d");
//echo date('Y-m-d', strtotime($date.' - '..'days'));



echo "<div id='divToPrint'>";
echo "<input type='button' value='print' onclick='window.print();' />";
echo "<div  class=bb>";
echo "<h2>Lakshmi Narayana Finance(R)</h2>";
echo "Reg. DRN/NML/YMC/08/2017-18&nbsp;&nbsp;Siddapura. ph-no : 9449203611<br>";
echo "<h4>Settlement</h4>";
echo "</div>";
echo "<div  class=t>";
echo "<b>Date : </b>"; print (date("d-m-Y h:i:sa"));
echo "</div>";
echo "<div  class=tt>";
echo "<b>Date : </b>"; print (date("d-m-Y h:i:sa"));
echo "</div>";
echo "<div class=aa>";
echo "Customer Name : <b>$rows[0]</b><br><br>";
echo "Cutomer ID : <b>$rows[1]</b><br><br>";
echo "Document ID : <b>$id</b><br><br>";
echo "Amount : <b>$rows[2]</b><br><br>";
echo "<table border=2>";
echo "<tr><td>Principal : <b>".number_format($princi, 2, '.', '')."</b></td></tr><br>";
echo "<tr><td>Interest : <b>".number_format($si, 2, '.', '')."</b></td></tr><br>";
echo "<tr><td>Total : <b>$pay</b></td></tr>";
echo "</table>";
//echo "Processing fees : Rs. 20 <br><br><br><br><br><br>";
echo "</div>";
//echo "<div class=cc>";

//echo "</div>";

$dreg = date("Y-m-d");
$que="update report set ca=ca+$pay, gl=gl-$pay,interest=interest+$si where slno=1 "; 
$resu=mysql_query($que)
or die(mysql_error());
$qu="insert into statement(slno,date,particular,debit,credit,balance) select 'null','$dreg','Gold loan Settlement','','$pay',ca from report where slno=1";
$rrr=mysql_query($qu)
or die(mysql_error());

echo "<div  class=bbb>";
echo "<h2>Lakshmi Narayana Finance(R)</h2>";
echo "Reg. DRN/NML/YMC/08/2017-18&nbsp;&nbsp;Siddapura. ph-no : 9449203611<br>";
echo "<h4>Settlement</h4>";
echo "</div>";

echo "<div class=aaa>";
echo "Customer Name : <b>$rows[0]</b><br><br>";
echo "Cutomer ID : <b>$rows[1]</b><br><br>";
echo "Document ID : <b>$id</b><br><br>";
echo "Amount : <b>$rows[2]</b><br><br>";
echo "<table border=2>";
echo "<tr><td>Principal : <b>".number_format($princi, 2, '.', '')."</b></td></tr><br>";
echo "<tr><td>Interest : <b>".number_format($si, 2, '.', '')."</b></td></tr><br>";
echo "<tr><td>Total : <b>$pay</b></td></tr>";
echo "</table>";

//echo "Processing fees : Rs. 20 <br><br><br><br><br><br>";
echo "</div>";
?>
</form>
</body>
</html>