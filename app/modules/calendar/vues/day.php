<?php
$titre="Calendrier de l'Avent";
$corps="";
foreach ($data['donnees'] as $defi)
{
	$category=$defi->getCategory();
	$text=$defi->get_Text();
	$corps.="
		<div class='row'>
				$category <br/>$text</div>";
}
require_once '../app/config/gabarit.php';
?>
