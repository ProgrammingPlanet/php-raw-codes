 <?php  
	/*for logout to user and make him offline*/
	if(isset($_REQUEST['clnt'])){
		session_start();
		$client = $_REQUEST['clnt'];
		include_once('dbcon.php');
		$q = "SELECT * FROM user";
		$result = mysqli_query($con,$q);
		while($row = mysqli_fetch_array($result)){
			if($client==$row['Email']){					
				$q = "UPDATE user SET status='0' WHERE Email='$client'";
				mysqli_query($con,$q);
				session_destroy();
			}
		}
		echo $client;
	}
?>

<?php
	/*return active friends*/
	if(isset($_REQUEST['clint'])){
		$client = $_REQUEST['clint'];
		$server = $_REQUEST['srvr'];
		include_once('dbcon.php');
		$q = "SELECT * FROM userprofile WHERE Email='$client'";
		$result = mysqli_query($con,$q);
		$row = mysqli_fetch_array($result);//because only one match row
		$frndlst = []; //declare an empty array
		$frndstr = $row['FriendList'];
		$frndlst = explode(',',$frndstr); //collect comma seprated element in array 
		$q = "SELECT * FROM user WHERE status='1'";
		$result = mysqli_query($con,$q);
		while($row = mysqli_fetch_array($result)){
			if(in_array($row['Email'],$frndlst)){
				if($server == $row['Email'])
					echo '<input type="radio" class="form-check-input" name="actvfrnd" value="'.$row['Email'].'"checked>'.$row['FullName'].'<br>';
				else
					echo '<input type="radio" class="form-check-input" name="actvfrnd"  value="'.$row['Email'].'" onclick="updateserver(this.value);dsbl_enbl();">'.$row['FullName'].'<br>';
			}		
		}
	}

?>
 
<?php 
/*to take chats for a client*/
	if(isset($_REQUEST['clent'])){
		$client = $_REQUEST['clent'];
		$server = $_REQUEST['server'];
		$dttm = 'none';
		if($server==''){
			exit($dttm.'~<script>dsbl_enbl();</script><h5 class="m-auto d-block  text-info">........Chats Go Here.......<br>Select an Active Friend</h5>');
		}
		include_once('dbcon.php');
		$i = -1; $clnt_srvr_msg = [];
		$sender = '';
		$q = "SELECT * FROM chatinfo";
		$result = mysqli_query($con,$q);
		while($row = mysqli_fetch_array($result)){
			if($client==$row['FromEmail'] && $server==$row['ToEmail']){
				$i++;					
				$msg = $row['chat_text'];
				$dttm = $row['date_time'];
				$date = substr($dttm,0,5);
				$clnt_srvr_msg[$i] = '<div class="row "><div class="bgme ml-auto col-lg-6 col-md-6 col-sm-6 col-10"> '.$msg.' <h6 class="text-right">'.$date.'</h6></div></div><br>';
				$sender = $client;
				
			}
			elseif($server==$row['FromEmail'] && $client==$row['ToEmail']){
				$i++;
				$msg = $row['chat_text'];
				$dttm = $row['date_time'];
				$date = substr($dttm,0,5);
				$clnt_srvr_msg[$i] = '<div class="row "><div class="bgfrnd col-lg-6 col-md-6 col-sm-6 col-10"> '.$msg.' <h6 class="text-right">'.$date.'</h6></div></div><br>';
				$sender = $server;
				$dttm = $row['date_time'];
			}
		}
		if(!isset($_REQUEST['nwct'])){echo $dttm.'~';
			?><div class=" col-sm-12 col-lg-10 col-md-10 m-auto " ><br><br><?php for($j=0;$j<sizeof($clnt_srvr_msg);$j++) echo $clnt_srvr_msg[$j]."<br>\n";?>
			</div><?php 
		}
		elseif($i!=-1)
			echo "$dttm"."~$sender".'~<div class="col-sm-12 col-lg-10 col-md-10 m-auto">'.$clnt_srvr_msg[$i]."\n</div>";
			
	}
