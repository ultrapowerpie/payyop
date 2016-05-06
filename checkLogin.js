function checkLogin() {
	var f1 = document.forms["login"]["username"].value;	
	var f2 = document.forms["login"]["pass"].value;

	if (isBlank(f1)) {
		alert ("Please enter your username");
		return false;
	}
	if(isBlank(f2)) {
		alert("Please enter your password");
		return false;
	}
	return true;
}

function isBlank(field) {
	if (field == null || field == "") {
		return 1;
	}
	return 0;
}