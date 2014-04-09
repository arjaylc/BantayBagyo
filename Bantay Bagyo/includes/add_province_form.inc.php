<div id = "province-overlay" class = "form">
	<form action="add_province.php" method="POST">
		<?php if(isset($_GET['province'])){?>
			<span class="form-error"><?php echo "'".$_GET['province']."' is not a valid province"?></span>
		<?php
			} else if(isset($_GET['user_province'])){?>
				<span class="form-error"><?php echo "You have already added '".$_GET['user_province']."' to your list of provinces"?></span>
		<?php
			}
		?>
		<input type="search" id= "province" class = "province" required pattern = "[a-zA-z\s-]*" 
		title = "letters, spaces, and hyphens only" placeholder="Specify Province" name="province"/>
		<button id="submitForm" type="submit">Add</button>
		<button id ="cancelForm" type = "button" onclick ="toggleProvince()">Cancel</button>
	</form>
</div>

<link rel="stylesheet" href="css/jquery-ui-1.10.4.custom.min.css" />

<script src="js/search/jquery-1.11.0.min.js"></script>    
<script src="js/search/jquery-ui-1.10.4.custom.min.js"></script>
<script src="js/search/search-listener.js"></script>

