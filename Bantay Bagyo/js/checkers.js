function validatePassword(){
	var pass1=document.getElementById("password1");
	var pass2=document.getElementById("password2");
	if(pass1.value.length<6){
		pass1.setCustomValidity("Password must be at least 6 characters");
		pass2.setCustomValidity("Password must be at least 6 characters");
	} else{
	    pass1.setCustomValidity(''); 
	    pass2.setCustomValidity(''); 
	}
	
	if(pass1.value.length>=6 && pass1.value!=pass2.value)
	    pass2.setCustomValidity("Passwords Don't Match");
	//empty string means no validation error
	else if(pass1.value.length>=6 && pass1.value==pass2.value) {
	    pass2.setCustomValidity(''); 
	}
}