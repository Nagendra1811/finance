<?php 
include "auth.php";
?>
<html>
<head>
<link href="assets/css/masterhead.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function check()
{
	var idre=/[0-9]+/i;
	var id=document.getElementById('count1');
	var id1=document.getElementById('grosswgt1');
	if(!idre.test(id.value.toString()))
	{
		window.alert('Enter Valid Count');
		return false;
	}
	if(!idre.test(id1.value.toString()))
	{
		window.alert('Enter Valid Gross weight');
		return false;
	}
}
</script>
</head>
<body>
<?php include("sqlconnect.php"); ?>
<a href="addItem.php" > Back to search </a>

<br/>
<br/>

<?php
$n=$_POST['name'];

$query="SELECT * from customer where customerid=$n "; 
$results=mysql_query($query)
or die(mysql_error());

if(mysql_num_rows($results)==0)
{
	echo "Invalid Customer-ID";
	echo "<br/>";
} 
else
{

$c=1;
$rows=mysql_fetch_array($results);

$q="SELECT * from scheme";
$resu=mysql_query($q);
$ro=mysql_fetch_array($resu);
//or die(mysql_error());

if($results)
{ 
echo"<h4> Add Inventory<h4>";
echo "<div class=stext align=center>";
echo "Customer-id <b>" ;
echo $_POST['name'];
echo "</b>";
echo "</div>";
echo "<br/>";
echo "<br/>";
echo "<form name=gen2 method=post  target=frame1 action='brentry.php' onsubmit='if( window.check ) { return check(); } return true;'>";

echo "<table width=100% border=0 cellspacing=5 cellpadding=5>";
echo "<tr>";
echo "<td align=left>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Name &nbsp;&nbsp;"; 
echo "<input name=id type=label value=$rows[1] width=20px readonly> ";
echo "</td>";
echo "<td align=center>";
echo '<img src= "data:image/jpeg;base64,'.base64_encode( $rows['photo'] ).'" name=photo width=100 height=150 />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo "</td>";
echo "</tr>";
echo "</table>";

echo "<table border=5 id='myTable'>";
echo "<tr><th>Select item</th><th>Count</th><th>Stoned item</th><th>Purity</th><th>Gross wgt</th><th>Stone wgt</th><th>Net wgt</th><th>Remarks</th></tr>";

echo "<tr>";
echo "<td><SELECT id='sel$c' name='sel[]' onchange= 'dis()'> <option>ANGLEWARE</option><option>BABY BANGLE</option><option>BANGLE</option><option>RING</option>
<option>BROAD BANGLE</option><option>CHAIN</option><option>DROPS</option><option>DROPS & STUD</option><option>EAR RINGS</option>
<option>LOCKET</option><option>MATTI</option><option>NECKLACE</option><option>STUD</option></select></td>";
echo "<td><input type='number' name='count[]' id='count$c' onchange= 'dis()'></td>";
echo "<td><input type='checkbox' name='stone[]' id='stone$c' value=1></td>";
echo "<td><SELECT id='purity$c' name='purity[]' onchange= 'dis()'> <option>Purity 916(22-ct)</option><option>Purity 87(21-ct)</option><option>Purity 82(20-ct)</option>
</select></td>";
echo "<td><input type='number' step='0.000001' name='grosswgt[]' id='grosswgt$c' onchange= 'dis()'></td>";
echo "<td><input type='number' step='0.000001' name='stwgt[]' id='stwgt$c' onchange= 'dis()'></td>";
echo "<td><input type='text' name='netwgt[]' id='netwgt$c' onchange= 'dis()' readonly></td>";
echo "<td><textarea name='remarks[]' id='remarks$c'></textarea></td>";
echo "</tr>";

echo "</table>";

echo "<br>";
echo "<button type='button' id='b1' onclick='displayResult()' >Add Item</button>&nbsp;&nbsp;";
echo "<button type='button' id='b2' onclick='deleteRow()' >Delete Item</button>&nbsp;&nbsp;&nbsp;&nbsp;";
//echo "<button type='button' id='b3' onclick='dis()' >Total</button>&nbsp;&nbsp;";
}

echo "<br><br>";
echo "<table border=5 id='myTable2'>";
echo "<tr><th>Item</th><th>Purity</th><th>Net wgt(Deducted)</th></tr>";

echo "<tr>";
echo "<td><input type='text' name='item[]' id='item$c' readonly></td>";
echo "<td><input type='text' name='pur[]' id='pur$c' readonly></td>";
echo "<td><input type='text' name='ded[]' id='ded$c' readonly></td>";
echo "</tr>";

echo "</table>";
echo "<br><br>";

echo "<br><br>";
echo "<table border=5 id='myTable1'>";
echo "<tr><th>Total pieces</th><th>Total Gross Wgt</th><th>Total Stone wgt</th><th>total Net wgt</th><th>Remarks</th></tr>";

echo "<tr>";
echo "<td><input type='text' name='totp' id='totp' readonly></td>";
echo "<td><input type='text' name='totgrosswgt' id='totgrosswgt' readonly></td>";
echo "<td><input type='text' name='totstwgt' id='totstwgt' readonly></td>";
echo "<td><input type='text' name='totnetwgt' id='totnetwgt' readonly></td>";
echo "<td><textarea name='totremarks' id='totremarks'></textarea></td>";
echo "</tr>";

echo "</table>";
echo "<br><br>";
echo "Select Scheme : <SELECT id='selScheme' name='selScheme' onchange='ch()'> <option>SR</option><option>PO</option><option>MB</option></select><br><br>";
echo "Gold rate per gram : <input type='text' id='gram' name='gram' value='".$ro['amount']."' readonly><br><br>";
echo "Total Amount: <input type='radio' name='tott' onclick='myFunction(totAmt1.value)' > <input type='text' id='totAmt1' name='totAmt1' readonly><br><br>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type='radio' name='tott' onclick='myFunction(totAmt2.value)'>
<input type='number' id='totAmt2' name='totAmt2' ><br><br>";
echo "Selected Total: <input type='text' id='totAmt' name='totAmt' readonly>";
echo "<br><br>";

echo "<table border=5 id='myTable3'>";
echo "<tr><th>Date</th><th>Duration</th><th>Interest (14%)</th><th>Loan Amount</th><th>Remarks</th></tr>";

echo "<tr>";
echo "<td>".date("Y-m-d")."</td>";
echo "<td><input type='text' name='duration' id='duration' value='90 days' readonly></td>";
echo "<td><input type='text' name='interest' id='interest' readonly></td>";
echo "<td><input type='text' name='loanAmt' id='loanAmt' style='font-size: 12pt' readonly></td>";
echo "<td><textarea name='loanremarks' id='loanremarks'></textarea></td>";
echo "</tr>";

echo "</table>";
echo "<br><br>";
echo "<input type = 'submit' value = 'Sanction Loan'>&nbsp;&nbsp;&nbsp;&nbsp;";
echo "<input type = 'reset' value = 'reset'>";
echo "<input type='hidden' name='custid' value='$n'>";
echo "<input type='hidden' name='counter' id='counter' >";
}
?>
<script>
var c = 2;
var t1=document.getElementById('myTable');
var t2=document.getElementById('myTable1');
var t3=document.getElementById('myTable2');
document.getElementById('counter').value = c;
function toggle(checkboxID, toggleID) {
  var checkbox = document.getElementById(checkboxID);
  var toggle = document.getElementById(toggleID);
  updateToggle = checkbox.checked ? toggle.disabled=false : toggle.disabled=true;
}


