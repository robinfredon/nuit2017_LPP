<?php
$titre='Crédits';
$lienlogo=URL_BASE."/public/images/logo.png";
$lienmaterialize=URL_BASE."/public/images/materializecss.png";
$lienjquery=URL_BASE."/public/images/jquery.png";
$liengithub=URL_BASE."/public/images/github.png";
$lienjqueryui=URL_BASE."/public/images/jqueryui.png";
$corps=<<<EOT
<div class='row'>

<div class='col s12 m5 l4'>
	<h2 class='center-align'>Création du site</h2>
	<p class='right-align'>MAMPIANINAZAKASON M. Jérôme Kompé.<br/>
		Président du Club'Info de l'INSA de Toulouse (2017-2018)<br/>
		Président Cod'INSA (2017-2018)<br/>
		&copy; 2017
	</p>
	<br/>
	<h2 class='center-align'>Logo&nbsp;,&nbsp;Charte graphique</h2>
	<p class='left-align'><b>Logo</b>&nbsp;:&nbsp;Célia Prat</p>
	<p class='left-align'><b>Charte graphique</b>&nbsp;:&nbsp;Emma Rizzi</p>
</div>

<div class='col s12 offset-m2 m5 offset-l2 l6'>
	<h2 class='center-align'>Tutor'INSA</h2>
	<div class='row'>
		<div class='col s3 offset-m1 m3 offset-l2 l3'>
			<img class='responsive-img' src='$lienlogo' title='logo_Tutorinsa' alt='logo_Tutorinsa'/>
		</div>
		<div class='col s8 m5 l5'>
			<p class='right-align'>Initiative du Club'Info et de l'Amicale afin de permettre aux étudiants d'avoir une plateforme afin de s'entraider pendant leur scolarité.</p>
		</div>
	</div>
</div>
</div>

<div class='row' id='tech'>
	<div class='col  offset-m1 s12 m5 l2'>
		<div class='row valign-wrapper'>
			<div class='col s3 m3 l3'>
				<a href='http://materializecss.com' target='_blank'><img class='responsive-img' src='$lienmaterialize' title='logo_Materializecss' alt='logo_Materializecss'/></a>
			</div>
			<div class='col s5 m5 l5'>
				<p class='right-align'>Materializecss</p>
			</div>
		</div>
	</div>
	<div class='col  offset-m1 offset-l1 s12 m5 l2'>
		<div class='row valign-wrapper'>
			<div class='col s3 m3 l3'>
				<a href='https://jquery.com/' target='_blank'><img class='responsive-img' src='$lienjquery' title='logo_jQuery' alt='logo_jQuery'/></a>
			</div>
			<div class='col s5  m5 l5'>
				<p class='right-align'>jQuery</p>
			</div>
		</div>
	</div>
	<div class='col  offset-m1 offset-l1 s12 m5 l2'>
		<div class='row valign-wrapper'>
			<div class='col s3 m3 l3'>
				<a href='https://jqueryui.com/' target='_blank'><img class='responsive-img' src='$lienjqueryui' title='logo_jQueryui' alt='logo_jQueryui'/></a>
			</div>
			<div class='col s5  m5 l5'>
				<p class='right-align'>jQuery UI</p>
			</div>
		</div>
	</div>



	<div class='col offset-m1 offset-l1 s12 m5 l2'>
		<div class='row valign-wrapper'>
			<div class='col s3 m3 l3'>
			<a href='https://github.com/Holt59/datatable' target='_blank'><img class='responsive-img' src='$liengithub' alt='logo_GitHub' title='logo_GitHub'/></a>
			</div>
			<div class='col s5 m5 l5'>
				<p class='right-align'>Datatable</p>
			</div>
		</div>
	</div>


</div>

EOT;

require_once '../app/config/gabarit.php';
?>
