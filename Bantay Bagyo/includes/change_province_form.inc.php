<div id = "main-province-overlay" class = "form">
	<form action="change_province.php" method="POST">
		<?php
		if(isset($_GET['main_province'])){?>
			<span class = "form-error"><?php echo "'".$_GET['main_province']."' is not a valid province"?></span>
		<?php
			}
		?>
		<input type="search" id = "main-province" class = "province" required pattern = "[a-zA-z\s-]*" 
		title = "letters, spaces, and hyphens only" placeholder="Specify Province" name="main-province"/>
		<button id="submitForm" type="submit">Change</button>
		<button id ="cancelForm" type = "button" onclick ="toggleMainProvince()">Cancel</button>
	</form>
</div>

<link rel="stylesheet" href="css/jquery-ui-1.10.4.custom.min.css" />

<script src="js/search/jquery-1.11.0.min.js"></script>    
<script src="js/search/jquery-ui-1.10.4.custom.min.js"></script>
<script src="js/search/search-listener.js"></script>