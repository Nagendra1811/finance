function check()
{
	var datere=/[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}/i;
	var namere=/[a-z]+[ .]?[a-z]*/i;
	var addressre=/[#0-9a-z, ]+/i;
	var phonere=/[0-9]{6,10}/i;
	var emailre=/[a-z]+[_.a-z]*@[a-z]+([.][a-z]+)+/i;
	var passre=/.+/i;
	var dob=document.getElementById('dob');
	var doj=document.getElementById('doj');
	var n=document.getElementById('name');
	var a=document.getElementById('address');
	var p=document.getElementById('phone');
	var e=document.getElementById('email');
	var pass=document.getElementById('pass');
	//var f=document.forms[0];
	if(!namere.test(n.value.toString()))
	{
		window.alert('Please Enter valid Name');
		return false;
	}
	if(!datere.test(dob.value.toString()))
	{
		window.alert('Please Enter valid Date');
		return false;
	}
	if(!datere.test(doj.value.toString()))
	{
		window.alert('Please Enter valid Date');
		return false;
	}
	if(!addressre.test(a.value.toString()))
	{
		window.alert('Please Enter valid Address');
		return false;
	}
	if(!phonere.test(p.value.toString()))
	{
		window.alert('Please Enter valid Phone');
		return false;
	}
	if(!emailre.test(e.value.toString()))
	{
		window.alert('Please Enter valid Email');
		return false;
	}
	if(!passre.test(pass.value.toString()))
	{
		window.alert('Please enter password');
		return false;
	}
	return true;
}