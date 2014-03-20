<?php
$title='Register';
include('includes/header.inc.php');
?>
<div id="formholder" class="rounded-small">
<h1 id="contentheader">Register</h1>
<form id="registerform" action="register.php" method="POST">
	Username <input type="text" placeholder="Username" name="username"/>
	Password <input type="password" placeholder="Password" name="password"/><span id="passerror"></span>
	Re-type Password <input type="password" placeholder="Re-type Password" name="repassword"/>
	First Name <input type="text" placeholder="First Name" name="firstname"/>
	Last Name <input type="text" placeholder="Last Name" name="lastname"/>
	City <input type="text" placeholder="City" name="address"/>
	Email Adress <input type="text" placeholder="Email Address" name="email"/>
	<input id="submitForm" type="submit" value="Register"/>
</form>
</div>