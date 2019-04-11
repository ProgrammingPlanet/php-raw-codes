<?php

	function makezip($folder='./',$filename='file.zip'){

        $rootPath = realpath($folder);
        $zip = new ZipArchive();
        $zip->open($filename, ZipArchive::CREATE | ZipArchive::OVERWRITE);
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($rootPath),
            RecursiveIteratorIterator::LEAVES_ONLY
        );
        foreach ($files as $name => $file)
        {
            if (!$file->isDir())
            {
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($rootPath) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();
    }
    
    //delete all old backup
    foreach(glob('./*.zip') as $file){
    	unlink($file);
	}

	if(isset($_REQUEST['flag'])) $flag=$_REQUEST['flag'];
	else $flag = '';

	if($flag=='d'){
		date_default_timezone_set('Asia/Kolkata');
		$datetime = date("H꞉i꞉s_d-M-Y");
		$name = "Backup-UbuntuServer-$datetime.zip";
		makezip('./',$name);

		?>
        <a href='$name' id='d' download>fgfdg</a> <a href='#' id='b' onclick='history.back()'></a>
        <script type="text/javascript">document.getElementById('d').click();</script> <?php
    }
    ?>
			<script>
				

				setTimeout(function(){ document.getElementById('b').click(); }, 500);
				
			</script>";


?>