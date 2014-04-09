<?php
	require_once('includes/database_master.inc.php');
	require_once('includes/page_master.inc.php');
	require_once('includes/session_master.inc.php');

	$database_master = new DatabaseMaster();
	$page_master = new PageMaster();

	$email = $_POST['username'];
	$email = $database_master->escapeString($email);

	$password = $_POST['password'];
	$password = $database_master->escapeString($password);

	$query = "SELECT usertype, province FROM users WHERE email_address = '$email' AND 
	password = SHA('$password')";

	$queryResult = $database_master->querySelect($query);

	if(is_array($queryResult) && count($queryResult)){
		$usertype =$queryResult[0]['usertype'];
		$province = $queryResult[0]['province'];
		if(empty($email_address)){
			$email_address = -1;
		}
		$session_master = new SessionMaster();
		$session_master->logUserIn($email, $usertype,$province);
		if($_POST['loginkeep']=="on"){
			$cookie_duration = 2764800; //1 month in seconds
			setcookie('email', $email_address, time()+$cookie_duration);
			setcookie('usertype', $usertype, time()+$cookie_duration);
			setcookie('province', $province, time()+$cookie_duration);
			setcookie('cookied', true, time()+$cookie_duration);
		}
		$page_master->redirectUser();
	}
	else $page_master->redirectUser('index.php?error=login');

?>