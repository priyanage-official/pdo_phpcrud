<?php require '../database/connection.php';

if(isset($_POST['post_id']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
	
	session_start();
	$statement = $conn->prepare('SELECT * FROM posts WHERE id = :post_id');
	$statement->bindParam(':post_id', $_POST['post_id'], PDO::PARAM_INT);
	$statement->execute();
	
	$getDetail = $statement->fetch(PDO::FETCH_ASSOC);
	
	if(count($getDetail) > 0){
		$statement = $conn->prepare('DELETE FROM posts WHERE id = :post_id');
		$statement->bindParam(':post_id', $_POST['post_id'], PDO::PARAM_INT);
		$statement->execute();
	
		$_SESSION['status'] = "Deleted Successfully!";
	}else{
		$_SESSION['status'] = "Not Successfully!";
	}
	
}else{
	$_SESSION['status'] = "Not Valid Request!";
}

header("Location:http://localhost/pdo_phpcrud/");

