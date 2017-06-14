
var outter;
var innner;
var speed = 20;

function marquee(id){
	outter = document.getElementById(id);
	outter.removeAttribute("class");
	inner = document.createElement("div");
	inner.setAttribute("class", "highslide-gallery");
	inner.innerHTML = outter.innerHTML + outter.innerHTML;
	outter.innerHTML = "";
	outter.appendChild(inner);
	var MyMar=setInterval(roll,speed);
	outter.onmouseover=function() {clearInterval(MyMar)};//鼠标移上时清除定时器达到滚动停止的目的
	outter.onmouseout=function() {MyMar=setInterval(roll,speed)};//鼠标移开时重设定时器
}

function roll(){
	
	if(inner.offsetHeight/2 < outter.scrollTop)
		outter.scrollTop -= inner.offsetHeight/2;
	else{
		outter.scrollTop++;
	}
}

window.onload = function () {
 marquee("gallery");
}



/***********************************************
* Cross browser Marquee II-  Dynamic Drive (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
***********************************************/
/*
var delayb4scroll=2000 //Specify initial delay before marquee starts to scroll on page (2000=2 seconds)
var marqueespeed=2 //Specify marquee scroll speed (larger is faster 1-10)
var pauseit=1 //Pause marquee onMousever (0=no. 1=yes)?

////NO NEED TO EDIT BELOW THIS LINE////////////

var copyspeed=marqueespeed
var pausespeed=(pauseit==0)? copyspeed: 0
var actualheight=''

function scrollmarquee(){
if (parseInt(cross_marquee.style.top)>(actualheight*(-1)+8))
cross_marquee.style.top=parseInt(cross_marquee.style.top)-copyspeed+"px"
else
cross_marquee.style.top=parseInt(marqueeheight)+8+"px"
}

function initializemarquee(){
cross_marquee=document.getElementById("vmarquee")
cross_marquee.style.top=0
marqueeheight=document.getElementById("marqueecontainer").offsetHeight
actualheight=cross_marquee.offsetHeight
if (window.opera || navigator.userAgent.indexOf("Netscape/7")!=-1){ //if Opera or Netscape 7x, add scrollbars to scroll and exit
cross_marquee.style.height=marqueeheight+"px"
cross_marquee.style.overflow="scroll"
return
}
setTimeout('lefttime=setInterval("scrollmarquee()",30)', delayb4scroll)
}

if (window.addEventListener)
window.addEventListener("load", initializemarquee, false)
else if (window.attachEvent)
window.attachEvent("onload", initializemarquee)
else if (document.getElementById)
window.onload=initializemarquee
*/