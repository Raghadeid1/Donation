<?php


class Main extends Controller {

	function __construct() {

		
			parent::__construct('main_model');
			 	
			$this->session=new Session();
			$this->session->start();
			
		if (!$this->session->get('loggedIn') || !($this->session->get('username'))) {
			header('location:' . BASEPATH . 'login');
		} 
	}

	function index() {

		$this -> viewLoader -> render('home');

	}

	public function fitch(){
		
		if(isset($_POST["view"]))
		{
			if($_POST["view"] != '')
			{
				$this -> model -> readAllNotification();
			}
			$count2 = $this -> model -> getCountNotification();
			$query2 = $this -> model -> getLastNotification($count2);
			$output = '';
			
			if($count2 > 0)
			{
				foreach ($query2 as $key => $row)
				{
					$output .= '<li><strong>'.$row["msg"].'</strong><br /></li>	<li class="divider"></li>';
				}
			}
			else
			{
				$output .= '<li>No Notification Found</li>';
			}
			
			$data = array(
				'notification'   => $output,
				'unseen_notification' => $count2[0]
			);
			echo json_encode($data);
			
		}
	}

	public function insert(){
		
	}

}
