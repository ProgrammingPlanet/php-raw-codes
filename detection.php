<?php
 
// Simple browser and OS detection script.
// This will not work if User Agent is false.
 
$agent = $_SERVER['HTTP_USER_AGENT'];

 
// Detect Device/Operating System
 

  if(preg_match('/Android/i',$agent)) $os = 'Android'; 
  elseif(preg_match('/Linux/i',$agent)) $os = 'Linux';
  elseif(preg_match('/Mac/i',$agent)) $os = 'Mac'; 
  elseif(preg_match('/iPhone/i',$agent)) $os = 'iPhone'; 
  elseif(preg_match('/iPad/i',$agent)) $os = 'iPad'; 
  elseif(preg_match('/Unix/i',$agent)) $os = 'Unix'; 
  elseif(preg_match('/Windows/i',$agent)) $os = 'Windows';
  else $os = 'Unknown';
 
// Browser Detection
 
if(preg_match('/Firefox/i',$agent)) $br = 'Firefox'; 
  elseif(preg_match('/Mac/i',$agent)) $br = 'Mac';
  elseif(preg_match('/uc/i',$agent)) $br = 'Uc Browser';
  elseif(preg_match('/Chrome/i',$agent)) $br = 'Chrome'; 
  elseif(preg_match('/Opera/i',$agent)) $br = 'Opera'; 
  elseif(preg_match('/MSIE/i',$agent)) $br = 'IE'; 
  else $bs = 'Unknown';
 
 //if($os=='Linux') $os='Android';
 $result = "OS is <b style='color:green'>$os</b> browser is <b style='color:green'>$br</b>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Os And Browser Detector</title>
</head>
<body>
    <br><br>
    <center>
        <h1><?= $result ?></h1>
    </center>
</body>
</html>
