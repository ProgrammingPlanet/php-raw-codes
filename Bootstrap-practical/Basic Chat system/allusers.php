<?php
	session_start();
	if(!isset($_SESSION['Email']))
		header('location:index.php');
	$client = $_SESSION['Email'];
	$name = $_SESSION['Name'];
?>
<script type="text/javascript">
	var c = '<?php echo $client; ?>';
	var trace = '';
	function makeoffline(){
		$.ajax({
	 			url:'ajaxchat.php',type:'POST',data: { clnt :c },
	 			success:function(result){
	 				//alert(result);
	 				window.location.href = 'index.php';
				}
	 	});
	}
	window.onbeforeunload = function(){
		//makeoffline();
  		// Ajax request to update db here
	}
</script>
<!DOCTYPE html>
<html>
<head>
	<title>Login Or Sign Up | simplechat.com</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap4/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/animation.css">
	<script type="text/javascript" src="../bootstrap4/js/jquery-3.3.1.min.js"></script>
</head>
<body onload="fetchpersons();">
	<div class="container border">
		<br><br>
		<h1 class="text-center text-success">Simple Chat System in Bootstrap And Php</h1><br>
		<h1 class="text-center text-info">People On This chat System</h1><br>
		<div class="row border">
			<div class="col-lg-3 my-3 bg-success border" style="float:right;">
				<div class="float-left pt-1"><?php echo $name;?></div><input type="button" name="lgot" onclick="makeoffline();" class="btn btn-sm btn-danger float-right" value="Log Out">
			</div>
		</div>
		<div class="row">
			<div class="border col-xlg-9 col-lg-9 col-md-9 col-sm-9 col-xsm-9  m-auto" id="prsns">
				<div class="loader mx-auto mt-5"></div>
			</div>
			<script type="text/javascript">
				function fetchpersons(){
								$.ajax({
	 								url:'ajaxchat.php',type:'POST',data: { fetchpfs : c },
	 								success:function(result){
	 									//alert(result);
	 									$('#prsns').html(result);
									}
										
	 							});
							}
				function addfrnd(x){/*alert(x.id);*/
					$.ajax({ 
						url:'ajaxchat.php',type:'POST',data:{clt: c , mailid : x.id },
						success:function(result){//alert(result);
							x.style.color = 'green';
							x.innerHTML = 'Added...';
							x.disabled = 'disabled';
						}
					});	
				}
				function seeprofile(x){
					window.location.href = 'othersprofile.php?id='+x.id;
				}
			</script>
		</div>
	</div>
</body>
</html>

