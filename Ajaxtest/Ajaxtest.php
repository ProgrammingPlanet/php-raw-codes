<?php 
	$con = mysqli_connect('localhost','root');
	mysqli_select_db($con,'formdb');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ajax Test</title>
	<script  type="text/javascript" src="jquery-3.3.1.min.js"></script>
</head>
<body>
	<form>
		<input type="text" name="username"/><br><br>
		<input type="password" name=""><br><br>
 		City:<select onchange="fun(this.value);">
 			<option>select</option>
 			<?php 
 				$q = "select * from city";
 				$result = mysqli_query($con,$q);
 				while($rows=mysqli_fetch_array($result)){
 					?>
 					<option value="<?php echo $rows['Id']; ?>"><?php echo $rows['cityname'] ?></option>
 					<?php
 				}
 			?>
 		</select><br><br>
 		Place:<select id="place">
 				<option>Select</option>
 			  </select>
	</form>
	<script type="text/javascript">
		function fun(id){alert("success");
				$.ajax({
					url:'temp.php',type:'POST',data:{namevalue:id},
					success:function(result){
						$('#place').html(result);
					}
				});
		}
	</script>
</body>
</html>