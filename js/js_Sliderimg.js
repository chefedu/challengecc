

function onReady(callback) {
  var intervalId = window.setInterval(function() {
    if (document.getElementsByTagName('body')[0] !== undefined) {
      window.clearInterval(intervalId);
      callback.call(this);
    }
  }, 9000);
}
onReady(function() {
  
  document.getElementById("ui").style.display = "none";
  document.getElementById("myDiv").style.display ="block";
    document.getElementById("li").style.overflow ="visible";
	document.getElementById("li").style.display="flow-root";
	document.getElementById("li").style.height ="0vh";
});