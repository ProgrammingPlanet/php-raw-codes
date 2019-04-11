<?php
	$con=mysqli_connect('localhost','root','','chat');
	if($con)
		{//echo '<script>alert("Connected To Database succesfully");</script>';
	}
	else
		{echo '<script>alert("Error! Not Connected To Database");</script><style type="text/css">*{display:none;}</style>';}
?>

