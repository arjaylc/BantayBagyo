<div id="password-overlay" class = "form">
	<form id="passwordform" action="change_password.php" method="POST">
		<?php
			if(isset($_GET['password'])&&$_GET['password']=='wrong'){?>
				<span class="form-error"> You entered the wrong password. </span>
		<?php
			}
			if(isset($_GET['password'])&&$_GET['password']=='nomatch'){?>
				<span class="form-error"> The new passwords you entered did not match. </span>
		<?php
			}
		?>
		<label for="password">Current Password</label>
		<input type="password" id = "password" maxlength = "64" title = "at least 6 characters"
		required placeholder="Password" name="password"/>
		<label for="password1">New Password</label>
		<input type="password" id = "password1" maxlength = "64" title = "at least 6 characters"
		onchange="validatePassword()" required placeholder="Password" name="password1"/>
		<label for="password2">Re-type New Password</label>
		<input type="password" id="password2" maxlength = "64"
		onchange="validatePassword()" required placeholder="Re-type Password" name="password2"/>
		<button id="submitForm" type="submit">Update</button>
		<button id ="cancelForm" type = "button" onclick ="toggleSettings(2)">Cancel</button>
	</form>
</div>
<script src="js/checkers.js"></script>

<link rel="stylesheet" href="css/jquery-ui-1.10.4.custom.min.css" />

<script src="js/search/jquery-1.11.0.min.js"></script>    
<script src="js/search/jquery-ui-1.10.4.custom.min.js"></script>
<script src="js/search/search-listener.js"></script>