<?php
//require_once("Snow.php");
//require_once("Frost.php");
$dsn = 'mysql:host=localhost;dbname=cdcol';
$ur = 'root';
$pw = '97';
try{
	$db = new PDO($dsn,$ur,$pw);
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
//	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e){
	die($e->getMessage());
}
var_dump($db);

//有try...catch时的事务处理
try{
	$db->beginTransaction();
	$sql = "insert into pdo VALUES (?,?,?)";
	$stmt = $db->prepare($sql);
	$stmt->execute(array(null,'a84',3));
	$stmt->execute(array(null,'a85',4));
	$stmt->execute(array(null,'a86',5));
	$db->commit();
}catch (PDOException $e){
	$db->rollBack();
	die($e->getMessage());
}


/** 预处理，直接绑定数据，执行 */
//$sql = "insert into pdo VALUES (?,?,?)";
//$stmt = $sfdb->prepare($sql);
////以数组的方式，比较实用些
//$res = $stmt->execute(array(null,'abc',33));
//if ($res){
//	echo $stmt->rowCount();
//}else{
//	echo $stmt->errorInfo();
//}




//
//$dsn = 'mysql:host=120.25.69.157;dbname=cailanzi';
//$ur = 'root';
//$pw = '6RMPKLamQ7rajAZb';
//try{
//	$pdb = new PDO($dsn,$ur,$pw);
//}catch (PDOException $e){
//	die('Connection failed: '.$e->getMessage());
//}
//
//
////$db = new PDO('mysql:host=120.25.69.157;dbname=cailanzi','root','6RMPKLamQ7rajAZb');
////$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_SILENT);
//var_dump($pdb);
//$id = 41;
//$sql = "select * from pdo where id = '$id'";
///*查询用query*/
//$rows = $pdb->query($sql);
//$record = $rows->fetch(PDO::FETCH_ASSOC);
//echo $record['name'];

