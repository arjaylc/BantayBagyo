function validatePassword(){
	var pass1=document.getElementById("password1").value;
	var pass2=document.getElementById("password2").value;
	if(pass1.length<6){
		document.getElementById("password1").setCustomValidity("Password must be at least 6 characters");
		document.getElementById("password2").setCustomValidity("Password must be at least 6 characters");
	} else{
	    document.getElementById("password1").setCustomValidity(''); 
	    document.getElementById("password2").setCustomValidity(''); 
	}
	
	if(pass1.length>=6 && pass1!=pass2)
	    document.getElementById("password2").setCustomValidity("Passwords Don't Match");
	//empty string means no validation error
	else if(pass1.length>=6 && pass1==pass2) {
	    document.getElementById("password2").setCustomValidity(''); 
	}
}