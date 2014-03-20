<?php
	include ('includes/session_master.inc.php');
	$session_master = new SessionMaster();
	if(isset($_COOKIE['cookied'])){
		include('includes/page_master.inc.php');
		$page_master = new PageMaster();
		$username = $_COOKIE['username'];
		$type = $_COOKIE['usertype'];
		$firstname = $_COOKIE['firstname'];
		$lastname = $_COOKIE['lastname'];
		$province = $_COOKIE['province'];
		$session_master->logUserIn($username, $type, $firstname, $lastname, $province);
	}
?>