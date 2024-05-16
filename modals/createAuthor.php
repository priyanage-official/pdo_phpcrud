<!-- Modal -->
	<div class="modal fade" id="createAuthorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <form action="backend/saveNewAuthor.php" method="POST" name="createAuthor" id="createAuthorForm">
			  <div class="modal-header" style="padding: 5px;background: #06377e;color: white;">
				<h5 class="modal-title" id="exampleModalLabel">Create Author</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
			  <div class="modal-body">
				<div class="rows">
					<div class="mb-3">
						<label for="inputFirstName" class="form-label">First Name</label>
						<input type="text" class="form-control" name="first_name" id="inputFirstName">
					</div>
					<div class="mb-3">
						<label for="inputLastName" class="form-label">Last Name</label>
						<input type="text" class="form-control" name="last_name" id="inputLastName">
					</div>
					<div class="mb-3">
					  <label for="inputEmailID" class="form-label">Email ID</label>
					  <input type="email" class="form-control" name="email_id" id="inputEmailID">
					</div>
					<div class="mb-3">
					  <label for="inputDOB" class="form-label">Date Of Birth</label>
					  <input type="date" class="form-control" name="dob" id="inputDOB">
					</div>
				</div>
			  </div>
			  <div class="modal-footer">
				<input type="hidden" name="author_id" id="author_id" />
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" name="submit" class="btn btn-primary" value='Submit'>Save</button>
			  </div>
		  </form>
		</div>
	  </div>
	</div>