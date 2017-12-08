<?php
$titre="404 - Not Found";
$lienjs=<<<EOT
<script>
$('#dark').mousemove(function(event){ 
	$('#light').offset({ 
		top: event.pageY - 50,
		left: event.pageX - 50
	});
});
</script>
EOT;
$img=URL_BASE."/public/images/hehe_23.png";


$corps="<div class='container'><a class='waves-effect waves-light btn' href='".URL_BASE."/public/calendar/accueil/'><i class='material-icons large right'>home</i>&nbsp;Accueil</a></div>";


$corps.=<<<EOT
	<div id='lostperdu'>
	<div id='light'></div>
	<div id='dark' class='row'>
		<div id='L1' class='ligne'>
			<div id='M11' class='col s4 m4 l4 case'>
				<p>Good job ! Now try at the top right corner ! </p>
			</div>
			<div class='col s4 m4 l4 case' id='M21'>
				<p></p>
			</div>
			<div class='col s4 m4 l4 case' id='M31'>
				<p>You are almost there ! Now look at the bottom left corner</p>
			</div>
		</div>
	
		<div class='ligne' id='L2'>
			<div class='col s4 m4 l4 case' id='M12'>
				<p></p>
			</div>
			<div class='col s4 m4 l4 case' id='M22'>
				<p>Error404 ! Loot at the bottom right corner</p>
			</div>
			<div class='col s4 m4 l4 case' id='M32'>
				<p></p>
			</div>
		</div>

		<div id='L3' class='ligne valign-wrapper'>
			<div class='col s4 m4 l4 case' id='M13'>
				<img src="$img"/>
			</div>
			<div class='col s4 m4 l4 case id='M23'>
				<p></p>
			</div>
			<div class='col s4 m4 l4 case' id='M33'>
				<p>Bravo ! Now look at the upper left corner</p>
			</div>
		</div>
	</div>
</div>
EOT;
require_once '../app/config/gabarit.php';
?>
