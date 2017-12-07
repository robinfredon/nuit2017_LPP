<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="robots" content="index,follow" />
<meta name="keywords" content="tutorinsa,insa,tutor,tutorat,tuteur, aide, soutient"/>
<meta name="description" content="Plateforme de tutorat pour les étudiants de l'INSA Toulouse"/>
<title><?php if (isset($titre)){echo $titre;}else{echo "Tutor'INSA";} ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0,shrink-to-fit=yes">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="icon" href="<?php echo URL_BASE;?>/public/images/favicon/favicon.ico"/>
<link href="<?php echo URL_BASE;?>/public/js/ui/jquery-ui.css" rel='stylesheet'>
<link href="<?php echo URL_BASE;?>/public/js/ui/jquery-ui-timepicker-addon.css"  rel='stylesheet'>
<link href="<?php echo URL_BASE;?>/public/css/materialize.css" rel="stylesheet">
<link href="<?php echo URL_BASE;?>/public/css/style.css" rel="stylesheet">
<link href="<?php echo URL_BASE;?>/public/css/styles2.css" rel="stylesheet">
<link href="<?php echo URL_BASE;?>/public/css/datatable-bootstrap.min.css" media="screen">
<!--<link href="<?php echo URL_BASE;?>/public/css/jquery.datetimepicker.css" rel='stylesheet'/>-->
<script src="<?php echo URL_BASE;?>/public/js/jquery.js"></script>
<!--<script src="<?php echo URL_BASE;?>/public/js/jquery.datetimepicker.js"></script>-->
<script src="<?php echo URL_BASE;?>/public/js/materialize.js"></script>
<!-- ckeditor -->

</head>
<body>	
<div id="enveloppe">
	
	<!-- header -->
	<div id="header" class="row" style="background-image:url('<?php echo URL_BASE;?>/public/images/bannierbg.jpg');">
		<div id="logo" class="col s12 m5 l5">
			<a href="<?php echo URL_BASE;?>/public/authentification/Base/accueil/">
			<img  class='responsive-img' alt="Tutor'INSA" title="Tutor'INSA" src="<?php echo URL_BASE;?>/public/images/logo_1.png"/>
</a>    </div>
       </div>
	<div id="menu" class="menu">
		<ul id='slide-out' class='side-nav'>
			<li>
				<div class='user-view'>
					<div class='background'>
						<img class='responsive-img' src="<?php echo URL_BASE;?>/public/images/student.jpg" alt="fond" title="fond"/>
					</div>
					<?php
					$menu="";
					if (isset($_SESSION['id'])){
					
						$compFooter="&#169;&nbsp;Club'Info&nbsp;".date("Y")."&nbsp;-&nbsp;<a href='".URL_BASE."/public/TutorInsa.pdf' target='_blank'>Didactiel</a>&nbsp;-&nbsp;<a href='".URL_BASE."/public/authentification/Base/credits/'>Crédits</a>";
						$menu.="<a href='".URL_BASE."/public/utilisateur/Base/voir/".$_SESSION['id']."'><img class='circle responsive-img' src='".URL_BASE."/public/images/default_profil.png'/></a><span id='pseudo' class='white-text name'>".$_SESSION['login']."<br/>";
						$menu.="
						<li><a class='waves-effect waves-teal' href='".URL_BASE."/public/projet/Base/accueil'><i class='tiny material-icons'>help</i>&nbsp;Demandes</a></li>
						<li><a class='waves-effect waves-teal' href='".URL_BASE."/public/tutorat/Base/accueil'><i class='material-icons tiny'>event_note</i>&nbsp;Tutorats</a></li>
						<li><a class='waves-effect waves-teal' href='".URL_BASE."/public/utilisateur/Base/liste'><i class='tiny material-icons'>supervisor_account</i>&nbsp;Utilisateurs</a></li>";
						if ($_SESSION['fonction']==2){
							//menu admin
							$menu.="<li><a href='".URL_BASE."/public/utilisateur/Base/Administrer'><i class='tiny material-icons'>settings</i>&nbsp;Administrer</a></li>";
						}
						$menu.="<li><div class='divider'></div></li>
						<li><a class='waves-effect waves-red' href='".URL_BASE."/public/authentification/Base/logout'><i class='tiny material-icons'>exit_to_app</i>&nbsp;Se déconnecter</a></li></ul>";
					}
					else
					{
						$compFooter="&#169;&nbsp;Club'Info&nbsp;".date("Y")."&nbsp;-&nbsp;<a href='".URL_BASE."/public/TutorInsa.pdf' target='_blank'>Didactiel</a>&nbsp;-&nbsp;<a href='".URL_BASE."/public/authentification/Base/credits/'>Crédits</a>";
	
						$menu.="<img class='circle responsive-img'src='".URL_BASE."/public/images/default_profil.png'/><br/><li><a class='waves-effect waves-teal' href='".URL_BASE."/public/authentification/Base/login'><i class='material-icons'>forward</i>&nbsp;Se connecter</a></li>
						<li><a class='waves-effect waves-teal' href='".URL_BASE."/public/utilisateur/Base/register'><i class='material-icons'>mode_edit</i>&nbsp;S'inscrire</a></li>
						</ul>";
					}
					echo $menu;?>
	<div id='butt' class='insa row'>
		<div class='col s4 m4 l4 insa'><a href="#" style='display:inline-block;' data-activates="slide-out" class="button-collapse"><i id='butt' class="material-icons medium">menu</i></a>
		</div>
	</div>
	</div>

        <!-- conteneur -->
		<div id="page" class="slide-collapse-container container">
            <h1 id='titrepage'><?php if (isset($titre)){echo $titre;}else{echo "";} ?></h1>
            <?php echo $corps; ?>
        </div>
        
        <!-- footer -->
        <footer class="footer">
				<div class='container'>
					<?php echo $compFooter ?>
				</div>
		</footer>
        
        <!-- hidden -->
        <input id="URL_BASE" type="hidden" value="<?php echo URL_BASE;?>"/>
        <input id="URL_PREFIX" type="hidden" value="<?php echo URL_PREFIX;?>"/>

        <!-- script js-->
		<script src="<?php echo URL_BASE;?>/public/js/app.js"></script>  
		<script type="text/javascript" src="<?php echo URL_BASE;?>/public/js/datatable.jquery.min.js"></script>
	    <?php if(isset($lienjs)) echo $lienjs; ?>
        

</div>


</body>
</html>
