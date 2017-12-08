<?php
$titre = "Calendrier de l'Avent";
$corps="<div class='container-fluid'>";

		$nbrCol=5;
		foreach($data['donnees'] as $date)
		{
			$nbrCol++;
			if($nbrCol>=5)
			{
				$corps .= "</div><div class='row'>";
				$nbrCol=1;
			}
			$u=URL_BASE."/public/images/".$date->getImg();
			$l=URL_BASE."/public/calendar/Base/day/".$date->getNbr();
			$corps .= "<a href='$l'><div class='col s3 m3 l3 case_calendar' style='background-image : url(";
			$corps .= $u.");'>". $date->getNbr() ."</div></a>";
		}
		$corps .= "</div></div>";
$corps .= "</div>";

$lienjs=<<<EOT
<script>
function change(){
	var couleur=['red','orange','yellow','green','blue','indigo','violet'];
	var actu=document.body.style.backgroundColor;
	var i=couleur.indexOf(actu);
	var taille=couleur.length;
	if (i==taille-1){
		i=0;
	}
	else
	{
		i++;
	}
	document.body.style.backgroundColor=couleur[i];
}


if (window.addEventListener){
	var kkeys=[], konami="38,38,40,40,37,39,37,39,66,65";
	window.addEventListener("keydown",function(e){
		kkeys.push(e.keyCode);
		if (kkeys.toString().indexOf(konami) >=0){
			setInterval(change(),3000);	
		}
	},true);
}
</script>
EOT;
require '../app/config/gabarit.php';
?>
