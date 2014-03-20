<button id="overlay-options" onmousedown= "showDropdown()"></div>
<div id = "user-options">
	<button id ="optionsbutton" onmousedown="showDropdown()">
		<?php echo $_SESSION['username'].' ('.$_SESSION['firstname'].' '.$_SESSION['lastname'].') ▾'?>
	</button>
</div>