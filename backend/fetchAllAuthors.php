<?php require './database/connection.php';

$statement = $conn->query('SELECT * FROM authors ORDER BY id desc');

$getAllAuthors = $statement->fetchAll(PDO::FETCH_ASSOC);


