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
	top : 200;
	width : 500;
}
div.aaa {
    position: absolute;
	left : 100;
	top : 850;
	width : 500;
}
div.bb{
position : relative;
left : 250;
top : 50;
}
div.bbb{
position : absolute;
left : 250;
top : 700;
}
div.cc{
position : absolute;
top : 200;
left :550;
}
div.ccc{
position : absolute;
top : 850;
left :550;
}
div.t{
position : relative;
left : 500;
top : 50;
}
div.tt{
position : relative;
left : 500;
top : 700;
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
$query="SELECT name,customerid,hno,location,post,district,state,pincode,country,phone,docid,totcount,totgrosswt,totstonewt,totnetwt,scheme,
date,totamt from docmap,customer where docid=$id and docmap.custid=customer.customerid"; //
$results=mysql_query($query)
or die(mysql_error());
$query1="SELECT item,remarks from document where documentid=$id"; //
$result=mysql_query($query1)
or die(mysql_error());
$rows=mysql_fetch_array($results);


echo "<div id='divToPrint'>";

echo "<div  class=bb>";
echo "<h2>Lakshmi Narayana Finance(R)</h2>";
echo "Reg. DRN/NML/YMC/08/2017-18&nbsp;&nbsp;Siddapura. ph-no : 9449203611<br><br>";
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
echo "Address : <textarea style='width: 300px; height: 50px;'>$rows[2] $rows[3] $rows[4] $rows[5] $rows[6] $rows[7] $rows[8]</textarea> <br><br>";
echo "Total pieces : <b>$rows[11]</b><br><br>";
echo "Total stone wt : <b>$rows[13]</b><br><br>";
echo "Scheme : <b>$rows[15]</b><br><br>";
echo "Duration : <b>$rows[16] to "; echo date('Y-m-d', strtotime($rows[16].' + 89 days')); echo "</b><br><br>";
echo "Processing fees : Rs. 20 <br><br><br><br><br><br>";
echo "Customer sign";
echo "</div>";
echo "<div class=cc>";
echo "Mobile no : <b>$rows[9]</b><br><br>";
echo "Document ID : <b>$rows[10]</b><br><br>";
echo "Items : <br><b>";
while($row=mysql_fetch_array($result)){
echo "         $row[0]  ($row[1])<br>";//
}
echo "</b><br><br>";
echo "Total gross wt : <b>$rows[12]</b><br><br>";
echo "Total Net wt : <b>$rows[14]</b><br><br>";
echo "Amount : <b>$rows[17]</b><br><br>";
echo "Interest : <b>14%</b><br><br><br><br><br><br><br>";
echo "Bank Manager sign";
echo "</div>";

echo "<div  class=bbb>";
echo "<h2>Lakshmi Narayana Finance(R)</h2>";
echo "Reg. DRN/NML/YMC/08/2017-18&nbsp;&nbsp;Siddapura. ph-no : 9449203611<br><br>";
echo "</div>";

$query1="SELECT item,remarks from document where documentid=$id"; // 
$result=mysql_query($query1)
or die(mysql_error());

echo "<div class=aaa>";
echo "Customer Name : <b>$rows[0]</b><br><br>";
echo "Cutomer ID : <b>$rows[1]</b><br><br>";
echo "Address : <textarea style='width: 300px; height: 50px;'>$rows[2] $rows[3] $rows[4] $rows[5] $rows[6] $rows[7] $rows[8]</textarea> <br><br>";
echo "Total pieces : <b>$rows[11]</b><br><br>";
echo "Total stone wt : <b>$rows[13]</b><br><br>";
echo "Scheme : <b>$rows[15]</b><br><br>";
echo "Duration : <b>$rows[16] to "; echo date('Y-m-d', strtotime($rows[16].' + 89 days')); echo "</b><br><br>";
echo "Processing fees : Rs. 20 <br><br><br><br><br><br>";
echo "Customer sign";
echo "</div>";
echo "<div class=ccc>";
echo "Mobile no : <b>$rows[9]</b><br><br>";
echo "Document ID : <b>$rows[10]</b><br><br>";
echo "Items : <br><b>";
while($row=mysql_fetch_array($result)){
echo "         $row[0]  ($row[1])<br>"; //
}
echo "</b><br><br>";
echo "Total gross wt : <b>$rows[12]</b><br><br>";
echo "Total Net wt : <b>$rows[14]</b><br><br>";
echo "Amount : <b>$rows[17]</b><br><br>";
echo "Interest : <b>14%</b><br><br><br><br><br><br><br>";
echo "Bank Manager sign";
echo "</div>";
echo "<input type='button' value='print' onclick='window.print();' />";
echo "</div>";
?>
</form>
</body>
</html>