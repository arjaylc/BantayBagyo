<?php
	session_start();
	class SessionMaster{
		public function isLoggedIn(){
			if(isset($_SESSION['logged'])){
				if($_SESSION['logged'] == true)
					return true;
				else return false;
			}
			else return false;
		}
		public function logUserIn($username, $usertype, $firstname, $lastname, $province){
			$_SESSION['username'] = $username;
			$_SESSION['usertype'] = $usertype;
			$_SESSION['firstname'] = $firstname;
			$_SESSION['lastname'] = $lastname;
			$_SESSION['province'] = $province;
			$_SESSION['logged'] = true;
		}

		public function logUserOut(){
			$cookie_duration = 2764800; //1 month in seconds
			unset($_SESSION['username']);
			unset($_SESSION['type']);
			unset($_SESSION['firstname']);
			unset($_SESSION['lastname']);
			unset($_SESSION['province']);
			unset($_SESSION['logged']);
			setcookie('username', $d_username, time()-$cookie_duration);
			setcookie('usertype', $usertype, time()-$cookie_duration);
			setcookie('firstname', $firstname, time()-$cookie_duration);
			setcookie('lastname', $lastname, time()-$cookie_duration);
			setcookie('province', $province, time()-$cookie_duration);
			setcookie('cookied', true, time()-$cookie_duration);
			$_SESSION = array();
		}
	}
?>