function check()
{
	var rre=/[a-z]+/i;
	var unit=document.getElementById('reason');
	//var f=document.forms[0];
	if(!rre.test(unit.value.toString()))
	{
		window.alert('Please Enter valid Reason');
		return false;
	}
	return true;
}