function myFunction(br) {
    document.getElementById("totAmt").value = br;
	ch();
}

function ch(){
var a = document.getElementById('selScheme').value;
<?php $q="SELECT * from scheme";
$resu=mysql_query($q);
while($ro=mysql_fetch_array($resu)){?>;
if(a == "<?php echo $ro[0]; ?>"){
document.getElementById('gram').value = <?php echo $ro[1]; ?>;
}
<?php } ?>;
document.getElementById('totAmt1').value = Number(document.getElementById('gram').value) * Number(document.getElementById('totnetwgt').value);
document.getElementById('interest').value = Number(document.getElementById('totAmt').value) * 0.14;
document.getElementById('loanAmt').value = Number(document.getElementById('totAmt').value) + (Number(document.getElementById('totAmt').value) * 0.14);
}

function dis(){
var a=b=d=e=0;
for (var i = 1; i < c; i++) {
document.getElementById('item'+i).value = document.getElementById('sel'+i).value;
document.getElementById('pur'+i).value = document.getElementById('purity'+i).value;
document.getElementById('netwgt'+i).value = Number(document.getElementById('grosswgt'+i).value) - Number(document.getElementById('stwgt'+i).value);
a+=Number(document.getElementById('count'+i).value);
b+=Number(document.getElementById('grosswgt'+i).value);
d+=Number(document.getElementById('stwgt'+i).value);
if(document.getElementById('purity'+i).value == "Purity 916(22-ct)"){
document.getElementById('ded'+i).value = Number(document.getElementById('netwgt'+i).value);
}
else if(document.getElementById('purity'+i).value == "Purity 87(21-ct)"){
document.getElementById('ded'+i).value = Number(document.getElementById('netwgt'+i).value) * 0.96;
}
else
{
document.getElementById('ded'+i).value = Number(document.getElementById('netwgt'+i).value) * 0.9;
}
e+= Number(document.getElementById('ded'+i).value);
}
document.getElementById('totp').value=a;
document.getElementById('totgrosswgt').value=b;
document.getElementById('totstwgt').value=d;
document.getElementById('totnetwgt').value=e;
ch();
document.getElementById('counter').value = c;
}

