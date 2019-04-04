function check()
{
	var idre=/[0-9]+/i;
	var unit=document.getElementById('unit');
	//var f=document.forms[0];
	if(!idre.test(unit.value.toString()))
	{
		window.alert('Please Enter valid Units');
		return false;
	}
	return true;
}