<?php
$titre="Calendrier de l'Avent";
$corps="<div class='container'><a class='waves-effect waves-light btn' href='".URL_BASE."/public/calendar/accueil/'><i class='material-icons large right'>home</i>&nbsp;Accueil</a></div>";
foreach ($data['donnees'] as $defi)
{
	$corps.="<div class='row valign-wrapper'>";
	if (($defi->getCategory()=='joke')&&($defi->getCategory()=='anecdote'))
	{
		$type=($defi->getCategory()=='joke')? 'Blague du jour':'Anecdote du jour';
		$corps.="<div class='col s12 m5 l5'>".$type."
				<div class='card-panel teal'>
					<span class='white-text'>".$defi->get_Text()."</span>
				</div>
			</div>";
	}
	elseif ($defi->getCategory()=='video')
	{
		$corps.=" 
		<div class='col s12 m12 l12'>Vidéo du jour
			<div class='video'>
					<iframe width='853' height='480' src='".$defi->get_Text()."' frameborder='0' allowfullscreen></iframe>
			</div>
		</div>";
	}
	elseif ($defi->getCategory()=='musique')
	{
		$corps.="<div class='row'>Musique du jour
			<audio controls='constrols'>
				<source src='".$defi->get_Text()."' type='audio/mp3'/>
					Votre navigateur est pas compatible
			</audio>
			</div>";
	}
	elseif ($defi->getCategory()=='jeux'){
		$corps.="<div class='row valign-wrapper'>
			<div class='col s12 m12 l12'>
				<canvas id='mycanv' width='853' height='480'>Canvas not supported</canvas>
			</div>
			</div>
		<script src='".URL_BASE."/public/js/jcanvas.min.js'></script>
		<script src='".URL_BASE."/public/js/rayman.js'></script>";
	}
	$corps.="</div>";

}



require_once '../app/config/gabarit.php';
?>
