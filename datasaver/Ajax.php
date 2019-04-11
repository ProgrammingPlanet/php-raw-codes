<?php
	include_once("dbcon.php");

	if(isset($_REQUEST['insert'])){
		$title = $_REQUEST['title'];
		$data = $_REQUEST['data'];
		date_default_timezone_set('Asia/Kolkata');
		$datetime = date("d/m/Y H:i");
		$dayOfWeek = date("l", strtotime(date("Y-m-d")));
		$q = "INSERT INTO datasaver(Title,data,date_time,day) VALUES ('$title','$data','$datetime','$dayOfWeek')";
		echo mysqli_query($con,$q);
	}




?>