function toggleOverlay(mode){
	var overlay = document.getElementById('overlay');
	var registerBox = document.getElementById('register-overlay');
	var loginBox = document.getElementById('login-overlay');
	var registerButton =document.getElementById('registerbutton');
	var loginButton =document.getElementById('loginbutton');
	var specialBox, button;
	overlay.style.opacity = .8;
	if(mode==0){
		overlay.style.display="none";
		registerBox.style.display = "none";
		loginBox.style.display = "none";
	}
	else{
		if(mode==1){
			specialBox = registerBox;
			button = registerButton;
		}
		else if(mode==2){
			specialBox = loginBox;
			button = loginButton;
		}
		if(overlay.style.display == "block"){
			overlay.style.display = "none";
			specialBox.style.display = "none";
			button.style.zIndex = "2";
		} else {
			button.style.zIndex = "7";
			overlay.style.display = "block";
			specialBox.style.display = "block";
		}
	}
}
function toggleProvince(){
	var specialBox = document.getElementById('province-overlay');
	var button = document.getElementById('addProvinceButton');
	var num = getTop(button);
	specialBox.style.top = (num+20)+"px";
	if(specialBox.style.display == "block"){
		specialBox.style.display = "none";
	} else {
		specialBox.style.display = "block";
	}
}
function toggleMainProvince(){
	var specialBox = document.getElementById('main-province-overlay');
	var button = document.getElementById('changeProvinceButton');
	var num = getTop(button);
	specialBox.style.top = (num+20)+"px";
	if(specialBox.style.display == "block"){
		specialBox.style.display = "none";
	} else {
		specialBox.style.display = "block";
	}
}
function toggleSettings(mode){
	var passwordBox = document.getElementById('password-overlay');
	var overlay_options = document.getElementById('overlay-options');
	var dropdown_options = document.getElementById('dropdown-options');
	var overlay = document.getElementById('overlay-settings');
	var settingsBox = document.getElementById('settings-overlay');
	overlay.style.opacity = 0.8;
	if(mode==0){
		overlay.style.display="none";
		settingsBox.style.display="none";
		overlay_options.style.display="none";
		dropdown_options.style.display = "none";
		passwordBox.style.display="none";
	}
	else if(mode==1){
		if(overlay.style.display == "block"){
			overlay.style.display = "none";
			settingsBox.style.display = "none";
		} else {
			overlay.style.display = "block";
			settingsBox.style.display = "block";
			overlay_options.style.display="none";
			dropdown_options.style.display = "none";
		}
	} else if(mode==2){
		settingsBox.style.display = "none";
		if(passwordBox.style.display=="block"){
			passwordBox.style.display="none";
			overlay.style.display="none";
		} else{
			passwordBox.style.display="block";
			overlay.style.display="block";
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
function getTop(element) {
    var yPosition = 0;
  
    while(element) {
        yPosition += (element.offsetTop - element.scrollTop + element.clientTop);
        element = element.offsetParent;
    }
    return yPosition;
}