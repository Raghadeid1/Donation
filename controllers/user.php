<?php


class User extends Controller {

	function __construct() {

		
			parent::__construct('user_model');
			 	
			$this->session=new Session();
			$this->session->start();
			
		if (!$this->session->get('loggedIn') || !($this->session->get('username'))) {
			header('location:' . BASEPATH . 'login');
		} 
	}

	function index() {

		$data=$this -> model -> getAllUsers();

		$this -> viewLoader -> render('user/index' ,array('data'=>$data));

	}

	function create(){
		$this->viewLoader->render('user/create');
	}

	function storeCreate(){

		$data = array('username'=>$_POST["username"],'password'=>$_POST["password"],'accType'=>$_POST["accType"]);

		$this -> model -> insertRow($data);
		
		header('location:' . BASEPATH . 'user/');
	}


	function update($id){

		$data = $this -> model -> getUser($id);
		$this -> viewLoader -> render('user/update' ,array('data'=>$data));
	}

	function storeUpdate($id){
		
		$data = array('username'=>$_POST["username"],'password'=>$_POST["password"],'accType'=>$_POST["accType"]);
		
		$this -> model -> updateSingleUser($id, $data);

		header('location:' . BASEPATH . 'user/');
	}

	function delete($id) {

		$this -> model -> deleteRow($id);
		header('location:' . BASEPATH . 'user/');
	}

}
