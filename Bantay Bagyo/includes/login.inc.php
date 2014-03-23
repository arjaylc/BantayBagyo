<div id ="login-overlay">
	<div id="form" class="rounded-small">
	<form id="loginform" action="session_login.php" method="POST">
	<?php
	if(isset($_GET['error'])&&$_GET['error']=='login'){
	?>
		<span id = "loginerror"> Invalid username or password. Please reenter.</span>
	<?php	
	}
	?>
		<label for="login_username">Username</label>
		<input type="text" id="login_username" maxlength = "64"
		required autofocus placeholder="Username" name="username"/>
		<label for="login_password">Password</label>
		<input type="password" id="login_password" maxlength = "64"
		required placeholder="Password" name="password"/>
		<input type = "checkbox" id="loginkeep" name="loginkeep"><label for="loginkeep">Keep me logged in</label>
		<input id="submitForm" type="submit" value="Log-in"/>
		<button id ="cancelForm" onclick ="toggleOverlay(2)">Cancel</button>
	</form>
	</div>
</div>