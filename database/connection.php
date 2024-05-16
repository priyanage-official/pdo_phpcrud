<?php

$mysqldb="mysql:host=localhost;port=3306;dbname=pdo_phpcrud";
$username="root";

try{
	$conn = new PDO($mysqldb,$username);
}catch(Exception $e){
	echo "Connection error: " . $e->getMessage();
}

