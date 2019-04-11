<?php
	session_start();
	if(!isset($_SESSION['Email']))
		header('location:index.php');
	$client = $_SESSION['Email'];
	$name = $_SESSION['Name'];
	$server = '';
?>
<script type="text/javascript">
	var c = '<?php echo $client; ?>';
	var s = '<?php echo $server; ?>';
	var trace1 = '';
	var trace2 = '';
	function makeoffline(){
		$.ajax({
	 			url:'ajaxchat.php',type:'POST',data: { clnt :c },
	 			success:function(result){
	 				//alert(result);
	 				window.location.href = 'index.php';
				}
	 	});
	}
	window.onbeforeunload = function(){
		//makeoffline();
  		// Ajax request to update db here
	}
</script>
<!DOCTYPE html>
<html>
<head>
	<title>Login Or Sign Up | simplechat.com</title>
	<!-- <meta http-equiv="refresh" content="5"> -->
	<link rel="stylesheet" type="text/css" href="../bootstrap4/css/bootstrap.min.css">
	<script type="text/javascript" src="../bootstrap4/js/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/extrastyle.css">
</head>
<body onload="fetchactiveperson(); dsbl_enbl(); pastchat(c,s);">
	<div class="container-fluid border">
		<br><br>
		<h1 class="text-center text-success">Simple Chat System in Bootstrap And Php</h1><br>

		<div class="row">
			<div class="border col-xlg-3 col-lg-3 col-md-3 mx-auto mb-2 d-block" id="infodiv">
				<div class="row">
					<div class="col-lg-10  mx-auto my-3 bg-success">
						<div class="float-left pt-1"><?php echo $name;?></div><input type="button" name="lgot" onclick="makeoffline();" class="btn btn-sm btn-danger float-right" value="Log Out"></div>
					</div>
					<div class="container border" id="secdiv">
					 	<div class="bg-info text-center border">Active freinds</div>
					 	<div class="form-check mt-2" id="active"><br>

   					<!-- <input type="radio" class="form-check-input" name="actvfrnd" value="Option">Option 1<br> -->
   			
					 	</div>
					 	<script type="text/javascript">
					 		function updateserver(servr){
					 			s = servr;
					 			pastchat(c,s);
					 		}
					 		function fetchactiveperson(){
								$.ajax({
	 								url:'ajax/chat.php',type:'POST',data: {opreation: 'active_persons', source : c , destination: s},
	 								success:function(result){
	 									if(result != trace1){
	 									//alert(result);
	 									$('#active').html(result);
										}
										trace1 = result;
									}
										
	 							});
							}
							setInterval(fetchactiveperson,30000);
					 	</script>
					</div>		
			</div>
			<div class="border col-xlg-8 col-lg-8 col-md-8 col-sm-8 col-xsm-8  m-auto" >
				<div class="row" id="chatdiv">
					<div class="m-auto loader"></div>
					<script type="text/javascript">
						
						function pastchat(datavalue1,datavalue2){//call when var s update
	 							$.ajax({
	 								url:'ajaxchat.php',type:'POST',data: { clent :datavalue1 , server :datavalue2},
	 								success:function(result){//alert(result);
	 											var list = result.split('~');
	 											var dttm = list[0];
	 											var data = list[1];
	 											$('#chatdiv').html(data);
	 											var box = document.getElementById('chatdiv');
												box.scrollTop = box.scrollHeight;
	 											trace2 = dttm;
											}
	 							});
	 					}
	 					function newchat(datavalue1,datavalue2){
	 							$.ajax({
	 								url:'ajaxchat.php',type:'POST',data: { clent :datavalue1 , server :datavalue2 ,nwct: '1'},
	 								success:function(result){/*alert(result);*/
	 											var list = result.split('~');
	 											var dttm = list[0];
	 											var sender = list[1];
	 											var data = list[2];
	 											if(dttm != trace2){
			 										$("#chatdiv").append(data);	
			 										var box = document.getElementById('chatdiv');
													box.scrollTop = box.scrollHeight;
													var beep = new Audio('beep.mp3');	
													if(sender != c) beep.play();
	 											}
			 									trace2 = dttm;
											}
	 							});
	 					}
	 					
	 					setInterval(temp,1000);
	 					function temp(){
	 						newchat(c,s);
	 					}
					</script>
				</div>
				<br><br>
				<script type="text/javascript">
					function validate(){/*alert('validation call');*/
						var tst = $("#chatmsg").val();
						document.getElementById("chatmsg").value = '';
						var msgpattern = /^\s*$/;
						if (msgpattern.test(tst) || tst.indexOf('~')!=-1){
							alert('Empty Messages Or ~ symbol Not Allowed');
							return false;
						}
	 					$.ajax({
	 						url:'ajaxchat.php',type:'POST',data: { msg:tst,client:c,server:s },
	 						success:function(result){
	 									//alert(result);
			 							return false;
									}
	 							});
					}
					
				</script>
				<div class="row float-xl-right float-lg-right float-md-right float-sm-right mr-lg-5 mr-md-4">
					<!-- <form class="" onsubmit="return validate();"> -->
						<div class="m-auto">
							<div style="display: inline-block;"><input type="text" class="form-control" name="chat_msg" id="chatmsg"></div>
							<div style="float:right;"><button id="sndmsg" class="btn btn-info form-control" name="chat_send" onclick="validate();">Send</button></div>
							<script type="text/javascript">
								function dsbl_enbl(){
									if(s==''){
										/*alert('disabled');*/
										document.getElementById("chatmsg").disabled=true;
										document.getElementById("sndmsg").disabled=true;
									}else{/*alert('try to enable');*/
										document.getElementById("chatmsg").disabled=false;
										document.getElementById("sndmsg").disabled=false;
									}
								}
								var x = document.getElementById("chatmsg");
								x.addEventListener("keyup", function(event) {
  									event.preventDefault();
  									if(event.keyCode === 13) {
    									document.getElementById("sndmsg").click();
  										x.value = '';
  									}
								});
						
							</script>
						</div>
					<!-- </form> -->
				</div><br><br><br>
			</div>
			
		</div>
	</div>
</body>
</html>

