<?php
/**
 * main page model example
 *
 * */
class Child_Model extends Model {
	public function __construct() {
		parent::__construct();
	}

	public function getAllChilds() {
		$sth = $this -> db -> fetchAllAssoc('SELECT * FROM childs');
		return $sth;

	}

	public function getChild($id) {
		$sth = $this -> db -> fetchSingle('SELECT * FROM childs WHERE id = :id',array(':id'=>$id));
		return $sth;

	}


	public function insertRow($data) {
        
		$sth = $this -> db -> onlyExecute('INSERT INTO childs
        (`name`,`birthdate`, `status`) VALUES 
        (:name, :birthdate, :status)
			', array(':name' => $data['name'],':birthdate' => $data['birthdate'],':status' => $data['status']));
		if ($sth) {
			$this->Observetion("Inserted new Child ... with name :".$data['name']);
			return true;

		} else {
			return false;
        }
        
	}

	public function updateSingleChild($id, $data) {

		$sth = $this -> db -> onlyExecute('UPDATE childs
			SET `name` = :name ,`birthdate` = :birthdate ,`status` = :status 
            WHERE id = :id', array(':id' => $id, ':name' => $data['name'],':birthdate' => $data['birthdate'],':status' => $data['status']));
		if ($sth) {
			$this->Observetion("Update Child info ... for :".$data['name']);
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
		$sth = $this -> db -> onlyExecute('DELETE FROM childs WHERE id = :id', array(':id' => $id));
		if ($sth) {
			$this->Observetion("Delete Childs id :".$id);
			return true;
		} else {
			return false;
		}
	}

}
