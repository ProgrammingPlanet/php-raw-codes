<!DOCTYPE html>
<html>
<head>
	<title>Md5 Decrypter</title>
</head>
<body><br><br><br><br>
	<form action="" align="center">
		<input type="text" name="md5hash" placeholder="Enter your Md5 Hash">
		<input type="submit" value="Decrypt" name="submit">
		<input type="text" name="md5hash" id="pass" placeholder="Your Decrypted password go here..">
	</form><br><br><br><br><br><br><br><br>
	<form action="" align="center">
		<input type="text" name="pass1" placeholder="Enter password">
		<input type="submit" value="Encrypt" name="submit1">
		<input type="text" id="hash" placeholder="your Encrypted Hash">
		
	</form>
</body>
</html>

<?php
	if(isset($_REQUEST['submit1'])){
		echo "<script>document.getElementById('hash').value='';</script>";
		$pass1 = $_REQUEST['pass1'];
		$hash = md5($pass1);
		echo "<script>document.getElementById('hash').value='$hash';</script>";
	}
	if(isset($_REQUEST['submit'])){
		echo "<script>document.getElementById('pass').value='';</script>";
		$a = ['!maansari','moin@123','!Maansari525'];
		$flag = 0;
		$pass = $_REQUEST['md5hash'];
		for($i=0;$i<sizeof($a);$i++){
			if($pass==md5($a[$i])){
				echo "Decyription Successfull,Password is: $a[$i]";
				echo "<script>document.getElementById('pass').value='$a[$i]';</script>";
				$flag = 1;
				break;
			}
		}
		if(!$flag)
			echo 'Failed!,Not Matched';
	}
?>