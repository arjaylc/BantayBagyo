<?php
	require_once('includes/database_master.inc.php');
	require_once('includes/page_master.inc.php');
	require_once('includes/session_master.inc.php');

	$database_master = new DatabaseMaster();
	$page_master = new PageMaster();
	$session_master = new SessionMaster();

	$email = $_SESSION['email'];
	$username = $database_master->escapeString($username);

	$province = $_POST['main-province'];
	$province = $database_master->escapeString($province);

	if(!$database_master->checkProvince($province)){
		$page_master->redirectUser('index.php?main_province='.$province);
	} else{
		$query = "UPDATE users SET province = '$province' where email_address = '$email'";
		if($database_master->queryUpdate($query)){
			$_SESSION['province']=$province;
			$page_master->redirectUser();
		} else{
			$page_master->redirectUser('index.php?error=database');
		}
	}

?>