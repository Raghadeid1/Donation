<?php
/**
 * main page model example
 *
 * */
class Regist_Model extends Model {
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
	
	public function getAllActivityList() {
		$sth = $this -> db -> fetchAllAssoc('SELECT * FROM activitylist');
		return $sth;

	}

     public function getActivity($id) {
		$sth = $this -> db -> fetchAllAssoc('SELECT * FROM activity WHERE id = :id',array(':id'=>$id));
		return $sth;

	}
	
	public function getSingleDonor($id) {
	$sth = $this -> db -> fetchAllAssoc('SELECT t.id as id,
													t.name as name,
													d.did as did,
													d.acid as acid
													
											 FROM donors as t,
											 	  reg as d
											 WHERE d.did= t.id AND acid= :id',array(':id'=>$id));
		return $sth;

	}
	
	public function getSingleExtra($id) {
		
		$sth = $this -> db -> fetchAllAssoc('SELECT t.id as id,
													t.name as name,
													t.amount as amount,
													d.id as id,
													d.acid as acid,
													d.extras as extras
											 FROM extras as t,
											 	  reg as d
											 WHERE t.id = d.extras AND acid=:id',array(':id'=>$id));
		
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
	public function deleteregist($id) {
		$sth = $this -> db -> onlyExecute('DELETE FROM reg WHERE id = :id', array(':id' => $id));
		
		if ($sth) {
			$this->Observetion("Deleted Regestration id :".$id);
			return true;
		} else {
			return false;
		}
	}
	
  public function getAllReg($id) {
		   
		$sth = $this -> db -> fetchAllAssoc('SELECT t.id as id,
													t.acid as acid,
													t.did as did,
													t.extras as extras,
													c.id as aid,
													c.ActivityName as ActivityName,
													c.ActivityFees as ActivityFees,
													d.name as dname,
													d.id as mid,
													e.id as eid,
													e.name as ename,
													e.amount as eamount
											     FROM reg as t,
											 	   activity as c,
												   donors as d,
												   extras as e
											 WHERE t.did = d.id AND t.extras = e.id 
											 AND t.acid = c.id AND acid = :id',array(':id'=>$id));
	  return $sth;
		
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
