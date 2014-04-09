<?php
	require_once('includes/database_master.inc.php');
	require_once('includes/page_master.inc.php');
	require_once('includes/session_master.inc.php');

	$database_master = new DatabaseMaster();
	$page_master = new PageMaster();
	$session_master = new SessionMaster();

	$email = $_SESSION['email'];
	$email = $database_master->escapeString($email);

	$password = $_POST['password'];
	$password = $database_master->escapeString($password);

	$password1 = $_POST['password1'];
	$password1 = $database_master->escapeString($password1);

	$password2 = $_POST['password2'];
	$password2 = $database_master->escapeString($password2);

	if($password1!=$password2){
		$page_master->redirectUser('index.php?password=nomatch');
	}
	if(!$database_master->checkPassword($email, $password)){
		$page_master->redirectUser('index.php?password=wrong');
	}
	$query = "UPDATE users SET password = SHA('$password1') WHERE email_address ='$email'";
	if($database_master->queryUpdate($query)){
		$session_master->logUserOut();
		$page_master->redirectUser('index.php?password=updated');
	}
	else $page_master->redirectUser('index.php?error=database');

?>