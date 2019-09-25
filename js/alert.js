var e = "Good Night";
var d = "Good Evening!";
var c = "Good Afternoon!";
var b = "Have A Nice Day!";
var a = "Good Morning!";
var time = new Date().getHours();

if (time<8)
{
document.getElementById("greating").innerHTML = a;

}
else if (time<12)
{
document.getElementById("greating").innerHTML = b;

}
else if (time<13) 
{
document.getElementById("greating").innerHTML = c;	
}
else if(time<14)
{
document.getElementById("greating").innerHTML = d;
}
else if(time<20)
{
document.getElementById("greating").innerHTML = e;
}
else
{
document.getElementById("greating").innerHTML = e;
}
  
