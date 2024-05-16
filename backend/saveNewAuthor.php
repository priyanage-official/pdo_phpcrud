<?php require '../database/connection.php';

	session_start();
	if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
		$author_id = $_POST['author_id'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$emailId = $_POST['email_id'];
		$dob = $_POST['dob'];
		if($author_id != '' || ($first_name !='' && $last_name !='' && $emailId !='' && $dob !='')){
			
			if($author_id != ''){
				$statement = $conn->prepare("UPDATE authors SET first_name = :first_name, last_name = :last_name, email = :email,birthdate = :birthdate WHERE id = :id");
						
				$statement->bindParam(':id', $author_id, PDO::PARAM_INT);
				$statement->bindParam(':first_name', $first_name);
				$statement->bindParam(':last_name', $last_name);
				$statement->bindParam(':email', $emailId);
				$statement->bindParam(':birthdate', $dob);
				$statement->execute();
				
				if(!empty($author_id)){
					$_SESSION['status'] = "Sucessfully Updated!";
				}else{
					$_SESSION['status'] = "Not Successful!";
				}
			}else{
				$checkIfExist = $conn->prepare("SELECT * FROM authors WHERE email = :email");
				$checkIfExist->bindParam(':email', $emailId);
				$checkIfExist->execute();
				
				$authorCount = $checkIfExist->fetch(PDO::FETCH_ASSOC);
				
				if($authorCount){
					$_SESSION['status'] = "Author Already Exist!";
					header("Location:http://localhost/pdo_phpcrud/");
				}
				
				$statement = $conn->prepare("INSERT INTO authors (first_name,last_name,email,birthdate)
			            VALUES (:first_name,:last_name,:email,:birthdate)");
						
				$statement->execute([
					':first_name' => $first_name,
					':last_name' => $last_name,
					':email' => $emailId,
					':birthdate' => $dob,
				]);
				
				$author_id = $conn->lastInsertId();
				
				if(!empty($author_id)){
					$_SESSION['status'] = "Sucessfully Created!";
				}else{
					$_SESSION['status'] = "Not Successful!";
				}
			}
			
		}else{
			$_SESSION['status'] = "Please Enter All Fields!";
		}
	}

	header("Location:http://localhost/pdo_phpcrud/");