<?php
/**
 * main page model example
 *
 * */
class Main_Model extends Model {
	public function __construct() {
		parent::__construct();
	}

	
	public function getLastNotification($count) {
		$sth = $this -> db -> fetchAllAssoc('SELECT * FROM observers ORDER BY id DESC LIMIT 5');
		return $sth;
	}

	public function getCountNotification() {
		$sth = $this -> db -> fetchSingle('SELECT Count(id) FROM observers  WHERE readed="0"');
		return $sth;
	}

	public function readAllNotification(){
		$sth = $this -> db -> onlyExecute('UPDATE observers	SET `readed` = 1  WHERE readed = "0"');
		if ($sth) {
			return true;
		} else {
			return false;
		}
	}


}
