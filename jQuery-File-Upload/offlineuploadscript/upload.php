<?php
  if($_FILES)  // $_FILES will true if file will upload
   {	  
    $name=$_FILES['filename']['name'];                                   // second block is already difined as name 
    move_uploaded_file($_FILES['filename']['tmp_name'],"../server/php/files/".$name);  // second block of _FILES array is tmp_name not temp_name
   }
  else
  { echo 'file not Upload succesfully'; exit(); }
?>	

<html>
 <head>
    <title> my php practice </title>
 </head>
 <body>
    <h1 align="center"> data send successfully</h1>      
 </body>
</html>



  



