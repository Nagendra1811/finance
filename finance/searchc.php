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

$id= $_POST['cid'];
$query="SELECT * from customer where customerid=$id "; 
$results=mysql_query($query)
or die(mysql_error());

if(mysql_num_rows($results)==0)
{
	echo "Invalid Customer-ID";
	echo "<br/>";
} 
else
{
echo "<div class=stext align=center>";
echo "Details of the Customer having Customer-ID <b>" ;
echo $_POST['cid'];
echo "</b>";
echo "</div>";
echo "<br/>";
echo "<br/>";



$rows=mysql_fetch_array($results);
//$row=mysql_fetch_row($results);


if($results)
{ 
/*
echo "<form name=gen22 method=post action=c.php target=frame1> ";
echo "<input type=submit value='Add Item' name=add > ";
echo "</form>";
echo"<br />";
echo"<br />";
echo"<br />";
*/

echo "<form name=gen2 method=post action=cupdate.php target=frame1> ";

echo "<a download='photo_$id.jpeg' href='photo.php?id=$id&p=photo' title='ImageName' target='_blank'>";
echo '<img src= "data:image/jpeg;base64,'.base64_encode( $rows['photo'] ).'" name=photo width=100 height=150 ></a>&nbsp;&nbsp;&nbsp;&nbsp;';
echo "<a download='id_$id.jpeg' href='photo.php?id=$id&p=idproof' title='ImageName' target='_blank'>";
echo '<img src= "data:image/jpeg;base64,'.base64_encode( $rows['idproof'] ).'" name=filepr width=150 height=150 ></a>';

echo "<table width=100% border=0 cellspacing=5 cellpadding=5>";
echo "<tr>";
echo "<td width=35% align=left>";
echo "Customer-ID"; 
echo "</td>";
echo "<td width=65%>"; 
echo "<input name=id type='text' value='$rows[0]' width=20px readonly> ";
echo "</td>";
echo "</tr>";


echo "<tr>";
echo "<td width=35% align=left>";
echo "Name"; 
echo "</td>";
echo "<td width=65%>"; 
echo "<input name=name type='text' value='$rows[1]' width=20px> ";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td width=35% align=left>";
echo "Gender"; 
echo "</td>";
echo "<td width=65%>"; 
echo "<input name=gender type='text' value='$rows[2]' width=20px> ";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td width=35% align=left>";
echo "DOB"; 
echo "</td>";
echo "<td width=65%>"; 
echo "<input name=dob type='text' value='$rows[3]' width=20px> ";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td width=35% align=left>";
echo "S/O D/O W/O"; 
echo "</td>";
echo "<td width=65%>"; 
echo "<input name=sdw type='text' value='$rows[4]' width=20px> ";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td width=35% align=left>";
echo "House/Appartment no"; 
echo "</td>";
echo "<td width=65%>"; 
echo "<input name=hno type='text' value='$rows[5]' width=20px> ";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td width=35% align=left>";
echo "Location / Land mark"; 
echo "</td>";
echo "<td width=65%>"; 
echo "<input name=loc type='text' value='$rows[6]' width=20px> ";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td width=35% align=left>";
echo "post"; 
echo "</td>";
echo "<td width=65%>"; 
echo "<input name=post type='text' value='$rows[7]' width=20px> ";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td width=35% align=left>";
echo "District"; 
echo "</td>";
echo "<td width=65%>"; 
echo "<input name=dis type='text' value='$rows[8]' width=20px> ";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td width=35% align=left>";
echo "State"; 
echo "</td>";
echo "<td width=65%>"; 
echo "<input name=state type='text' value='$rows[9]' width=20px> ";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td width=35% align=left>";
echo "Pincode"; 
echo "</td>";
echo "<td width=65%>"; 
echo "<input name=pin type='text' value='$rows[10]' width=20px> ";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td width=35% align=left>";
echo "Country"; 
echo "</td>";
echo "<td width=65%>"; 
echo "<input name=country type='text' value='$rows[11]' width=20px> ";
echo "</td>";
echo "</tr>";


echo "<tr>";
echo "<td width=35% align=left>";
echo "Phone Number"; 
echo "</td>";
echo "<td width=65%>"; 
echo "<input name=phone type='text' value='$rows[12]' maxlength=10 width=20px > ";
echo "</td>";
echo "</tr>";


echo "<tr>";
echo "<td width=35% align=left>";
echo "Alternate Number"; 
echo "</td>";
echo "<td width=65%>"; 
echo "<input name=alt type='text' value='$rows[13]' width=20px > ";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td width=35% align=left>";
echo "Mobile"; 
echo "</td>";
echo "<td width=65%>"; 
echo "<input name=mob type='text' value='$rows[14]' width=20px > ";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td width=35% align=left>";
echo "ID proof"; 
echo "</td>";
echo "<td width=65%>"; 
echo "<input name=idproof type='text' value='$rows[15]' width=20px > ";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td width=35% align=left>";
echo "ID number"; 
echo "</td>";
echo "<td width=65%>"; 
echo "<input name=idnumber type='text' value='$rows[19]' width=20px > ";
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td width=35% align=left>";
echo "Date of Registration"; 
echo "</td>";
echo "<td width=65%>"; 
echo "<input name=dreg type='text' value='$rows[18]' width=20px readonly> ";
echo "</td>";
echo "</tr>";


echo "<tr>";
echo "<td width=35% align=right>";
//echo " <input type=submit value=Delete name=delete > ";
echo "</td>";
echo "<td width=65%>"; 
echo " <input type=submit value=Update name=submit > ";
echo "</td>";
echo "</tr>";

echo "</table>";
echo "</form>";
}
}

?>

</body>
</html>