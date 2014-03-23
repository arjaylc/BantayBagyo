<button id="overlay-settings" onclick= "toggleSettings(0)"></button>
<div id="settings-overlay">
	<div id="form" class="rounded-small">
	<form id="settingsform" action="check_settings.php" method="POST">
		<label for="username" >Username</label>
		<input type="text" id="username" maxlength = "64" value = "<?php echo $_SESSION['username']?>"
		required autofocus pattern = "[a-zA-z0-9]{6}[a-zA-z0-9]*" 
		title = "letters and numbers only; at least 6 characters" placeholder="Username" name="username"/>
		<label for="firstname">First Name</label> 
		<input type="text" id = "firstname" maxlength = "64" value = "<?php echo $_SESSION['firstname']?>"
		required pattern = "[a-zA-z\s]*" title = "letters and spaces only"
		 placeholder="First Name" name="firstname"/>
		<label for="lastname">Last Name</label>
		<input type="text" id = "lastname" maxlength = "64" value = "<?php echo $_SESSION['lastname']?>"
		required pattern = "[a-zA-z\s]*" title = "letters and spaces only"
		placeholder="Last Name" name="lastname"/>
		<label for="email">Email Address</label>
		<input type="email" id = "email" maxlength = "64" value = "<?php
		 if($_SESSION['email']==-1){
		 	$email = '';
		 } else{
		 	$email = $_SESSION['email'];
		 }
		 echo $email
		?>"
		placeholder="Email Address" name="email"/>
		<button id = "changePasswordButton" type =  "button"><strong>Change Password?</strong></button>
		<button id = "addProvinceButton" type =  "button"><strong>Add Provinces?</strong></button><br>
		<input id="submitForm" type="submit" value="Save"/>
		<button id ="cancelForm" type = "button" onclick ="toggleSettings(1)">Cancel</button>
	</form>
	</div>
</div>
<script src="js/checkers.js"></script>
