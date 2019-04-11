<!DOCTYPE html>
<html>
<head>
	<title>Data Saver</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container border">
		<header>
			<div style="height: 100px;" class="h-2 border bg-dark"></div><br><br>
		</header>
			<ul class="nav nav-tabs nav-justified">
				<li class="nav-item">
					<a href="#Stored" class="nav-link active" data-toggle="tab"> Stored </a>
				</li>
				<li class="nav-item">
					<a href="#Upload-Now" class="nav-link" data-toggle="tab"> Upload </a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="Stored"><br><br><br>
					<h1 class="text-center text-info">Your Stored Data</h1><br>
					<div id="main" class="border">
					<?php

						include_once('dbcon.php');
						$q = "SELECT * from datasaver order by id desc";
						$result = mysqli_query($con,$q);
						while($row = mysqli_fetch_array($result)){
							$title = $row['Title']; $data = $row['data']; $datetime = $row['date_time']; $day = $row['day'];
							echo '
							<div class="border">
								<div class="d-block col-lg-3  float-left">'.$title.'</div>
								<div class="col-lg-3 float-right">'.$day."<br>".$datetime.'</div><br
								><br><hr><br>
								<div id="data" class="container ">'.$data.'
								</div><br>
							</div><br>';
						}


					?>

					
						
					</div>
				</div>
				<div class="tab-pane" id="Upload-Now"><br><br>
					<div id="status" class="col-md-6 mx-auto text-center"></div><br>
					<h1 class="text-center text-info">Upload Now</h1><br>
					<div class="col-md-6 mx-auto">
                        <div class="form-group">
                            <input type="text" id="title" class="form-control" placeholder="Title of Post" onfocus="hide('status');" />
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="datatext" placeholder="Your Data" style="width: 100%; height: 350px;" onfocus="hide('status');"></textarea>
                        </div><br>
                        <div class="form-group">
                            <input type="submit" id="submit" class="btn btn-primary btn-lg btn-block btn-huge" value=" Upload " onclick="submit();" />
                        </div><br><br>
                    </div>
				</div>

	</div>
</body>
</html>

<script type="text/javascript">
	function hide(id){
		$("#"+id).hide();
	}
	function submit(){
		$("#status").show();
		$('#status').html('<img src="loading.gif" height="40"/>');
		document.getElementById("submit").value = "Uploading...";
		var title = document.getElementById("title").value;
		var data = document.getElementById("datatext").value;
		
		$.ajax({
	 			url:'Ajax.php',type:'POST',data: { title : title, data: data ,insert: 'y'},
	 			success:function(result){
	 				document.getElementById("submit").value = "Upload";
	 				if(result=='1'){
	 					$('#status').html('<p class="bg-success">Data Upload successfully</p>');	
	 				} 
	 				else{
	 					$('#status').html('<p class="bg-danger text-white">somthing went wrong. Try Again.</p>');
	 				}

				}
	 	});
	}

</script>		
			
		
