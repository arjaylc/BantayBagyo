<div id="register-overlay" class = "form">
	<form id="registerform" action="check_register.php" method="POST">
		<?php
			if(isset($_GET['error'])&&$_GET['error']=='empty'){?>
		<span class = "form-error">Please fill out all of the fields. :)</span>
		<?php
			}
			if(isset($_GET['password'])){?>
		<span class = "form-error">The password fields should match. :)</span>
		
		<?php
			}
      		if(isset($_GET['email'])){?>
      	<span class = "form-error"><?php echo "'".$_GET['email']."' already has an account."?></span>
    	<?php
      		}
    	?>
		<label for="email">Email Address (optional)</label>
		<input type="email" id = "email" maxlength = "64"
		required placeholder="Email Address" name="email"/>
		<label for="password1">Password</label>
		<input type="password" id = "password1" maxlength = "64" title = "at least 6 characters"
		onchange="validatePassword()" required placeholder="Password" name="password1"/>
		<label for="password2">Re-type Password</label>
		<input type="password" id="password2" maxlength = "64"
		onchange="validatePassword()" required placeholder="Re-type Password" name="password2"/>
		<?php
      		if(isset($_GET['province'])){?>
      	<span class = "form-error"><?php echo "'".$_GET['province']."' is not a valid province."?></span>
    	<?php
      		}
    	
			include ("includes/search_textfield.inc.php");
		?>
		<button id="submitForm" type="submit">Register</button>
		<button id ="cancelForm" type = "button" onclick ="toggleOverlay(1)">Cancel</button>
	</form>
</div>
<script src="js/checkers.js"></script>
