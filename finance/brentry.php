<?php 
include "auth.php";
?>
<head>
<link href="assets/css/masterhead.css" rel="stylesheet" type="text/css">
</head>

<?php include("sqlconnect.php"); ?>
<?php
$c = $_POST['counter']-1;
$n = $_POST['custid'];
$tot = $_POST['totp'];
$dreg = date("Y-m-d");
$ca=$_POST['totAmt'];
$totremarks=$_POST['totremarks'];
$totremarks=str_replace(PHP_EOL, ' ', $totremarks);
$loanremarks=$_POST['loanremarks'];
$loanremarks=str_replace(PHP_EOL, ' ', $loanremarks);
$query="insert into docmap values(null,$n,'".$_POST['totp']."','".$_POST['totgrosswgt']."','".$_POST['totstwgt']."','".$_POST['totnetwgt']."',
'$totremarks','".$_POST['selScheme']."','".$_POST['gram']."','".$_POST['totAmt']."','$dreg','".$_POST['duration']."',
'".$_POST['interest']."','".$_POST['loanAmt']."','$loanremarks','".$_POST['totAmt']."','$dreg')";
$r=mysql_query($query);
if(!$r)
die(mysql_error());
else
{
echo "<br/> <br/> <div align=center> Congratulations! Loan is Sanctioned for Customer ID :<b> $n</b></div>" ;

echo "<form name=gen2 method=post  target=frame1 action='print.php'>";

$query2="Select docid from docmap where custid=$n and date='$dreg' and totcount=$tot and totamt='$ca'";
$res=mysql_query($query2)
or
die(mysql_error());
echo "<br/> <br/> <div align=center> ";
echo " Document ID : <b>";
$rows=mysql_fetch_array($res);
 echo $rows[0];
echo "</b>";
//echo " <br/> <br/> <a href=\"addbranch.php\" style=\"text-decoration:none \" > Back to Branch Addition </a> ";
echo "</div>";
$l = 0;
while($l < $c){
$remarks=$_POST['remarks'][$l];
$remarks=str_replace(PHP_EOL, ' ', $remarks);
$query3="insert into document values($rows[0],'".$_POST['sel'][$l]."','".$_POST['count'][$l]."','".$_POST['stone'][$l]."','".$_POST['purity'][$l]."',
'".$_POST['grosswgt'][$l]."','".$_POST['stwgt'][$l]."','".$_POST['netwgt'][$l]."','$remarks','".$_POST['ded'][$l]."')";
$r1=mysql_query($query3);
if(!$r1)
die(mysql_error());
$l++;
}
echo "<div class=stext align=right><input type = 'submit' value = 'print'>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;</div>";
echo "<input type=hidden name='dcid' value=$rows[0]>";
echo "</form>";
}

$que="update report set ca=ca-$ca, gl=gl+$ca where slno=1 "; 
$resu=mysql_query($que)
or die(mysql_error());
$qu="insert into statement(slno,date,particular,debit,credit,balance) select 'null','$dreg','Gold loan sanctioned','$ca','',ca from report where slno=1";
$rrr=mysql_query($qu)
or die(mysql_error());

?>