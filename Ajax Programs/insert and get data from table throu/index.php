<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<h1 class="text-center"> Insert Data using AJAX PHP and MYSQL</h1>
		
		<form id="myform" action="insertphp.php" method="post">
			<div class="form-group">
				<label>Username:</label>
				<input type="text" name="username" class="form-control" required>				
			</div>
			<div class="form-group">
				<label>Password:</label>
				<input type="text" name="password" class="form-control" required>				
			</div>
			<input type="submit" id="submit" name="submit" class="btn btn-success">
		</form>
		
	</div>
	<div>
		<br><br>
		<h1 class="text-center">Data from database</h1><br> 
		<button id="get" class="btn btn-danger">Display </button><br>

		<table class="table table-striped table-bordred text-center">
			<thead>
				<th>ID</th>
				<th>Username</th>
				<th>Password</th>

			</thead>
			<tbody id="tb">
				
			</tbody>
		</table>
	</div>


	<script type="text/javascript">
		$(document).ready(function(){
			var form = $("#myform");
			$("#submit").click(function(){

				$.ajax({

					url: $("#myform").attr("action"),type:'post',
					data: $("#myform input").serialize(),
					success: function(recive){
						alert("success");
					}
				});
			});
		//getn data from database
		$("#get").click(function(){

			$.ajax({
				url:'display.php',
				type:'POST',
				success:function(response){
					$('#tb').html(response);
				}
			});
		});



		});
	</script>
</body>
</html>