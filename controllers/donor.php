<?php


class Donor extends Controller {

	function __construct() {

		
			parent::__construct('donor_model');
			 	
			$this->session=new Session();
			$this->session->start();
			
		if (!$this->session->get('loggedIn') || !($this->session->get('username'))) {
			header('location:' . BASEPATH . 'login');
		} 
	}

	function index() {

		$data=$this -> model -> getAllDonors();

		$this -> viewLoader -> render('donor/index' ,array('data'=>$data));

	}
	function receipt($id){

		$donor = $this -> model -> getSingleDonor($id);
		$donationList = $this -> model -> getDoDonation($id);
		
		$this -> viewLoader -> render('donor/receipt' ,array('donor'=>$donor,'donationList'=>$donationList));
	}

	function create(){
		$gov = $this -> model -> getAllGov();

		$this->viewLoader->render('donor/create',array('gov'=>$gov));
	}

	function storeCreate(){

		$data = array('name'=>$_POST["name"],'phone'=>$_POST["phone"],'address'=>$_POST["address"],'govid'=>$_POST["govid"]);

		$this -> model -> insertRow($data);
		
		header('location:' . BASEPATH . 'donor/');
	}
	public function getChild($id) {
		$sth = $this -> db -> fetchSingle('SELECT * FROM childs WHERE id = :id',array(':id'=>$id));
		return $sth;

	}


	function update($id){
         
		$data = $this -> model -> getSingleDonor($id);
		$gov = $this -> model -> getAllGov();

		$this -> viewLoader -> render('donor/update',array('data'=>$data,'gov'=>$gov));
	}

	function storeUpdate($id){
		
		$data = array('name'=>$_POST["name"],'phone'=>$_POST["phone"],'address'=>$_POST["address"],'cid'=>$_POST["cid"],'govid'=>$_POST["govid"]);
		
		$this -> model -> updateSingleDonor($id, $data);

		header('location:' . BASEPATH . 'donor/');
	}

	function delete($id) {

		$this -> model -> deleteRow($id);
		header('location:' . BASEPATH . 'donor/');
	}

}
