function check()
{
	var namere=/[a-z]+[ .]?[a-z]*/i;
	var addressre=/[#0-9a-z, ]+/i;
	var phonere=/[0-9]{6,10}/i;
	var emailre=/[a-z]+[_.a-z]*@[a-z]+([.][a-z]+)+/i;
	var n=document.getElementById('name');
	var a=document.getElementById('address');
	var p=document.getElementById('phone');
	var e=document.getElementById('email');
	//var f=document.forms[0];
	if(!namere.test(n.value.toString()))
	{
		window.alert('Please Enter valid Name');
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
	return true;
}