?>

<?php
/*insert chat into database sended by a client*/
	if(isset($_REQUEST['msg'])){
		$client = $_REQUEST['client'];
		$server =$_REQUEST['server'];
		$chmsg = $_REQUEST['msg'];
		include_once('dbcon.php');
		$type = 'text';
		date_default_timezone_set('Asia/Kolkata');
		$datetime = date("H:i:s d-M-Y");//small and caps d,m,m have differ means	
		$q = "INSERT INTO chatinfo (FromEmail,ToEmail,chat_type,chat_text,date_time) VALUES ('$client','$server','$type','$chmsg','$datetime')";
		if(!mysqli_query($con,$q))
			echo mysqli_error($con);
		unset($chmsg);		
	}
	
?>

<?php
	if(isset($_REQUEST['fetchpfs'])){
		/*See all user*/
		$client = $_REQUEST['fetchpfs'];
		include_once('dbcon.php');
		$q = "SELECT * FROM userprofile WHERE Email='$client'";
		$result = mysqli_query($con,$q);
		$row = mysqli_fetch_array($result);//because only one match row
		$frndlst = []; //declare an empty array
		$frndstr = $row['FriendList'];
		$frndlst = explode(',',$frndstr);
		$q = "SELECT * FROM user";
		$result = mysqli_query($con,$q);
		while($row = mysqli_fetch_array($result)){
			if(in_array($row['Email'],$frndlst))
				{ $stat='disabled'; $cap="Added..." ; $class = 'btn-success';}
			else { $cap = 'Add Friend'; $stat = ''; $class = 'btn-info';}
			echo '
				<div class="row border">
					<div class="border m-auto" width="180" height="160">
						<img src="PersonsDp/'.$row['Email'].'dp.jpg'.'" class="mx-auto d-block border" width="180" height="160">
					</div>
					<div class=" col-lg-9 ">
						<ul class="list-group my-auto">
							<div class="row ">
								<li class="list-group-item border-0 col-lg-11 text-center text-primary"><h5>'.$row['FullName'].'</h5></li>
							</div>
							<div class="row borderless">
								<li class="list-group-item border-0 text-center col-lg-5"><button id="'.md5($row['Email']).'" onclick="seeprofile(this);" class="btn btn-info">Profile</button></li>
								<li class="list-group-item border-0 col-lg-6 text-center"><button id="'.$row['Email'].'" onclick="addfrnd(this);" class="btn '.$class.'"'.$stat.'>'.$cap.'</button></li>
							</div>
						</ul>
					</div>	
				</div><br>';
        }
    }
?>
<?php
	if(isset($_REQUEST['mailid'])){
		/*add friend*/
		$client = $_REQUEST['clt'];
		$friend = $_REQUEST['mailid'];
		include_once('dbcon.php');
		/*add friend in client's list*/
		$q = "SELECT * FROM userprofile WHERE Email='$client'";
		$result = mysqli_query($con,$q);
		$row = mysqli_fetch_array($result);//because only one match row
		$frndstr = $row['FriendList'];
		if($frndstr == '')
			$frndstr = $friend;
		else
			$frndstr = $frndstr.",$friend";
		$q = "UPDATE userprofile SET FriendList='$frndstr' WHERE Email='$client'";
		mysqli_query($con,$q);
		/*add client in friend's list*/
		$q = "SELECT * FROM userprofile WHERE Email='$friend'";
		$result = mysqli_query($con,$q);
		$row = mysqli_fetch_array($result);//because only one match row
		$frndstr = $row['FriendList'];
		if($frndstr == '')
			$frndstr = $client;
		else
			$frndstr = $frndstr.",$client";
		$q = "UPDATE userprofile SET FriendList='$frndstr' WHERE Email='$friend'";
		mysqli_query($con,$q);

		echo mysqli_error($con);
    }
?>

