function checkRequired() {
	var f1 = document.forms["autologin"]["eName"].value;
	var f2 = document.forms["autologin"]["Origin"].value;
	var f3 = document.forms["autologin"]["Destination"].value;
	var f4 = document.forms["autologin"]["dDate"].value;
	var f5 = document.forms["autologin"]["dTime"].value;
	
	var e1 = document.forms["autologin"]["Email"].value;
	
	var bCount = 0;
	
	bCount += isBlank(f1);
	bCount += isBlank(f2);
	bCount += isBlank(f3);
	bCount += isBlank(f4);
	bCount += isBlank(f5);
	
	if (bCount == 0) {
		if (isEmail(e1) == 0) {
			return (true);
		}
		else {
			alert("You have entered an invalid email address!")  
			return false;
		}
	}
	else {
		alert("You left "+ bCount + " fields blank!") 
		return false;       
	}       
}

function isBlank(field) {
    if (field == null || field == "") {
        return 1;
    }
	return 0;
}

//  regular expresssion from:
//  http://www.w3resource.com/javascript/form/email-validation.php
function isEmail(emailAdd) {
	
	var filter = /^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
	
    if (String(emailAdd).search (filter) != -1) {
    	return 0;  
    }   
    else return 1;  	
}

