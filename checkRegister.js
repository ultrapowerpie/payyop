function checkRegister() {
	var f1 = document.forms["register"]["username"].value;
	var f2 = document.forms["register"]["pass"].value;
	var e1 = document.forms["register"]["email"].value;
	
	if (isBlank(f1)) {
		alert ("Please enter your username");
		return false;
	}
	if(isBlank(f2)) {
		alert("Please enter your password");
		return false;
	}
	if (isBlank(e1)) {

		alert("Please enter your email address");
		return false;
	}
	if (isEmail(e1)) {
		return true;
	}
	else {
		alert("You have entered an invalid email address!")  
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

