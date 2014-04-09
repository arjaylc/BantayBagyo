<?php
	require_once('includes/database_master.inc.php');
	require_once('includes/page_master.inc.php');
	require_once('includes/session_master.inc.php');

	$database_master = new DatabaseMaster();
	$page_master = new PageMaster();
	$session_master = new SessionMaster();

	$email = $_SESSION['email'];
	$username = $database_master->escapeString($username);

	$province = $_POST['province'];
	$province = $database_master->escapeString($province);

	if(!$database_master->checkProvince($province)){
		$page_master->redirectUser('index.php?province='.$province);
	}
	else{
		$querySelect = "SELECT province FROM user_provinces WHERE email_address = '$email' AND province = '$province'";
		$queryResult = $database_master->querySelect($querySelect);
		if(!empty($queryResult)){
			$page_master->redirectUser('index.php?user_province='.$province);
		}
		$query = "INSERT INTO user_provinces VALUES('$email', '$province')";
		if($database_master->queryUpdate($query)){
			$page_master->redirectUser();
		} else{
			$page_master->redirectUser('index.php?error=database');
		}
	}
?>