<?php require '../database/connection.php';

	session_start();
	if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
		$post_id = $_POST['post_id'];
		$author_id = $_POST['author_id'];
		$title = $_POST['title'];
		$description = $_POST['description'];
		$todayDate = date("Y-m-d");
		if($post_id != '' || ($author_id !='' && $title !='' && $description !='' && $todayDate !='')){
			
			if($post_id != ''){
				$statement = $conn->prepare("UPDATE posts SET title = :title, description = :description WHERE id = :id");
						
				$statement->bindParam(':id', $post_id, PDO::PARAM_INT);
				$statement->bindParam(':title', $title);
				$statement->bindParam(':description', $description);
				$statement->execute();
				
				if(!empty($post_id)){
					$_SESSION['status'] = "Sucessfully Updated!";
				}else{
					$_SESSION['status'] = "Not Successful!";
				}
			}else{
				$checkIfExist = $conn->prepare("SELECT * FROM posts WHERE title = :title");
				$checkIfExist->bindParam(':title', $title);
				$checkIfExist->execute();
				
				$postCount = $checkIfExist->fetch(PDO::FETCH_ASSOC);
				
				if($postCount){
					$_SESSION['status'] = "Post Already Exist!";
					header("Location:http://localhost/pdo_phpcrud/");
				}
				
				$statement = $conn->prepare("INSERT INTO posts (author_id,title,description,date)
			            VALUES (:author_id,:title,:description,:date)");
						
				$statement->execute([
					':author_id' => $author_id,
					':title' => $title,
					':description' => $description,
					':date' => $todayDate
				]);
				
				$post_id = $conn->lastInsertId();
				
				if(!empty($post_id)){
					$_SESSION['status'] = "Post Sucessfully Created!";
				}else{
					$_SESSION['status'] = "Not Successful!";
				}
			}
			
		}else{
			$_SESSION['status'] = "Please Enter All Fields!";
		}
	}

	header("Location:http://localhost/pdo_phpcrud/");