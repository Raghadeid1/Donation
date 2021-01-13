<?php

class Login_Model extends Model {
	public function __construct() {
		parent::__construct();
		
	}

	public function login(Session $session) {
 
		
		$userName = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
		$passw = filter_var($_POST['password'],FILTER_SANITIZE_SPECIAL_CHARS); 
		

		$user = $this -> db -> fetchSingle("SELECT id, accType FROM users WHERE 
				username = :username AND password = :password", array(':username' => $userName, ':password' => $passw));

		if ( !empty($user) ) {

			$session->start();
			$session->set('username', $userName);
			$session->set('level', $user['accType']);
			$session->set('loggedIn', true);
			$sessionId = session_id();
			
			header('location:' . BASEPATH . DEFAULTCONTROLLER);

		} else {
			header('location:' . BASEPATH . 'login');
		}

	}

	function logout(Session $session) {
		$session->start();
		$session->set('loggedIn', false);
		$session->set('user', null);
		$session->set('level', null);

		$session->destroy();
		header('location:' . BASEPATH);
	}

}
