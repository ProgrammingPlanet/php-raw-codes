
<?php  
	
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
	/*$a = ['1.png','2.png','3.png','4.png'];
	$b = 'col-lg-12';
	$c = '200';
	carousel($a,$b,$c);*/
?>