s<!-- Modal -->
	<div class="modal fade" id="deletePostModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <form action="backend/deletePost.php" method="POST" name="deletePost" id="deletePostForm">
			  <div class="modal-header" style="background: #e60000;color: white;padding: 5px;">
				<h5 class="modal-title" id="exampleModalLabel">Delete Author</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
			  <div class="modal-body">
				<div class="rows">
					<p>Do you want to delete this post?</p>
				</div>
			  </div>
			  <div class="modal-footer p-1">
				<input type="hidden" name="post_id" id="dpost_id" />
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" name="submit" class="btn btn-primary" value='Submit'>Save</button>
			  </div>
		  </form>
		</div>
	  </div>
	</div>