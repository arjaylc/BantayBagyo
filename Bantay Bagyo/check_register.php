<?php
	include('includes/database_master.inc.php');
	include('includes/page_master.inc.php');
	include('includes/session_master.inc.php');

	$database_master = new DatabaseMaster();
	$page_master = new PageMaster();
	$session_master = new SessionMaster();

	$username = $_POST['username'];
	$username = $database_master->escapeString($username);

	$password1 = $_POST['password1'];
	$password1 = $database_master->escapeString($password1);

	$password2 = $_POST['password2'];
	$password2 = $database_master->escapeString($password2);

	$firstname = $_POST['firstname'];
	$firstname = $database_master->escapeString($firstname);

	$lastname = $_POST['lastname'];
	$lastname = $database_master->escapeString($lastname);

	$province = $_POST['province'];
	$province = $database_master->escapeString($province);

	$email = $_POST['email'];
	$email = $database_master->escapeString($email);


	$redirectPage = 'index.php?';
	if(!$database_master->checkUsername($username)){
		$errors['username'] = "username";
		$redirectPage.='username='.$username;
	}
	if(!$database_master->checkEmail($email)){
		$errors['email'] = "email";
		$redirectPage.='&email='.$email;
	}
	if(!$database_master->checkProvince($province)){
		$errors['province'] = "province";
		$redirectPage.='&province='.$province;
	}

	$usertype = 'basic';

	if(empty($errors)){
		$query = "INSERT INTO users VALUES ('$username', SHA('$password1'), '$firstname', '$lastname', '$usertype', 
			'$province',";
		if(!isset($email)||$email==''){
			$query .= "null);";
		} else{
			$query .= "'$email');";
		}
		if($database_master->queryUpdate($query)){
			$session_master->logUserIn($username, $usertype, $firstname, $lastname, $province, $email);
			$page_master->redirectUser();
		}
		else $page_master->redirectUser('index.php?error=database');
	} else{
		$page_master->redirectUser($redirectPage);
	}
?>