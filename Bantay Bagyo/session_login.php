<?php
	include('includes/database_master.inc.php');
	include('includes/page_master.inc.php');
	include('includes/session_master.inc.php');

	$database_master = new DatabaseMaster();
	$page_master = new PageMaster();

	$username = $_POST['username'];
	$username = $database_master->escapeString($username);

	$password = $_POST['password'];
	$password = $database_master->escapeString($password);

	$query = "SELECT username, usertype, firstname, lastname, province, email_address FROM users WHERE username = '$username' AND 
	password = SHA('$password')";

	$queryResult = $database_master->querySelect($query);

	$d_username =$queryResult[0]['username'];
	$usertype =$queryResult[0]['usertype'];
	$firstname = $queryResult[0]['firstname'];
	$lastname = $queryResult[0]['lastname'];
	$province = $queryResult[0]['province'];
	$email_address = $queryResult[0]['email_address'];
	if(is_array($queryResult) && count($queryResult)){
		$session_master = new SessionMaster();
		$session_master->logUserIn($d_username, $usertype, $firstname, $lastname, $province, $email_address);
		if($_POST['loginkeep']=="on"){
			$cookie_duration = 2764800; //1 month in seconds
			if(empty($email_address)){
				$email_address = -1;
			}
			setcookie('email', $email_address, time()+$cookie_duration);
			setcookie('username', $d_username, time()+$cookie_duration);
			setcookie('usertype', $usertype, time()+$cookie_duration);
			setcookie('firstname', $firstname, time()+$cookie_duration);
			setcookie('lastname', $lastname, time()+$cookie_duration);
			setcookie('province', $province, time()+$cookie_duration);
			setcookie('cookied', true, time()+$cookie_duration);
		}
		$page_master->redirectUser();
	}
	else $page_master->redirectUser('index.php?error=login');

?>