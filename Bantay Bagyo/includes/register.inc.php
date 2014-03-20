<div id="register-overlay">
	<div id="form" class="rounded-small">
	<form id="registerform" action="check_register.php" method="POST">
		<label for="username" >Username</label>
		<input type="text" id="username" maxlength = "64"
		required autofocus pattern = "[a-zA-z0-9]{6}[a-zA-z0-9]*" 
		title = "letters and numbers only; at least 6 characters" placeholder="Username" name="username"/>
		<label for="password1">Password</label>
		<input type="password" id = "password1" maxlength = "64"
		onchange="validatePassword()" required placeholder="Password" name="password1"/>
		<label for="password2">Re-type Password</label>
		<input type="password" id="password2" maxlength = "64"
		onchange="validatePassword()" required placeholder="Re-type Password" name="password2"/>
		<label for="firstname">First Name</label>
		<input type="text" id = "firstname" maxlength = "64"
		required pattern = "[a-zA-z\s]*" title = "letters and spaces only"
		 placeholder="First Name" name="firstname"/>
		<label for="lastname">Last Name</label>
		<input type="text" id = "lastname" maxlength = "64"
		required pattern = "[a-zA-z\s]*" title = "letters and spaces only"
		placeholder="Last Name" name="lastname"/>
		<label for="province">Province</label>
		<?php
			include ("includes/search_textfield.inc.php");
		?>
		<label for="email">Email Address (optional)</label>
		<input type="email" id = "email" maxlength = "64"
		placeholder="Email Address" name="email"/>
		<input id="submitForm" type="submit" value="Register"/>
		<button id ="cancelForm" onclick ="toggleOverlay(1)">Cancel</button>
	</form>
	</div>
</div>
<script src="js/checkers.js"></script>
