<?php
/**
 * main page model example
 *
 * */
class User_Model extends Model {
	public function __construct() {
		parent::__construct();
	}

	public function getAllUsers() {
		$sth = $this -> db -> fetchAllAssoc('SELECT * FROM users');
		return $sth;

	}

	public function getAllDonationCash() {
		$sth = $this -> db -> fetchAllAssoc('SELECT * FROM donars WHERE DonationType="Cash"');
		return $sth;

	}

	public function getUser($id) {
		$sth = $this -> db -> fetchSingle('SELECT * FROM users WHERE id = :id',array(':id'=>$id));
		return $sth;

	}


	public function insertRow($data) {
        
		$sth = $this -> db -> onlyExecute('INSERT INTO users
        (`username`,`password`,`accType`) VALUES 
        (:username,:passwrod,:accType)
			', array(':username' => $data['username'],':passwrod' => $data['password'],':accType' => $data['accType']));
		if ($sth) {
			$this->Observetion("Inserted new User ... with name :".$data['username']);
			return true;

		} else {
			return false;
        }
        
	}

	public function updateSingleUser($id, $data) {

		$sth = $this -> db -> onlyExecute('UPDATE users
			SET `username` = :username ,`password` = :password ,`accType` = :accType 
            WHERE id = :id', array(':id' => $id, ':username' => $data['username'],':password' => $data['password'],':accType' => $data['accType']));
		if ($sth) {
			$this->Observetion("Update Users info ... for :".$data['name']);
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
		$sth = $this -> db -> onlyExecute('DELETE FROM users WHERE id = :id', array(':id' => $id));
		if ($sth) {
			$this->Observetion("Delete User id :".$id);
			return true;
		} else {
			return false;
		}
	}

}
