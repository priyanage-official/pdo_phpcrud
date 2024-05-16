<?php 
require("backend/fetchAllAuthors.php"); 
require("backend/fetchAllPosts.php"); 
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css" rel="stylesheet" />
	
    <title>PHP CRUD(PDO)</title>
  </head>
  <body>
  
    <?php if(isset($_SESSION['status'])) { ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Hey !</strong> <?= $_SESSION['status']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    <?php unset($_SESSION['status']); } ?>
    <div class="container-fluid mt-3">
		<div class="card">
			<div class="card-body">
				<ul class="nav nav-tabs" role="tablist">
				  <li class="nav-item" role="presentation">
					<a class="nav-link active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">Author List</a>
				  </li>
				  <li class="nav-item" role="presentation">
					<a class="nav-link" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">Post List</a>
				  </li>
				</ul>
				<div class="tab-content pt-2" id="tab-content">
				  <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
					<div class="row">
						<div style="text-align: end;margin-bottom: 8px;">
							<button type="button" class="btn btn-primary text-right" onclick="resetAuthorForm()">
								Create Author
							</button>
						</div>
						<div class="card">
							<div class="card-header">
								<h3 class="text-center">Author List</h3>
							</div>
							<div class="card-body">
								<table id="example" class="table table-striped table-hover">
								  <thead>
									<tr>
									  <th scope="col">Sr No.</th>
									  <th scope="col">First Name</th>
									  <th scope="col">Last Name</th>
									  <th scope="col">Email</th>
									  <th scope="col">DOB</th>
									  <th scope="col">Action</th>
									</tr>
								  </thead>
								  <tbody>
								  <?php foreach($getAllAuthors as $key => $author) : ?>
									<tr>
									  <th scope="row"><?= $key+1 ?></th>
									  <td><?= $author['first_name']; ?></td>
									  <td><?= $author['last_name']; ?></td>
									  <td><?= $author['email'];  ?></td>
									  <td><?= $author['birthdate']; ?></td>
									  <td>
										<button type="button" class="btn btn-info text-right updateAuthor" data-id="<?= $author['id'];?>">
											Update
										</button>
										<button type="button" class="btn btn-danger text-right deleteAuthorForm" data-id="<?= $author['id'];?>">
											Delete
										</button>
									  </td>
									</tr>
								   <?php endforeach; ?>
								  </tbody>
								</table>
							</div>
						</div>
					</div>
				  </div>
				  <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
					  <div class="row">
							<div style="text-align: end;margin-bottom: 8px;">
								<button type="button" class="btn btn-primary text-right" onclick="resetPostForm()">
									Create Post
								</button>
							</div>
							<div class="card">
								<div class="card-header">
									<h3 class="text-center">Post List</h3>
								</div>
								<div class="card-body">
									<table id="example2" class="table table-striped table-hover w-100">
									  <thead>
										<tr>
										  <th scope="col">Sr No.</th>
										  <th scope="col">Author</th>
										  <th scope="col">Title</th>
										  <th scope="col">Description</th>
										  <th scope="col">Post Date</th>
										  <th scope="col">Action</th>
										</tr>
									  </thead>
									  <tbody>
										<?php foreach($getAllPosts as $pkey => $post) : ?>
										<tr>
										  <th scope="row"><?= $pkey+1 ?></th>
										  <td><?= $post['author_name']; ?></td>
										  <td><?= $post['title']; ?></td>
										  <td><?= $post['description']; ?></td>
										  <td><?= $post['date']; ?></td>
										  <td>
											<button type="button" class="btn btn-info text-right updatePost" data-id="<?= $post['id'];?>">
												Update
											</button>
											<button type="button" class="btn btn-danger text-right deletePostForm" data-id="<?= $post['id'];?>">
												Delete
											</button>
										  </td>
										</tr>
									   <?php endforeach; ?>
									  </tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
    

    <!-- Optional JavaScript; choose one of the two! -->
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	

	<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
	<script src="js/app.js"></script>
	
	<?php require "modals/createAuthor.php"; ?>
	<?php require "modals/deleteAuthor.php"; ?>
	<?php require "modals/createPost.php"; ?>
	<?php require "modals/deletePost.php"; ?>
	
  </body>
</html>
