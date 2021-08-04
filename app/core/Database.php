<?php

class Database{
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $db_name = DB_NAME;

	private $dbh;
	private $stmt;

	public function __construct(){
		// data source name
		$dsn = 'mysql:host='. $this->host .';dbname='. $this->db_name;
		$option  = [
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		];

		try{
			$this->dbh = new PDO($dsn, $this->user , $this->pass, $option);
		} catch(PDOException $e){
			dir($e->getMessage());
		}
	}

	public	function query($query){
		$this->stmt = $this->dbh->prepare($query);
	}

	public function bind($param, $value, $type = NULL){
		if ($type === NULL){
			switch (true){
				case is_numeric($value) :
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value) :
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value) :
					$type = PDO::PARAM_NULL;
					break;
				case is_string($value) :
					$type = PDO::PARAM_STR;
					break;
			}
		}
		//var_dump($value);
		//if(is_numeric($value)){echo 'aaaaaaaaaaa';}

		//$type = PDO::PARAM_INT;

		$this->stmt->bindValue($param, $value, $type);
	}

	public function execute(){
		$this->stmt->execute();
	}

	public function resultSet(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function single(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function rowCount(){
	return $this->stmt->rowCount();
	}

}




?>