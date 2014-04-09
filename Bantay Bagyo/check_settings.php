<?php
	include('includes/database_master.inc.php');
	include('includes/page_master.inc.php');
	include('includes/session_master.inc.php');

	$database_master = new DatabaseMaster();
	$page_master = new PageMaster();
	$session_master = new SessionMaster();

	$email = $_POST['email'];
	$email = $database_master->escapeString($email);
	$redirectPage = 'index.php?';

	if(empty($email)){
		$page_master->redirectUser('index.php?error=empty');
	}

	$cookie_duration = 2764800; //1 month in seconds
	if($email!=$_SESSION['email']&&!$database_master->checkEmail($email)){
		$page_master->redirectUser('index.php?email='.$email);
	} else if($email!=$_SESSION['email']){
		$queryEmail = "UPDATE users SET email_address ='$email' WHERE email_address = '".$_SESSION['email']."'";
		if($database_master->queryUpdate($queryEmail)){
			$_SESSION['email'] = $email;
			if(isset($_COOKIE['cookied'])){
				setcookie('email', $email, time()+$cookie_duration);
			}
		} else{
			$page_master->redirectUser('index.php?error=database');
		}
	}

	$page_master->redirectUser('index.php');

?>