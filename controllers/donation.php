<?php


class Donation extends Controller {

	function __construct() {

		
			parent::__construct('donation_model');
			 	
			$this->session=new Session();
			$this->session->start();
			
		if (!$this->session->get('loggedIn') || !($this->session->get('username'))) {
			header('location:' . BASEPATH . 'login');
		} 
	}

	function index() {

		$data=$this -> model -> getAllDonation();

		$this -> viewLoader -> render('donation/index' ,array('data'=>$data));

	}

	function waranty(){

		$data = $this -> model -> getAllDonationType('waranty');

		$this -> viewLoader -> render('donation/listType' ,array('data'=>$data,'type'=>"Waranty"));
	}

	function cash(){

		$data = $this -> model -> getAllDonationType('cash');

		$this -> viewLoader -> render('donation/listType' ,array('data'=>$data,'type'=>"Cash"));
	}
	function inkind(){

		$data = $this -> model -> getAllDonationType('inkind');

		$this -> viewLoader -> render('donation/listType' ,array('data'=>$data,'type'=>"Inkind"));
	}
	
	

	function create(){
		$donors = $this -> model -> getAllDonors();
		$childs = $this -> model -> getAllChilds();
		$this->viewLoader->render('donation/create',array('donors'=>$donors,'childs'=>$childs));
	}

	function storeCreate(){

		$data = array('amount'=>$_POST["amount"],'type'=>$_POST["type"],'donor_id'=>$_POST["donor_id"],'child_id'=>$_POST["child_id"], 'Notes'=>$_POST["Notes"]);

		$this -> model -> insertRow($data);
		
		header('location:' . BASEPATH . 'donation/');
	}

	function update($id){

		$donors = $this -> model -> getAllDonors();
		$childs = $this -> model -> getAllChilds();
		$data = $this -> model -> getDonation($id);

		$this->viewLoader->render('donation/update',array('data'=>$data, 'donors'=>$donors, 'childs'=>$childs));

	}

	function storeUpdate($id){
		
		$data = array('amount'=>$_POST["amount"],'type'=>$_POST["type"],'donor_id'=>$_POST["donor_id"],'child_id'=>$_POST["child_id"], 'Notes'=>$_POST["Notes"]);
		
		$this -> model -> updateSingleDonation($id, $data);

		header('location:' . BASEPATH . 'donation/');
	}

	function delete($id) {

		$this -> model -> deleteRow($id);
		header('location:' . BASEPATH . 'donation/');
	}

	

}