function deleteRow()
{
c--;
dis();
var table=document.getElementById("myTable");
var table1=document.getElementById("myTable2");
table.deleteRow(c);
table1.deleteRow(c);
}
function displayResult()
{
var table=document.getElementById("myTable");
var table1=document.getElementById("myTable2");
var row=table.insertRow(c);
var cell1=row.insertCell(0);
var cell2=row.insertCell(1);
var cell3=row.insertCell(2);
var cell4=row.insertCell(3);
var cell5=row.insertCell(4);
var cell6=row.insertCell(5);
var cell7=row.insertCell(6);
var cell8=row.insertCell(7);
cell1.innerHTML="<SELECT id='sel"+c+"' name='sel[]' onchange= 'dis()'> <option>ANGLEWARE</option><option>BABY BANGLE</option><option>BANGLE</option><option>BANGLE</option>"+
"+<option>BROAD BANGLE</option><option>CHAIN</option><option>DROPS</option><option>DROPS & STUD</option><option>EAR RINGS</option>"+
"<option>LOCKET</option><option>MATTI</option><option>NECKLACE</option><option>STUD</option></select>";
cell2.innerHTML="<input type='number' name='count[]' id='count"+c+"' onchange= 'dis()'>";
cell3.innerHTML="<input type='checkbox' name='stone[]' id='stone"+c+"' value=1>";
cell4.innerHTML="<SELECT id='purity"+c+"' name='purity[]' onchange= 'dis()'> <option>Purity 916(22-ct)</option><option>Purity 87(21-ct)</option><option>Purity 82(20-ct)</option>"+
"</select>";
cell5.innerHTML="<input type='number' step='0.000001' name='grosswgt[]' id='grosswgt"+c+"' onchange= 'dis()'>";
cell6.innerHTML="<input type='number' step='0.000001' name='stwgt[]' id='stwgt"+c+"'  onchange= 'dis()'>";
cell7.innerHTML="<input type='text' name='netwgt[]' id='netwgt"+c+"' onchange= 'dis()' readonly>";
cell8.innerHTML="<textarea name='remarks[]' id='remarks"+c+"'></textarea>";

var row1=table1.insertRow(c);
var ce1=row1.insertCell(0);
var ce2=row1.insertCell(1);
var ce3=row1.insertCell(2);
ce1.innerHTML="<input type='text' name='item[]' id='item"+c+"' readonly>";
ce2.innerHTML="<input type='text' name='pur[]' id='pur"+c+"' readonly>";
ce3.innerHTML="<input type='text' name='ded[]' id='ded"+c+"' readonly>";

c++;
document.getElementById('counter').value = c;
}
</script>
</form>
</body>
</html>