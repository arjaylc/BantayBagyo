<?php
	require_once('includes/database_master.inc.php');
	require_once('includes/page_master.inc.php');
	require_once('includes/session_master.inc.php');

	$database_master = new DatabaseMaster();
	$page_master = new PageMaster();
	$session_master = new SessionMaster();

	$email = $_POST['email'];
	$email = $database_master->escapeString($email);

	$password1 = $_POST['password1'];
	$password1 = $database_master->escapeString($password1);

	$password2 = $_POST['password2'];
	$password2 = $database_master->escapeString($password2);

	$province = $_POST['province'];
	$province = $database_master->escapeString($province);

	$redirectPage = 'index.php?';
	if($password1!=$password2){
		$errors['password'] = "nomatch";
		$redirectPage.='password=nomatch';
	}
	if(empty($email)||empty($password1)||empty($password2)||empty($province)){
		$errors['error'] = "empty";
		$redirectPage.='&error=empty';
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
		$query = "INSERT INTO users VALUES ('$email', SHA('$password1'),'$usertype','$province')";
		if($database_master->queryUpdate($query)){
			$query = "INSERT INTO user_provinces VALUES('$email', '$province')";
			$database_master->queryUpdate($query);
			$session_master->logUserIn($email, $usertype, $province);
			$page_master->redirectUser();
		}
		else $page_master->redirectUser('index.php?error=database');
	} else{
		$page_master->redirectUser($redirectPage);
	}
?>