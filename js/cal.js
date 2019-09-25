function myFunction() 
{
  var xval = document.getElementById("y-date").value;
  var x = new Date(xval).getFullYear();
  var y = new Date().getFullYear();
  var z = x - y ;
  if(isNaN(z))
  {	
     document.getElementById("age").value = "age";
  
     myage();	 
  }
  else 
  {
	 document.getElementById("age").value = -z;
	 myage();
  }
}

function myage()
{
   var agez = document.getElementById("age").value;
	if(agez < 18)
	{
		document.getElementById("val").innerHTML = "You Are not Enable in this criteria to fill this form! please valid the age between 18 ";
		
	}
	else
	{   
        document.getElementById("val").innerHTML = "Every Field is Required to fill!";
		myvalidage();
	}
}
function myvalidage(){
  var agev = document.getElementById("age").value;
  if (agev == "age")
  {
	document.getElementById("ageli").innerHTML = "Your age is not valid for this criteria";  
  }
  else
  {  
  document.getElementById("ageli").innerHTML = "your age is "+agev;}

}

function validateMobile()
{ 
  var pn = document.getElementById("input").value;  
  var regmm  = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
    var regmob = new RegExp(regmm);
    if(regmm.test(pn))
	{
       document.getElementById("d1").innerHTML="&#10004;"+"OK";
    } 
	else 
	{
       document.getElementById("d1").innerHTML="&#10060;"+"Required Valid Number";
    }    
}
function validateEmail()
{
	var pid = document.getElementById("Eval").value;
	var reg = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	var regr = new RegExp(reg);
	if(reg.test(pid))
	{
		document.getElementById("evar").innerHTML="&#10004;"+"OK";
	}
	else
	{
		document.getElementById("evar").innerHTML="&#10060;"+"Required Valid Email";
	}
}

var strength = {
  0: "Worst",
  1: "Bad",
  2: "Weak",
  3: "Good",
  4: "Strong"
}
var password = document.getElementById('password');
var meter = document.getElementById('password-strength-meter');
var text = document.getElementById('password-strength-text');

password.addEventListener('input', function() {
  var val = password.value;
  var result = zxcvbn(val);

  // Update the password strength meter
  meter.value = result.score;

  // Update the text indicator
  if (val !== "") {
    text.innerHTML = strength[result.score]; 
  } else {
    text.innerHTML = "Identify";
  }
});



	


