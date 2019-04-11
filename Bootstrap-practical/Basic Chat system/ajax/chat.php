<?php
	
	if($_REQUEST['opreation']){
		$opreations = $_REQUEST['opreation'];
	}
	else{
		$opreations = '';
	}

	include_once('../dbcon.php');

	if($opreations=='active_persons'){	/*return active friends*/
		$source = $_REQUEST['source'];
		$destination = $_REQUEST['destination'];
		$q = "SELECT * FROM userprofile WHERE Email='$source'";
		$result = mysqli_query($con,$q);
		$row = mysqli_fetch_array($result);//because only one match row
		$frndlst = []; //declare an empty array
		$frndstr = $row['FriendList'];
		$frndlst = explode(',',$frndstr); //collect comma seprated element in array 
		$q = "SELECT * FROM user WHERE status='1'";
		$result = mysqli_query($con,$q);
		while($row = mysqli_fetch_array($result)){
			if(in_array($row['Email'],$frndlst)){
				if($destination == $row['Email'])
					echo '<input type="radio" class="form-check-input" name="actvfrnd" value="'.$row['Email'].'" checked>'.$row['FullName'].'<br>';
				else
					echo '<input type="radio" class="form-check-input" name="actvfrnd"  value="'.$row['Email'].'" onclick="updateserver(this.value);dsbl_enbl();">'.$row['FullName'].'<br>';
			}		
		}
	}

	if($opreations=='')


?>