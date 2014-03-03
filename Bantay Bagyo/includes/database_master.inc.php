<?php
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$db_name = 'bantaybagyo';
	$conn_error = 'Failed to connect to the database';
	if(!@mysql_connect($host, $user, $password)||!@mysql_select_db($db_name)){
		die($conn_error);
	}
?>