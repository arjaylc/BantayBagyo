<div id = "dropdown-options">

<?php
	if($_SESSION['usertype']=='admin'){
		echo "<button id ='adminbutton' onclick=''>Admin Page</button><br>";
	}
?>
<button id ="settingsbutton" onclick="toggleSettings(1)">Settings</button><br>
<button id ="logoutbutton" onclick ="document.location.href = 'session_logout.php'">Log-out</button>
</div>