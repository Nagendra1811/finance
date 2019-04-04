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
top : 20;
}
div.ppp{
position : relative;
left : 350;
top : 20
}
div.bbb{
position : relative;
left : 250;
top : 20;
}

div.t{
position : relative;
left : 500;
top : 40;
}
div.tt{
position : relative;
left : 500;
top : 40;
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
$name=$_POST['name'];
$amt=$_POST['ea'];
$ch=$_POST['ch'];
$tot=$_POST['tot'];
$dreg = date("Y-m-d");
if(isset($_POST['glc'])) 
{  
$head = "Gold loan charges";
$que="update report set ca=ca+$tot, glc=glc+$tot where slno=1 "; 
$resu=mysql_query($que)
or die(mysql_error());
$qu="insert into statement(slno,date,particular,debit,credit,balance) select 'null','$dreg','Gold loan charges','','$tot',ca from report where slno=1";
$rrr=mysql_query($qu)
or die(mysql_error());
}
else if(isset($_POST['bil'])) 
{  
$head = "Billings";
$que="update report set ca=ca-$tot, bil=bil+$tot where slno=1 "; 
$resu=mysql_query($que)
or die(mysql_error());
$qu="insert into statement(slno,date,particular,debit,credit,balance) select 'null','$dreg','Billings','$tot','',ca from report where slno=1";
$rrr=mysql_query($qu)
or die(mysql_error());
}
else if(isset($_POST['exp'])) 
{  
$head = "Expenses";
$que="update report set ca=ca-$tot, exp=exp+$tot where slno=1 "; 
$resu=mysql_query($que)
or die(mysql_error());
$qu="insert into statement(slno,date,particular,debit,credit,balance) select 'null','$dreg','Expenses','$tot','',ca from report where slno=1";
$rrr=mysql_query($qu)
or die(mysql_error());
}
else if(isset($_POST['pan'])) 
{  
$head = "Pancard";
$que="update report set ca=ca+$tot, pan=pan+$tot where slno=1 "; 
$resu=mysql_query($que)
or die(mysql_error());
$qu="insert into statement(slno,date,particular,debit,credit,balance) select 'null','$dreg','Pancard','','$tot',ca from report where slno=1";
$rrr=mysql_query($qu)
or die(mysql_error());
}
else if(isset($_POST['pig'])) 
{  
$head = "Pigmi";
$que="update report set ca=ca+$tot, pig=pig+$tot where slno=1 "; 
$resu=mysql_query($que)
or die(mysql_error());
$qu="insert into statement(slno,date,particular,debit,credit,balance) select 'null','$dreg','Pigmi','','$tot',ca from report where slno=1";
$rrr=mysql_query($qu)
or die(mysql_error());
}
else if(isset($_POST['mt'])) 
{  
$head = "Money Transfer";
$que="update report set ca=ca+$tot, mt=mt+$tot where slno=1 "; 
$resu=mysql_query($que)
or die(mysql_error());
$qu="insert into statement(slno,date,particular,debit,credit,balance) select 'null','$dreg','Money transfer','','$tot',ca from report where slno=1";
$rrr=mysql_query($qu)
or die(mysql_error());
}
else if(isset($_POST['insurence'])) 
{  
$head = "Insurence";
$que="update report set ca=ca+$tot, insurence=insurence+$tot where slno=1 "; 
$resu=mysql_query($que)
or die(mysql_error());
$qu="insert into statement(slno,date,particular,debit,credit,balance) select 'null','$dreg','Insurence','','$tot',ca from report where slno=1";
$rrr=mysql_query($qu)
or die(mysql_error());
}

echo "<div id='divToPrint'>";

echo "<div  class=bb>";
echo "<h2>Lakshmi Narayana Finance(R)</h2>";
echo "Reg. DRN/NML/YMC/08/2017-18&nbsp;&nbsp;Siddapura. ph-no : 9449203611<br>";

echo "</div>";
echo "<div  class=t>";
echo "<b>Date : </b>"; print (date("d-m-Y h:i:sa"));
echo "</div>";


echo "<div class=pp>";
echo "<br>";
echo $head;
echo "<br><h4>Recepit</h4><br><br>";
echo "Name : <b>$name</b><br><br>";
echo "Amount : <b>$amt</b><br><br>";
echo "charges : <b>$ch</b><br><br>";
echo "Total : <b>$tot</b><br><br>";
echo "</div>";

echo "<div  class=bbb>";
echo "<h2>Lakshmi Narayana Finance(R)</h2>";
echo "Reg. DRN/NML/YMC/08/2017-18&nbsp;&nbsp;Siddapura. ph-no : 9449203611<br>";
echo "</div>";

echo "<div  class=tt>";
echo "<b>Date : </b>"; print (date("d-m-Y h:i:sa"));
echo "</div>";

echo "<div class=ppp>";
echo "<br>";
echo $head;
echo "<br><h4>Recepit</h4><br><br>";
echo "Name : <b>$name</b><br><br>";
echo "Amount : <b>$amt</b><br><br>";
echo "charges : <b>$ch</b><br><br>";
echo "Total : <b>$tot</b><br><br>";
echo "</div>";


echo "<input type='button' value='print' onclick='window.print();' />";
echo "</div>";
?>
</form>
</body>
</html>