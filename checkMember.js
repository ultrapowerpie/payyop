function checkRequired() {
	var f1 = document.forms["new"]["fName"].value;
	var f2 = document.forms["new"]["lName"].value;
	var f3 = document.forms["new"]["Pass"].value;
	
	var e1 = document.forms["new"]["Email"].value;
	
	var bCount = 0;
	
	bCount += isBlank(f1);
	bCount += isBlank(f2);
	bCount += isBlank(f3);
	
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

