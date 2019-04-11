<!DOCTYPE html>
<html>
<head>
	<title>Auto Refresh</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<style type="text/css">.p{height:40px;width:200px;border-radius: 5px;}</style>
</head>
<body><br><br><br><br><br><br><br><br><br><br>

	<div class="container">
		<div align="center" >
			<form action="page1.php" onsubmit=" return validate();">
				<label>Enter Time Delay(in seconds): </label> <input type="number"  name="v" class="p" id="n" fontsize="50">
				<input type="submit" class="p" value=" Go ">
			</form>
		</div>
	</div>
	<script type="text/javascript">
		function validate(){
			var x = document.getElementById('n').value;
			if(x=='' || x<=0){
				alert('Enter A valid postive Nonzero Number');
				return false;
			}
		}
		
	</script>
</body>
</html>
