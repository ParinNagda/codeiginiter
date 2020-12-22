<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

	<style type="text/css">

	</style>
</head>
<body>

<div class="container">
	<div class="row">
	<div class="col-sm-3"></div>
<div class="col-sm-6">
<form id="submitform" method="POST">
						<div class="mb-3 row">
							<label for="inputPassword" class="col-sm-2 col-form-label">First Name</label>
							<div class="col-sm-10">
							<input type="text" class="form-control" id="first_name" name="first_name">
							</div>
							<small class="first_nameerr"></small>
						</div>
						<div class="mb-3 row">
							<label for="inputPassword" class="col-sm-2 col-form-label">Last Name</label>
							<div class="col-sm-10">
							<input type="text" class="form-control" id="last_name" name="last_name">
							</div>
							<small class="last_nameerr"></small>
						</div>
							<div class="mb-3 row">
							<label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
							<div class="col-sm-10">
							<input type="text"  class="form-control-plaintext" id="email" value="" name="email">
							</div>
							<small class="emailerr"></small>
						</div>
						<div class="mb-3 row">
							<label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
							<div class="col-sm-10">
							<input type="password" class="form-control" id="password" name="password"> 
							</div>
							<small class="passworderr"></small>
						</div>
						<div class="mb-3 row">
							<select class="form-select" aria-label="Default select example" id= "role" name="role">
							<option value="">Role Type</option>
							<option value="1">Manager</option>
							<option value="2">Admin</option>
							<option value="3">Client</option>
							</select>
							<small class="roleerr"></small>
						</div>
						<div class="mb-3 row">
							<div class="col-sm-3"><button  id="addformbtn" class="btn btn-success btn-sm">Save</button></div>
							
						</div>
						
						</form>
</div>
<div class="col-sm-3"></div>
</div>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody id ="appendhere">
  
  </tbody>
</table>

				<!-- Modal -->
				<div class="modal " id="updatemodale" >
				<form id="updatefrom" method="post">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
					
						<div class="mb-3 row">
							<label for="inputPassword" class="col-sm-2 col-form-label">First Name</label>
							<div class="col-sm-10">
							<input type="text" class="form-control" id="input_firstname">
							</div>
						
						</div>
						<div class="mb-3 row">
							<label for="inputPassword" class="col-sm-2 col-form-label">Last Name</label>
							<div class="col-sm-10">
							<input type="text" class="form-control" id="input_lastname">
							</div>
						
						</div>
							<div class="mb-3 row">
							<label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
							<div class="col-sm-10">
							<input type="text"  class="form-control-plaintext" id="updateemail" value="">
							</div>
						
						</div>
						<div class="mb-3 row">
							<label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
							<div class="col-sm-10">
							<input type="password" class="form-control" id="inputPassword">
							</div>
							
						</div>
						<div class="mb-3 row">
							<select class="form-select" aria-label="Default select example" id= "inputrole">
							<option selected>Role Type</option>
							<option value="1">Manager</option>
							<option value="2">Admin</option>
							<option value="3">Client</option>
							</select>
							
						</div>
						<div class="mb-3 row">
							<input type="hidden" id="hiddenid">
						<button  id="updatefrombtn" class="btn btn-success btn-sm">Save</button>
						</div>
					</div>
				
					</div>
				</div>
				</form>
				</div>
				<!-- Modal end -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script>
$(document).ready(function(e){
	$(window).on('load',function(){
		$.ajax({
			url : '<?php echo base_url("welcome/get_data")?>',
			data : 1,
			type : 'POST',
			dataType : 'json',
			success : function(data){
				var append = '';
				if(data.length > 1){
					for(let i = 0;i<data.length;i++){
						append = append + ' <tr><th scope="row">'+ Number(1+i) +'</th><td>'+data[i].first_name +' '+data[i].last_name +'</td><td>'+ data[i].email+'</td> <td><button class="btn btn-primary update_modal" id='+data[i].id+'>Update</button> <button class="btn btn-danger deleteval" id='+data[i].id+'>Delete</button></td></tr>';
					}
					$('#appendhere').append(append);
				}
			}
		});
	});


	$(document).on('click','.update_modal',function(e){
		e.preventDefault();
		$('#updatemodale').modal('show');
		$('#input_firstname').val('');
				$('#input_lastname').val('');
				$('#inputPassword').val('');
				$('#inputrole').val();
				$('#updateemail').val();
		var a = $(this).attr('id');
		$.ajax({
			url : '<?php echo base_url("welcome/get_data/")?>'+ a +'/',
			type : 'POST',
			dataType : 'json',
			success : function(data){
				console.log(data);
				$('#input_firstname').val(data.first_name);
				$('#input_lastname').val(data.last_name);
				$('#inputPassword').val(data.password);
				$('#inputrole').val(data.role_type);
				$('#updateemail').val(data.email);
				$('#hiddenid').val(a);
			}
		})	
	})

	$(document).on('click','.deleteval',function(e){
		e.preventDefault();
		var a = $(this).attr('id');
		$.ajax({
			url : '<?php echo base_url("welcome/delete_user/")?>'+ a +'/',
			type : 'POST',
			dataType : 'json',
			success : function(data){
				console.log(data);
				alert(data.message);
				window.location.reload();
			}
		})	
	})

	
})

$('#submitform').on('submit',function(e){
		e.preventDefault();
		console.log(new FormData(this));
		
		$.ajax({
			url : '<?php echo base_url("welcome/post_user")?>',
			type  : 'POST',
			data : new FormData(this),
			dataType : 'json',
			processData: false,
			contentType: false,
			success : function(data){
				console.log(data.is_valid);
				if(!data.is_valid){
					$.each(data.data,function(key,val){
						console.log('.' + key);
						$('.' + key).html(val);
					})
				}else{
					var a = JSON.parse(data.data);
					alert(a.message);
					window.location.reload();					
				}
			}
		});
	});

$('#updatefrombtn').on('click',function(e){
			var first_name = $('#input_firstname').val();
			var last_name =	$('#input_lastname').val();
			var password =$('#inputPassword').val();
			var role_type =$('#inputrole').val();
			var email =$('#updateemail').val();
			var id =$('#hiddenid').val();
		
	e.preventDefault();
		$.ajax({
			url : '<?php echo base_url("welcome/put_user")?>',
			type  : 'POST',
			data : {id:id,first_name:first_name,last_name:last_name,password:password,email:email,role_type:role_type},
			dataType : 'json',
			success : function(data){
				console.log(data.is_valid);
				if(!data.is_valid){
					$.each(data.data,function(key,val){
						console.log('.' + key);
						$('.' + key).html(val);
					})
				}else{
					var a = JSON.parse(data.data);
					alert(a.message);
					window.location.reload();					
				}
			}
		});
});
</script>


</body>
</html>