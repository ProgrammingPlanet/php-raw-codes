<?php 
	function compress($source, $destination, $quality) {
	    $info = getimagesize($source);
	    if ($info['mime'] == 'image/jpeg') 
	        $image = imagecreatefromjpeg($source);
	    elseif ($info['mime'] == 'image/gif') 
	        $image = imagecreatefromgif($source);
	    elseif ($info['mime'] == 'image/png') 
	        $image = imagecreatefrompng($source);
	    imagejpeg($image, $destination, $quality);
	    return $destination;
	}
	function carousel($imageurls,$imgclass,$imageheight){
		echo '<div class="carousel slide" id="s55" data-ride="carousel">
			<div class="carousel-inner">';
		for($i=0;$i<sizeof($imageurls);$i++){
				if($i==0) $ac = 'active'; else $ac = '';
				echo	'<div class="carousel-item '.$ac.'"><img src="'.$imageurls[$i].'" class="'.$imgclass.'" height="'.$imageheight.'"></div>';
			}		
		echo '</div>
			<ul class="carousel-indicators">';
			for($i=0;$i<sizeof($imageurls);$i++){ if($i==0) $ac = 'active'; else $ac = '';
				echo '<li data-target="#s55" data-slide-to="'.$i.'" class="'.$ac.'"></li>';
			}		
			echo '</ul>
			<a href="#s55" data-slide="prev" class="carousel-control-prev">
				<span class="carousel-control-prev-icon"></span>
			</a>
			<a href="#s55" data-slide="next" class="carousel-control-next">
				<span class="carousel-control-next-icon"></span>
			</a>
		</div>';
	}



?>