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
		public function logUserIn($email, $usertype, $province){
			$_SESSION['email']= $email;
			$_SESSION['usertype'] = $usertype;
			$_SESSION['province'] = $province;
			$_SESSION['logged'] = true;
		}

		public function logUserOut(){
			$cookie_duration = 2764800; //1 month in seconds
			unset($_SESSION['usertype']);
			unset($_SESSION['province']);
			unset($_SESSION['email']);
			unset($_SESSION['logged']);
			setcookie('usertype', '', time()-$cookie_duration);
			setcookie('province', '', time()-$cookie_duration);
			setcookie('email_address', '', time()-$cookie_duration);
			setcookie('cookied', false, time()-$cookie_duration);
			$_SESSION = array();
		}
	}
?>