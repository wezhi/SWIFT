<?php
//require_once("Snow.php");
require_once("Frost.php");

$db = new dbPdo('mysql:host=120.25.69.157;dbname=cailanzi','root','6RMPKLamQ7rajAZb');
$db->hello();
//$db = new PDO('mysql:host=120.25.69.157;dbname=cailanzi','root','6RMPKLamQ7rajAZb');
//var_dump($db);
$sql = "select fareaid,fareaname,fareaorder from ecs_sf_area";
$rows = $db->getAll($sql);
foreach ($rows as $rw){
	echo $rw['fareaid'].':'.$rw['fareaname'].':'.$rw['fareaorder']."\n";
}