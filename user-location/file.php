<?php

echo "hello";

if(isset($_POST)){
	echo $_POST['f'];
}else{
	echo "error";
}