<?php
/**
 * Implement a db wrapper if needed
 * 
 */
class Database 
{
	private $db;
	public function __construct()
	{
		$this->db=new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"));

		
	}
	

	function fetchAllAssoc($sql, $bindData=null) {

		$sth = $this -> db -> prepare($sql);

		$sth -> execute($bindData);
		
		return $sth -> fetchAll(PDO::FETCH_ASSOC);

	}

	function fetchSingle($sql, $bindData=null) {

		$sth = $this -> db -> prepare($sql);

		$sth -> execute($bindData);

		return $sth -> fetch();

	}

	public function onlyExecute($sql, $bindData=null) {
			
		$sth = $this -> db -> prepare($sql);

		return $sth -> execute($bindData);

	}
	 
}
