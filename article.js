// JavaScript for aritcles
var ARROW_KEY_TIPS = "kal;djahgjaskhfksljfksal;djk;as";

function externallinks() {  
 if (!document.getElementsByTagName) return; 
 var anchors = document.getElementsByTagName("a"); 
 for (var i=0; i<anchors.length; i++) { 
   var anchor = anchors[i]; 
   if (anchor.getAttribute("href") && 
       anchor.getAttribute("rel") == "external") {
     anchor.target = "_blank"; 
   }
 } 
}

function constructEmail() {
	if (!document.getElementById) return;
	var anchor = document.getElementById("contact");
	anchor.href = "mailto" + ":purplexsu" + "@gmai" + "l.com";
}

function arrowKeyTips() {
/*
  var q = document.createElement("div");
	q.appendChild(document.createTextNode("?"));
	q.className = "question_mark";
	document.body.appendChild(q);
	var tips = document.createElement("div");
	tips.appendChild(document.createTextNode(ARROW_KEY_TIPS));
	tips.className = "arrow_key_tips";
	tips.style.display = "none";
	document.body.appendChild(tips);
	function showArrowKeyTips () {
		alert("show!");
		tips.style.display = "block";
	}
	function hideArrowKeyTips () {
		alert("hide");
		tips.style.display = "none";
	}
	q.addEventListener("mousedown", showArrowKeyTips, false);
	q.onmouseover = showArrowKeyTips;
	q.onmouseout = hideArrowKeyTips;
	*/
}

function pageCompleted() {
	externallinks();
	constructEmail();
	enableArrowKey();
	arrowKeyTips();
}

window.onload = pageCompleted;
