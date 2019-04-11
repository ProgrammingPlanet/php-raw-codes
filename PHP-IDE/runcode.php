<?php
	$fr = fopen("php://stdin", "w");
	$c = $_REQUEST['code'];
	$stdin = $_REQUEST['stdin'];
	/*$file = fopen("codefile.php","w");
	fwrite($file,$c);
	fclose($file);
	include_once('codefile.php');
	echo "\n".$stdin;*/

	fwrite($fr,$stdin);
	fclose($fr);
	$fr = fopen("php://stdin", "r");
	fscanf($fr, "%d", $d);
		echo $d."\n";

?>