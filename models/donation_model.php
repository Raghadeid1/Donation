<?php
/**
 * main page model example
 *
 * */
class Donation_Model extends Model {
	public function __construct() {
		parent::__construct();
	}

	public function getAllDonation() {
		$sth = $this -> db -> fetchAllAssoc('SELECT t.id as id,
													t.date as date,
													t.amount as amount,
													t.type as type,
													d.name as donorName,
													c.name as childName,
													t.Notes as Notes
											 FROM donations as t,
											 	  donors as d,
												  childs as c 
											 WHERE t.donor_id = d.id AND t.child_id = c.id');
		return $sth;

	}

	public function getAllDonationType($type) {
		$sth = $this -> db -> fetchAllAssoc('SELECT t.id as id,
													t.date as date,
													t.amount as amount,
													t.type as type,
													d.name as donorName,
													c.name as childName,
													t.Notes as Notes
											 FROM donations as t,
											 	  donors as d,
												  childs as c 
											 WHERE t.donor_id = d.id AND t.child_id = c.id
											 AND t.type = :type',array(':type'=>$type));
		return $sth;

	}

	public function getDonation($id) {
		$sth = $this -> db -> fetchSingle('SELECT * FROM donations WHERE id = :id',array(':id'=>$id));
		return $sth;

	}

	public function getAllDonors() {
		$sth = $this -> db -> fetchAllAssoc('SELECT * FROM donors');
		return $sth;

	}

	public function getAllChilds() {
		$sth = $this -> db -> fetchAllAssoc('SELECT * FROM childs');
		return $sth;

	}
	public function getAllActivity() {
		$sth = $this -> db -> fetchAllAssoc('SELECT * FROM activity');
		return $sth;

	}
	public function getDonorDonation($id){
		$sth = $this -> db -> fetchAllAssoc('SELECT * FROM donations WHERE donor_id = :id',array(':id'=>$id));
		return $sth;
	}
	public function getDonor($id) {
		$sth = $this -> db -> fetchSingle('SELECT * FROM donors WHERE id = :id',array(':id'=>$id));
		return $sth;

	}


	public function insertRow($data) {
        
		$sth = $this -> db -> onlyExecute('INSERT INTO donations
        (`amount`,`type`,`donor_id`,`child_id`,`Notes`) VALUES 
        (:amount, :type, :donor_id, :child_id, :Notes)
			', array(':amount' => $data['amount'],':type' => $data['type'],':donor_id' => $data['donor_id'],':child_id' => $data['child_id'],':Notes' => $data['Notes']));
		if ($sth) {
			$this->Observetion("Inserted new Donations ... with Amount :".$data['amount']);
			return true;

		} else {
			return false;
        }
        
	}

	public function updateSingleDonation($id, $data) {

		$sth = $this -> db -> onlyExecute('UPDATE donations
			SET `amount` = :amount ,`type` = :type ,`donor_id` = :donor_id ,`child_id` = :child_id,`Notes` = :Notes
            WHERE id = :id', array(':id' => $id, ':amount' => $data['amount'],':type' => $data['type'],':donor_id' => $data['donor_id'],':child_id' => $data['child_id'],':Notes' => $data['Notes']));
		if ($sth) {
			$this->Observetion("Update Donation info ... ID :".$id);
			return true;
		} else {
			return false;
		}
	
	}

	public function deleteRow($id) {
		$sth = $this -> db -> onlyExecute('DELETE FROM donations WHERE id = :id', array(':id' => $id));
		if ($sth) {
			$this->Observetion("Delete Donation id :".$id);
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
