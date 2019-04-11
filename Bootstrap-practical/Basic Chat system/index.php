<?php 
	session_start();
	if(isset($_SESSION['Email']))
		header('location:chatpage.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Or SignUp</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap4/css/bootstrap.min.css">
</head>
<body>

	<div class="container">
		<br><br><br>
		<h2 class="text-center"> User Login & Sign Up</h2><br><br><br>
 		<div class="row">
 			<div class="col-xlg-8 col-lg-8 col-md-8 col-sm-12 col-12 border">
 				<form method="post" method="post" enctype="multipart/form-data">
 					<div class="row">
	 					<div class="form-group col-lg-5 mx-auto"><br>
	 						<label for="nam">Full Name:</label>
	 						<input type="text" name="nm" class="form-control" id="nam">
	 					</div>
	 					<div class="form-group col-lg-5 mx-auto"><br>
	 						<label for="mail">Email:</label>
	 						<input type="text" name="Email" class="form-control" id="mail">
	 					</div>
	 				</div>
	 				<div class="row">
	 					<div class="form-group col-lg-5 mx-auto ">
	 						<label for="pass">New Password:</label>
	 						<input type="Password" name="passwd" class="form-control" id="pass">
	 					</div>
	 					<div class="form-group col-lg-5 mx-auto mt-2">
	 						<div class="pb-2">
	 							&emsp;Gender:&emsp;
		 						<div class="form-check-inline col-lg-7 my-auto">
								  <label class="form-check-label">
								    <input type="radio" class="form-check-input" value="Male" name="optradio">Male
								  </label>&emsp;
								  <label class="form-check-label">
								    <input type="radio" class="form-check-input" value="Female" name="optradio">Female
								  </label>
								</div>
								<div class="form-control mt-1">
									BirthDay:&nbsp;<input type="date" class="text-center" placeholder="dd-mm-yyyy" name="dob">
								</div>
							</div><br>
	 					</div>		
	 				</div>
	 				<div class="m-auto col-lg-6">Upload Pic:<input type="file" name="flnm" class="btn btn-info text-center" /></div><br><br>
	 				<input type="submit" class="btn btn-success mx-auto d-block" name="signup_submt" value="Sign Up">
 				</form>
 			</div><br><br><br>
 			<div class="m-auto border col-xlg-3 col-lg-3 col-md-3 col-sm-8 col-8"><br>
 				<form method="post" action=''>
 					<div class="form-group">
 						<label for="E_id">Email: </label>
 						<input type="text" class="form-control" name="email" id="E_id" >
 					</div>
 					<div class="form-group">
 						<label for="P_id">Password: </label>
 						<input type="Password" class="form-control" name="pass" id="P_id" >
 					</div><br>
 					<input type="submit" class="btn btn-success d-block m-auto" name="login_submt" value="Log In">
 				</form>
 			</div>

 		</div>

	</div>


	<script type="text/javascript">
		//window.location.href = 'chatpage.php';
	</script>
</body>
</html>
<?php 
	if(isset($_REQUEST['login_submt'])){

		$mail = $_REQUEST['email'];
		$pass = $_REQUEST['pass'];

		include_once('dbcon.php');
		$q = "SELECT * FROM user";
		$result = mysqli_query($con,$q);
		while($row = mysqli_fetch_array($result)){
			if($row['Email'] == $mail && $row['Password'] == md5($pass)){
				$q = "UPDATE user SET status='1' WHERE Email='$mail'";
				mysqli_query($con,$q);
				mysqli_close($con);
				$_SESSION['Email'] = $row['Email'];
				$_SESSION['Name'] = $row['FullName'];
				header('location:chatpage.php');
			}
		}
		echo "<script>alert('Email or Password was wrong ! Try Again');</script>";

	}

	if(isset($_REQUEST['signup_submt'])){

		$name = $_REQUEST['nm'];
		$mail = $_REQUEST['Email'];
		$pass = md5($_REQUEST['passwd']);
		$dob = $_REQUEST['dob'];
		$gender = $_REQUEST['optradio'];
		if($_FILES){	  
    		$fname=$_FILES['flnm']['name'];
    		$fext = substr($fname,-3);
    		mkdir('users/'.$mail);
    		$fname = "dp.$fext";
    		$dppath = "users/$mail"."/$fname";
			move_uploaded_file($_FILES['flnm']['tmp_name'],$dppath);		
			include_once('functions.php');
			compress($dppath,"PersonsDp/$mail".'dp'.".jpg",5);
   		}
   		else $fname = 'none';
		include_once('dbcon.php');
		$q = "INSERT INTO user (FullName,Email,DOB,Password,Gender,status) VALUES ('$name','$mail','$dob','$pass','$gender','1')";
		$r1 = mysqli_query($con,$q);
		$q = "INSERT INTO userprofile (Email,Dp_Cover_img,FriendList) VALUES ('$mail','$fname','')";
		$r2 = mysqli_query($con,$q);
		if($r1 && $r2){
			$_SESSION['Email'] = $mail;
			$_SESSION['Name'] = $name;
			header('location:chatpage.php');
		}
		else
			echo "<script>alert('Something Went wrong ! Try Again');</script>";
  	}

?>