<?php
/**
 * Created by PhpStorm.
 * User: sfrost
 * Date: 15/11/5
 * Time: 上午12:16
 */
$dsn = 'mysql:host=120.25.69.157;dbname=cailanzi';
$ur = 'root';
$pw = '6RMPKLamQ7rajAZb';
try{
	$sfdb = new PDO($dsn,$ur,$pw);
	//不知道为什么，无效
//	$sfdb->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_SILENT);
}catch (PDOException $e){
	die('Connection failed: '.$e->getMessage());
}
