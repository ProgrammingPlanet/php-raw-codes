<?php
	$con = mysqli_connect('localhost','root');
	mysqli_select_db($con,'formdb');
?>
<html>
	<head>
		<title>Ajax</title>	
		<script  type="text/javascript" src="jquery-3.3.1.min.js"></script>
			
	</head>
	<body>
	 	<div>
	 		<h1>get data from Database</h1>
	 		<form>
	 			UserName: <input type="text" name=""/><br><br>
	 			Password: <input type="text" name=""/><br><br>
	 			Degree: <select onchange="fun(this.value);"> <!-- passing value of this block -->
	 						<option>Select</option>
	 						<?php
	 							$q = "select * from degree";
	 							$result = mysqli_query($con,$q);
	 							while($rows = mysqli_fetch_array($result)){
	 							?>
	 							<option value="<?php echo $rows['mid'];?>"><?php echo $rows['degrees'];?></option>
	 							<?php
	 							}
	 						?>
	 					</select><br><br>
	 			Year: <select id="s2">
	 						<option>Select</option>
	 					</select>
	 		</form>
	 	</div>
	 	<script type="text/javascript">
	 		function fun(datavalue){alert("success");
	 			$.ajax({
	 					url:'ajaxdata.php',type:'POST',data: { namevalue : datavalue }, /*datapost is value of name attribute only*/
	 					success:function(result){ //result varible contain responce data in case of three above statement succesfull
	 						$('#s2').html(result);

	 					}
	 			});
	 		}
	 	</script>
	</body>
</html>