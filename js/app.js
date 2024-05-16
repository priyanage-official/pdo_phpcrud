$( document ).ready(function() {
	new DataTable('#example');
	new DataTable('#example2');
			
	updateAuthor();
	deleteAuthor();
	updatePost();
	deletePost();
});

function resetAuthorForm(){
	document.getElementById("createAuthorForm").reset();
	$("#author_id").val('');
	$("#createAuthorModal").modal('show');
}

function resetPostForm(){
	document.getElementById("createPostForm").reset();
	$("#post_id").val('');
	$("#selectAuthorDiv").removeAttr('style');
	$("#createPostModal").modal('show');
}

//UPDATE AUTHOR
function updateAuthor(){
	$(function(){
		$(document).on('click','.updateAuthor', function(event){
			event.preventDefault();
					
			let aid = $(this).attr('data-id');
					
			$.ajax({
				url: "http://localhost/pdo_phpcrud/backend/getAuthorDetails.php?aid="+aid,
				method: 'GET',
				type: 'json',
				success:function(response){
					$("#createAuthorModal").modal('show');
					let result = JSON.parse(response);
					
					$("#inputFirstName").val(result.data.first_name);
					$("#inputLastName").val(result.data.last_name);
					$("#inputEmailID").val(result.data.email);
					$("#inputDOB").val(result.data.birthdate);
					$("#author_id").val(result.data.id);
				}
			});
		});
	});
}

function deleteAuthor(){
	$(function(){
		$(document).on('click','.deleteAuthorForm', function(event){
			event.preventDefault();
			let aid = $(this).attr('data-id');
			$("#dauthor_id").val(aid);
			$("#deleteAuthorModal").modal("show");		
		}); 
	});
}

//UPDATE POST
function updatePost(){
	$(function(){
		$(document).on('click','.updatePost', function(event){
			event.preventDefault();
					
			let pid = $(this).attr('data-id');
					
			$.ajax({
				url: "http://localhost/pdo_phpcrud/backend/getPostDetails.php?pid="+pid,
				method: 'GET',
				type: 'json',
				success:function(response){
					$("#selectAuthorDiv").attr('style','display:none;');
					
					$("#createPostModal").modal('show');
					let result = JSON.parse(response);
					
					$("#inputTitle").val(result.data.title);
					$("#inputDescription").val(result.data.description);
					$("#post_id").val(result.data.id);
				}
			});
		});
	});
}

//DELETE POST
function deletePost(){
	$(function(){
		$(document).on('click','.deletePostForm', function(event){
			event.preventDefault();
			let pid = $(this).attr('data-id');
			$("#dpost_id").val(pid);
			$("#deletePostModal").modal("show");		
		}); 
	});
}