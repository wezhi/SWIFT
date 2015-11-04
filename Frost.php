<?php
/**
 * Created by PhpStorm.
 * User: sfrost
 * Date: 15/11/5
 * Time: 上午12:16
 */
class dbPdo{
	private $pdo;
	function __construct($dsn,$u,$p) {
		try{
			$this->pdo = new PDO($dsn,$u,$p);
		}catch (PDOException $e){
			die("Can not link database server" . $e->getMessage());
		}
	}
	function hello(){
		var_dump($this->pdo);
	}
	function getAll($sql){
		return $this->pdo->query($sql);
	}
}