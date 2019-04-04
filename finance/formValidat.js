/*function restrict(obj,rex,opt) 
{
      var re = new RegExp(rex,opt);
      var chr = obj.value.substr(obj.value.length - 1);

      if(!re.test(chr)) 
      {
            var reChr = new RegExp(chr,opt);

            obj.value = obj.value.replace(reChr,'');
      }
}*/
function check()
{
	var datere=/[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}/i;
	var namere=/[a-z]+/i;
	var addressre=/[#0-9a-z, ]+/i;
	var phonere=/[0-9]{6,10}/i;
	var emailre=/[a-z]+[_.a-z]*@[a-z]+([.][a-z]+)+/i;
	var d=document.getElementById('dob');
	var n=document.getElementById('name');
	var sdw=document.getElementById('sdw');
	var a=document.getElementById('address');
	var p=document.getElementById('phone');
	var e=document.getElementById('email');
	//var f=document.forms[0];
	if(!namere.test(n.value.toString()))
	{
		window.alert('Invalid Father/Husband Name');
		return false;
	}
	if(!namere.test(sdw.value.toString()))
	{
		window.alert('Invalid Father/Husband Name');
		return false;
	}
	if(!datere.test(d.value.toString()))
	{
		window.alert('Invalid Date');
		return false;
	}
	if(!addressre.test(a.value.toString()))
	{
		window.alert('Invalid Address');
		return false;
	}
	if(!phonere.test(p.value.toString()))
	{
		window.alert('Invalid Phone');
		return false;
	}
	if(!emailre.test(e.value.toString()))
	{
		window.alert('Invalid Email');
		return false;
	}
	return true;
}