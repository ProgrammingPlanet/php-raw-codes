<!DOCTYPE html>
<html>
<head>
	<title>Online php interprater</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="codehighlight/prism.css">
</head>
<body>
	<div class="container border border-success"><br>
		<div class="row border bg-danger">
			<br><br><br><br><br>
		</div>
		<div class="row border">
			<textarea id="code" rows="15" class="col-lg-10 m-auto"></textarea>
		</div><br>
		<div class="row">
			<div class="border m-auto col-lg-5"><textarea id="stdin" rows="7" class="float-right col-lg-8"></textarea></div>
			<div class="border m-auto col-lg-5">
				<div class="btn btn-info" onclick="run();">&emsp;Run&emsp;</div>
			</div>
		</div><br>
		<div class="row">
			<div class="col-lg-8 border mx-auto" id="output"><br>output go here<br><br></div>
		</div>
	</div>

	<script src="codehighlight/prism.js"></script>
	<script type="text/javascript">
		function run(){
			var c = $('#code').val();
			var sin = $('#stdin').val();
			//alert(c);
			$.ajax({
				url: 'runcode.php', TYPE: 'POST', data:{ code : c , stdin : sin},
				success:function(result){
					$('#output').html(result);
				} 
			});
		}
	</script>
</body>
</html>


<br><br><br><br><br><br>