<?php require '../database/connection.php';

if(isset($_POST['author_id']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
	
	session_start();
	$statement = $conn->prepare('SELECT * FROM authors WHERE id = :author_id');
	$statement->bindParam(':author_id', $_POST['author_id'], PDO::PARAM_INT);
	$statement->execute();
	
	$getDetail = $statement->fetch(PDO::FETCH_ASSOC);
	
	if(count($getDetail) > 0){
		$statement = $conn->prepare('DELETE FROM authors WHERE id = :author_id');
		$statement->bindParam(':author_id', $_POST['author_id'], PDO::PARAM_INT);
		$statement->execute();
	
		$_SESSION['status'] = "Deleted Successfully!";
	}else{
		$_SESSION['status'] = "Not Successfully!";
	}
	
}else{
	$_SESSION['status'] = "Not Valid Request!";
}

header("Location:http://localhost/pdo_phpcrud/");

