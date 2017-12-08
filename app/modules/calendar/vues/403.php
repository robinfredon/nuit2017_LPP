<?php
$titre="403 - Not Allowed";
$url=URL_BASE."/public/images/Pere-Noel-sexy.jpg";
$lienjs="<script src='".URL_BASE."/public/js/fallingsnow_v6.js'></script>";
$corps="<div id='lost'><div class='container'><a class='waves-effect waves-light btn' href='".URL_BASE."/public/calendar/accueil/'><i class='material-icons large right'>home</i>&nbsp;Accueil</a></div>";
$corps.=<<<EOT
<div class="container perdu">

    <h1>Erreur403</h1>
    <img src='$url'>
	<h2>Vous êtes un vilain garçon !</h2>
</div>
<canvas id="canvas"></canvas>
</div>
EOT;

require_once '../app/config/gabarit.php';
?>
