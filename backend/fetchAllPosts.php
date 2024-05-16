<?php require './database/connection.php';


$statement = $conn->query('SELECT posts.*, CONCAT(authors.first_name, " " , authors.last_name) as author_name FROM posts 
				JOIN authors ON authors.id = posts.author_id ORDER BY posts.id DESC');

$getAllPosts = $statement->fetchAll(PDO::FETCH_ASSOC);
