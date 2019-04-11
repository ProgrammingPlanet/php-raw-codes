<!DOCTYPE html>
<html>
<head>
	<title>Auto Refresh</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<style type="text/css">.p{height:40px;width:200px;border-radius: 5px;}</style>
	<script type="text/javascript">
		var urls = ['https://www.facebook.com/','https://twitter.com/','https://in.yahoo.com/','https://www.youtube.com/','https://www.amazon.com/','https://www.flipkart.com/'];
	</script>
</head>
<body><br><br><br><br><br><br><br><br><br><br>

	<div class="container">
		<div align="center" >
			<iframe src="http://wordpress.com/" id="frame">
			</iframe>
		</div>
	</div>
	<script type="text/javascript">
		//document.getElementById('frame').src = urls[0];
		function validate(){
			var x = document.getElementById('n').value;
			if(x=='' || x<=0){
				alert('Enter A valid postive Nonzero Number');
				return false;
			}
		}
		//setInterval( f1 , 1000 );
		var v = 0;			
			function f1(){
				document.getElementById('frame').src = urls[v++];
				if(v>5) v = 0;
			}
		
	</script>
</body>
</html>
