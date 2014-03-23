function toggleOverlay(mode){
	var overlay = document.getElementById('overlay');
	var registerBox = document.getElementById('register-overlay');
	var loginBox = document.getElementById('login-overlay');
	if(mode==0){
		overlay.style.display="none";
		registerBox.style.display = "none";
		loginBox.style.display = "none";
	}
	else{
		if(mode==1)
			var specialBox = registerBox;
		else if(mode==2)
			specialBox = loginBox;
		overlay.style.opacity = .8;
		if(overlay.style.display == "block"){
			overlay.style.display = "none";
			specialBox.style.display = "none";
		} else {
			overlay.style.display = "block";
			specialBox.style.display = "block";
		}
	}
}
function showDropdown(){
	var overlay = document.getElementById('overlay-options');
	var dropdownOptions = document.getElementById('dropdown-options');
	var optionsButton = document.getElementById('optionsbutton');
	overlay.style.opacity = 0;
	if(dropdownOptions.style.display=="block"||overlay.style.display=="block"){
		overlay.style.display = "none";
		dropdownOptions.style.display = "none";
	} else {
		overlay.style.display = "block";
		dropdownOptions.style.display="block";
	}
	optionsButton.style.background = "#222";

}