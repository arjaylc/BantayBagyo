<?php
	include('includes/database_master.inc.php');
	include('includes/page_master.inc.php');
	include('includes/session_master.inc.php');

	$database_master = new DatabaseMaster();
	$session_master = new SessionMaster();
	$session_master->logUserOut();
	$page_master = new PageMaster();
	$page_master->redirectUser();
?>