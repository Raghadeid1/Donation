<?php


class Activity extends Controller {

	function __construct() {

		
			parent::__construct('activity_model');
			 	
			$this->session=new Session();
			$this->session->start();
			
		if (!$this->session->get('loggedIn') || !($this->session->get('username'))) {
			header('location:' . BASEPATH . 'login');
		} 
	}

	function index() {

		$data=$this -> model -> getAllActivity();

		$this -> viewLoader -> render('activity/index' ,array('data'=>$data));

	}



    function create(){
		$activitylist = $this -> model -> getAllActivityList();
	
		$this->viewLoader->render('activity/create',array('activitylist'=>$activitylist));
	}
	
	function reg(){
		$reg = $this -> model -> getAllReg();
	    $donors = $this -> model -> getAllDonors();
	    $extras = $this -> model -> getAllExtras();
        $activity = $this -> model -> getAllActivity();
		
		$this->viewLoader->render('activity/reg',array('reg'=>$reg,'donors'=>$donors,'extras'=>$extras,'activity'=>$activity));
	}
	
	function extras(){
		
	    $extras = $this -> model -> getAllExtras();
      
		
		$this->viewLoader->render('activity/extras',array('extras'=>$extras));
	}
	
		function storeExtra(){

		$data = array('name'=>$_POST["name"],'amount'=>$_POST["amount"]);

		$this -> model -> insertExtra($data);
		
		header('location:' . BASEPATH . 'activity/');
	}

	function storeCreate(){

		$data = array('parentid'=>$_POST["parentid"],'ActivitySDate'=>$_POST["ActivitySDate"],'ActivityEDate'=>$_POST["ActivityEDate"],'ActivityName'=>$_POST["ActivityName"], 'ActivityFees'=>$_POST["ActivityFees"]);

		$this -> model -> insertRow($data);
		
		header('location:' . BASEPATH . 'activity/');
	}
	
		function storeReg(){

		$data = array('acid'=>$_POST["acid"],'did'=>$_POST["did"],'extras'=>$_POST["extras"]);

		$this -> model -> insertReg($data);
		
		header('location:' . BASEPATH . 'activity/');
	}
	
	
	
	

	function update($id){
            $activitylist = $this -> model -> getAllActivityList();
			$data = $this -> model -> getActivity($id);

		$this->viewLoader->render('activity/update',array('data'=>$data, 'activitylist'=>$activitylist));

	}

	function storeUpdate($id){
		
		$data = array('parentid'=>$_POST["parentid"],'ActivitySDate'=>$_POST["ActivitySDate"],'ActivityEDate'=>$_POST["ActivityEDate"],'ActivityName'=>$_POST["ActivityName"], 'ActivityFees'=>$_POST["ActivityFees"]);
		
		$this -> model -> updateSingleActivity($id, $data);

		header('location:' . BASEPATH . 'activity/');
	}

	function delete($id) {

		$this -> model -> deleteRow($id);
		header('location:' . BASEPATH . 'activity/');
	}

	

}
