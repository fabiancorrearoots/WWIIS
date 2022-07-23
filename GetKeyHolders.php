<?php

$host = "localhost";
$dbname = "test";
$database_user = "test";
$database_password = "";

$pdo = new PDO("mysql:host=$host;dbname=$dbname",$database_user,$database_password, 
	 array(
	 	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
	 	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_NUM, 
	 	PDO::ATTR_AUTOCOMMIT => 1,
	 	PDO::ATTR_STRINGIFY_FETCHES => 1
	 ));

try{
	$query_str = "SELECT `name`, `key` FROM key_holders WHERE active = 1 ORDER BY `order` ASC";
	$query = $pdo->query($query_str);
	$contacts = $query->fetchAll();
	foreach($contacts as $contact){
		$telephone = $pdo->prepare("SELECT `telephone` FROM contact_details WHERE name = :name");
		$telephone->bindParam(':name', $contact[0], PDO::PARAM_STR);
		$telephone->execute();
		$telephone = $telephone->fetchColumn();
		print("Name = ".$contact[0]."<br> Telephone = ".$telephone."<br> Key = ".$contact[1]."<br>");
		print("----------------------------------<br>");	
	}
 } 
 catch(Exception $exception){
	echo "An exception occurred!";
 	print_r($exception);
 }