<?php 
include "auth.php";
?>
<html>
<head>
<link href="assets/css/masterhead.css" rel="stylesheet" type="text/css">
<script type="text/javascript"> //src="formValidat.js">
function check()
{
	var datere=/[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}/i;
	var namere=/[a-z]+/i;
	var idre=/[0-9]/i;
	var housere=/[0-9]/i;
	var addressre=/[a-z, ]+/i;
	var phonere=/[0-9]{10}/i;
	var pinre=/[0-9]{6}/i;
	//var emailre=/[a-z]+[_.a-z]*@[a-z]+([.][a-z]+)+/i;
	var d=document.getElementById('dob');
	var n=document.getElementById('name');
	var sdw=document.getElementById('sdw');
	var h=document.getElementById('house');
	var a=document.getElementById('address');
	var p=document.getElementById('phone');
	var po=document.getElementById('post');
	var dis=document.getElementById('district');
	var st=document.getElementById('state');
	var pin=document.getElementById('pin');
	var c=document.getElementById('country');
	var idnum=document.getElementById('idnum');
	//var f=document.forms[0];
	if(!namere.test(n.value.toString()))
	{
		window.alert('Invalid Name');
		return false;
	}
	if(!datere.test(d.value.toString()))
	{
		window.alert('Invalid Date');
		return false;
	}
	if(!namere.test(sdw.value.toString()))
	{
		window.alert('Invalid Father/Husband Name');
		return false;
	}
	if(!housere.test(h.value.toString()))
	{
		window.alert('Invalid house no');
		return false;
	}
	if(!addressre.test(a.value.toString()))
	{
		window.alert('Invalid Location');
		return false;
	}
	
	if(!addressre.test(po.value.toString()))
	{
		window.alert('Invalid Post');
		return false;
	}
	if(!addressre.test(dis.value.toString()))
	{
		window.alert('Invalid District');
		return false;
	}
	if(!addressre.test(st.value.toString()))
	{
		window.alert('Invalid State');
		return false;
	}
	if(!pinre.test(pin.value.toString()))
	{
		window.alert('Invalid Pincode');
		return false;
	}
	if(!addressre.test(c.value.toString()))
	{
		window.alert('Invalid Country');
		return false;
	}
	
	if(!phonere.test(p.value.toString()))
	{
		window.alert('Invalid Phone');
		return false;
	}
	if(!idre.test(idnum.value.toString()))
	{
		window.alert('Please Enter ID number');
		return false;
	}
	return true;
}
var _validFileExtensions = [".jpg", ".jpeg", ".png"];    
function ValidateSingleInput(oInput) {
    if (oInput.type == "file") {
        var sFileName = oInput.value;
         if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }
             
            if (!blnValid) {
                alert("Sorry, It is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                oInput.value = "";
                return false;
            }
        }
    }
    return true;
}
</script>
</head>
<body bgcolor=#746f6f >
<table border=0 width=100%> 
<tr>
<td width=70%>
<div class="cust"> <b> Enter Customer Information </b> </div>
<div>
	<br/>
   <form id="addcust" method=post enctype="multipart/form-data" action="cusentry.php" onsubmit="if( window.check ) { return check(); } return true;">
   <table width=100% border=0 cellspacing=5 cellpadding=5>
   <tr>
   <td width=35%>
    Name
   </td>
   <td width=65%>
       <input name="name" type="text" id="name" width=20px /> 
    </td>   
   </tr>
   <tr>
   <td width=35%>
    Gender
   </td>
   <td width=65%>
       <SELECT id="gender" name='gender' >
<option>MALE</option>
<option>FEMALE</option>
</select>
    </td>   
    </tr>
	
	<tr>
   <td width=35%>
    Date of Birth
   </td>
   <td width=65%>
	<div>  <input name="dob" type="text" id="dob" width=20px/> &nbsp;Year-Month-Date </div>
    </td>    
    </tr>
	
   <tr>
   <td width=35%>
    S/O D/O W/O
   </td>
   <td width=65%>
       <input name="sdw" type="text" id="sdw" width=20px /> 
    </td>   
   </tr>
   
   <tr>
   <td width=35%>
    House/Appartment no
   </td>
   <td width=65%>
       <input name="house" type="text" id="house" width=20px /> 
    </td>   
   </tr>
  
  <tr>
   <td width=35%>
    Location / Land mark
   </td>
   <td width=65%>
       <input name="address" type="text" id="address" width=20px /> 
    </td>   
   </tr>
   
   <tr>
   <td width=35%>
    post
   </td>
   <td width=65%>
       <input name="post" type="text" id="post" width=20px /> 
    </td>   
   </tr>
   
   <tr>
   <td width=35%>
    District
   </td>
   <td width=65%>
       <input name="district" type="text" id="district" width=20px /> 
    </td>   
   </tr>
   
   <tr>
   <td width=35%>
    State
   </td>
   <td width=65%>
       <input name="state" type="text" id="state" width=20px /> 
    </td>   
   </tr>
  
  <tr>
   <td width=35%>
    Pincode
   </td>
   <td width=65%>
       <input name="pin" type="text" id="pin" width=20px /> 
    </td>   
   </tr>
   
   <tr>
   <td width=35%>
    Country
   </td>
   <td width=65%>
       <input name="country" type="text" id="country" width=20px /> 
    </td>   
   </tr>

   <tr>
   <td width=35%>
    Phone Number
   </td>
   <td width=65%>
       <input name="phone" type="number" id="phone" maxlength=10 width=20px/>
    </td>   
    </tr>
   <tr>
   <td width=35%>
    Alternate Number
   </td>
   <td width=65%>
       <input name="Al" type="number" id="Al" />
    </td>   
    </tr>
	
	<tr>
   <td width=35%>
    Mobile Number
   </td>
   <td width=65%>
       <input name="mob" type="number" id="mob" />
    </td>   
    </tr>
	
	<tr>
   <td width=35%>
    ID proof :
   </td>
   <td width=65%>
       <SELECT id="proof" name='proof' >
<option>Voter Id</option>
<option>DL</option>
<option>Aadhar card</option>
<option>Pancard</option>
<option>Passport</option>
</select>
<input type="file" name="filepr" id="filepr" onchange="ValidateSingleInput(this);" required>
    </td>   
    </tr>
	<tr>
   <td width=35%>
    ID Number
   </td>
   <td width=65%>
       <input name="idnum" type="text" id="idnum" />
    </td>   
    </tr>
	<tr>
   <td width=35%>
    Photo :
   </td>
   <td width=65%>
<input type="file" name="photo" id="photo" onchange="ValidateSingleInput(this);" required>
    </td>   
    </tr>
	
   <tr>
<td align=right>
<br>
<input type="submit" name="submit" value="Save Record" >  
</td>
<td align=left>
<br>
<input type="reset" name="reset" value="Clear Fields" >  
</td>
</tr>
</table>

    </form>
</div>        
</td>


<td align=center width=30%>


</td>
</tr>
</table>
</body>
</html>

