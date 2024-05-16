<!-- Modal -->
	<div class="modal fade" id="createPostModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <form action="backend/saveNewPost.php" method="POST" name="createPost" id="createPostForm">
			  <div class="modal-header" style="padding: 5px;background: #06377e;color: white;">
				<h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
			  <div class="modal-body">
				<div class="rows">
					<div class="mb-3" id="selectAuthorDiv">
						<label for="selectAuthor" class="form-label">Select Author</label>
						<select class="form-select" name="author_id" id="selectAuthor">
						  <option selected>--Select Author--</option>
						  <?php foreach($getAllAuthors as $author) : ?>
						  <option value="<?= $author['id']; ?>"><?= $author['first_name']; ?></option>
						  <?php endforeach; ?>
						</select>
					</div>
					<div class="mb-3">
						<label for="inputTitle" class="form-label">Title</label>
						<input type="text" class="form-control" name="title" id="inputTitle">
					</div>
					<div class="mb-3">
					  <label for="inputDescription" class="form-label">Description</label>
					  <textarea class="form-control" name="description" rows="5" id="inputDescription"></textarea>
					</div>
				</div>
			  </div>
			  <div class="modal-footer">
				<input type="hidden" name="post_id" id="post_id" />
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" name="submit" class="btn btn-primary" value='Submit'>Save</button>
			  </div>
		  </form>
		</div>
	  </div>
	</div>