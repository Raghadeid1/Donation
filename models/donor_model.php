<?php
/**
 * main page model example
 *
 * */
class Donor_Model extends Model {
	public function __construct() {
		parent::__construct();
	}

	public function getAllDonors() {
		$sth = $this -> db -> fetchAllAssoc('SELECT t.id as id,
													t.name as name,
													t.phone as phone,
													t.address as address,
													t.govid as govid,
													d.id as cid,
													d.name as cname,
													m.id as mid,
													m.name as gname,
													d.parentid as parentid
											 FROM donors as t,
											 	  gov as d,
												  gov as m
											 WHERE m.id= d.parentid AND t.govid = d.id');
		return $sth;

	}
	
	public function getAllGov() {
		$sth = $this -> db -> fetchAllAssoc('SELECT * FROM gov');
		return $sth;

	}
	


	public function getAllDonationCash() {
		$sth = $this -> db -> fetchAllAssoc('SELECT * FROM donors WHERE DonationType="Cash"');
		return $sth;

	}

	public function getDoDonation($id){
		
		$sth = $this -> db -> fetchAllAssoc('SELECT t.id as id,
													t.date as date,
													t.amount as amount,
													t.type as type,
													c.name as childName,
													t.Notes as Notes
											 FROM donations as t,
												  childs as c 
											 WHERE t.child_id = c.id AND t.donor_id = :id',array(':id'=>$id));
		return $sth;
	}

	
	
	

	public function getDonor($id) {
		$sth = $this -> db -> fetchAllAssoc('SELECT * FROM donors WHERE id = :id',array(':id'=>$id));
		
		return $sth;
	}
	public function getSingleDonor($id) {
		$sth = $this -> db -> fetchSingle('SELECT * FROM donors WHERE id = :id',array(':id'=>$id));
		return $sth;

	}


	public function insertRow($data) {
        
		$sth = $this -> db -> onlyExecute('INSERT INTO donors
        (`name`,`phone`,`address`,`govid`) VALUES 
        (:name,:phone,:address,:govid)
			', array(':name' => $data['name'],':phone' => $data['phone'],':address' => $data['address'],':govid' => $data['govid']));
		if ($sth) {
			$this->Observetion("Inserted new Donor ... with name :".$data['name']);
			return true;

		} else {
			return false;
        }
        
	}
	
	
	
	public function getDonorDonation($id){
		$sth = $this -> db -> fetchAllAssoc('SELECT * FROM donations WHERE donor_id = :id',array(':id'=>$id));
		return $sth;
	}

	public function updateSingleDonor($id, $data) {

		$sth = $this -> db -> onlyExecute('UPDATE donors
			SET `name` = :name ,`phone` = :phone ,`address` = :address,`govid` = :govid
            WHERE id = :id', array(':id' => $id, ':name' => $data['name'],':phone' => $data['phone'],':address' => $data['address'],':govid' => $data['govid']));
		if ($sth) {
			$this->Observetion("Update Donor info ... for :".$data['name']);
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
	public function deleteRow($id) {
		$sth = $this -> db -> onlyExecute('DELETE FROM donors WHERE id = :id', array(':id' => $id));
		if ($sth) {
			$this->Observetion("Delete Donor id :".$id);
			return true;
		} else {
			return false;
		}
	}

}
