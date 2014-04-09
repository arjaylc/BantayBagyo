<button id="overlay-settings" onclick= "toggleSettings(0)"></button>
<div id="settings-overlay" class="form">
	<form id="settingsform" action="check_settings.php" method="POST">
		<?php
      		if(isset($_GET['email'])){?>
      	<span class = "form-error"><?php echo "'".$_GET['email']."' already has an account."?></span>
    	<?php
      		}
    	?>
		<label for="email">Email Address</label>
		<input type="email" required id = "email" maxlength = "64" value = "<?php
		 if($_SESSION['email']==-1){
		 	$email = '';
		 } else{
		 	$email = $_SESSION['email'];
		 }
		 echo $email
		?>"
		placeholder="Email Address" name="email"/>
		<button id = "changePasswordButton" type =  "button" onclick = "toggleSettings(2)"><strong>Edit Password</strong></button><br>
		<button id="submitForm" type="submit"/>Save</button>
		<button id ="cancelForm" type = "button" onclick ="toggleSettings(1)">Cancel</button>
	</form>
</div>
<script src="js/checkers.js"></script>
