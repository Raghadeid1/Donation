<?php


class Child extends Controller {

	function __construct() {

		
			parent::__construct('child_model');
			 	
			$this->session=new Session();
			$this->session->start();
			
		if (!$this->session->get('loggedIn') || !($this->session->get('username'))) {
			header('location:' . BASEPATH . 'login');
		} 
	}

	function index() {

		$data=$this -> model -> getAllChilds();

		$this -> viewLoader -> render('child/index' ,array('data'=>$data));

	}

	function create(){
		$this->viewLoader->render('child/create');
	}

	function storeCreate(){

		$data = array('name'=>$_POST["name"],'birthdate'=>$_POST["birthdate"], 'status'=>$_POST["status"]);

		$this -> model -> insertRow($data);
		
		header('location:' . BASEPATH . 'child/');
	}


	function update($id){

		$data = $this -> model -> getChild($id);
		$this -> viewLoader -> render('child/update' ,array('data'=>$data));
	}

	function storeUpdate($id){
		
		$data = array('name'=>$_POST["name"],'birthdate'=>$_POST["birthdate"], 'status'=>$_POST["status"]);
		
		$this -> model -> updateSingleChild($id, $data);

		header('location:' . BASEPATH . 'child/');
	}

	function delete($id) {

		$this -> model -> deleteRow($id);
		header('location:' . BASEPATH . 'child/');
	}

}
