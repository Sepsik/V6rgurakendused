
var beads = document.getElementsByClassName("bead");

window.onload = function() {
	for (var i = 0; i < beads.length; i++) {
		var obj = beads[i];
        style = window.getComputedStyle(obj),
    	asukoht = style.getPropertyValue("float");

    	if (asukoht == "left"){
    		obj.style.cssFloat = "right";
    	}
    	else {
    		obj.style.cssFloat = "left";
    	}

	}

}