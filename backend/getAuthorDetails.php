<?php require '../database/connection.php';

if(isset($_GET['aid']) && $_SERVER['REQUEST_METHOD'] == 'GET'){
	
	$statement = $conn->prepare('SELECT * FROM authors WHERE id = :aid');
	$statement->bindParam(':aid', $_GET['aid'], PDO::PARAM_INT);
	$statement->execute();
	
	$getDetail = $statement->fetch(PDO::FETCH_ASSOC);
	
	echo json_encode(['status' => 200, 'message' => 'Found', 'data' => $getDetail]);
}else{
	echo json_encode(['status' => 404, 'message' => 'Not found']);
}

