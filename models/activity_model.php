<?php
/**
 * main page model example
 *
 * */
class Activity_Model extends Model {
	public function __construct() {
		parent::__construct();
	}

		public function getAllActivity() {
		$sth = $this -> db -> fetchAllAssoc('SELECT t.id as id,
													t.parentid as parentid,
													t.ActivitySDate as ActivitySDate,
													t.ActivityEDate as ActivityEDate,
													t.ActivityName as ActivityName,
													t.ActivityFees as ActivityFees,
													d.id as pid,
													d.type as type
											 FROM activity as t,
											 	  activitylist as d
											 WHERE t.parentid = d.id');
		return $sth;

	}
	
		public function getAllReg() {
		$sth = $this -> db -> fetchAllAssoc('SELECT * FROM reg');
		return $sth;

	}
	
	
	public function getAllActivityList() {
		$sth = $this -> db -> fetchAllAssoc('SELECT * FROM activitylist');
		return $sth;

	}

     public function getActivity($id) {
		$sth = $this -> db -> fetchSingle('SELECT * FROM activity WHERE id = :id',array(':id'=>$id));
		return $sth;

	}
	
	public function getAllDonors() {
		$sth = $this -> db -> fetchAllAssoc('SELECT * FROM donors');
		return $sth;

	}
	public function getAllExtras() {
		$sth = $this -> db -> fetchAllAssoc('SELECT * FROM extras');
		return $sth;

	}

	


	public function insertRow($data) {
        
		$sth = $this -> db -> onlyExecute('INSERT INTO activity
        (`parentid`,`ActivitySDate`,`ActivityEDate`,`ActivityName`,`ActivityFees`) VALUES 
        (:parentid, :ActivitySDate, :ActivityEDate, :ActivityName, :ActivityFees)
			', array(':parentid' => $data['parentid'],':ActivitySDate' => $data['ActivitySDate'],':ActivityEDate' => $data['ActivityEDate'],':ActivityName' => $data['ActivityName'],':ActivityFees' => $data['ActivityFees']));
		if ($sth) {
			$this->Observetion("Inserted new Activity ... with Name :".$data['ActivityName']);
			return true;

		} else {
			return false;
        }
        
	}
	
	public function insertReg($data) {
        
		$sth = $this -> db -> onlyExecute('INSERT INTO reg
        (`acid`,`did`,`extras`) VALUES 
        (:acid, :did, :extras)
			', array(':acid' => $data['acid'],':did' => $data['did'],'extras' => $data['extras']));
		if ($sth) {
			$this->Observetion("Inserted new Registration ... for Donor :".$data['did']);
			return true;

		} else {
			return false;
        }
        
	}
		public function insertExtra($data) {
        
		$sth = $this -> db -> onlyExecute('INSERT INTO extras
        (`name`,`amount`) VALUES 
        (:name, :amount)
			', array(':name' => $data['name'],':amount' => $data['amount']));
		if ($sth) {
			$this->Observetion("Inserted new Extra ... with name :".$data['name']);
			return true;

		} else {
			return false;
        }
        
	}

	public function updateSingleActivity($id, $data) {

		$sth = $this -> db -> onlyExecute('UPDATE activity
			SET `parentid` = :parentid ,`ActivitySDate` = :ActivitySDate ,`ActivityEDate` = :ActivityEDate ,`ActivityName` = :ActivityName,`ActivityFees` = :ActivityFees 
            WHERE id = :id', array(':id' => $id, ':parentid' => $data['parentid'],':ActivitySDate' => $data['ActivitySDate'],':ActivityEDate' => $data['ActivityEDate'],':ActivityName' => $data['ActivityName'], ':ActivityFees' => $data['ActivityFees']));
		if ($sth) {
			$this->Observetion("Update Activity info ... ID :".$id);
			return true;
		} else {
			return false;
		}
	
	}

	public function deleteRow($id) {
		$sth = $this -> db -> onlyExecute('DELETE FROM activity WHERE id = :id', array(':id' => $id));
		if ($sth) {
			$this->Observetion("Delete Activity id :".$id);
			return true;
		} else {
			return false;
		}
	}

	public function Observetion($msg){
		$sth = $this -> db -> onlyExecute('INSERT INTO observers 
			(`msg`) 
			VALUES (:msg)
			', array(':msg' => $msg));
		if ($sth) {
			return true;
		} else {
			return false;
		}
		
	}

	

}
