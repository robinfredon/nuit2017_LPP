<?php

// titre
$titre = "Connexion";

//var
$m = isset($data['login']) ? $data['login'] : "";
$p = isset($data['password']) ? $data['password'] : "";
$e = isset($data['erreurAuth']) ? $data['erreurAuth'] : "";

$lienmdp=URL_PREFIX."/authentification/Base/mdpoublie/";
$url_prefix = URL_PREFIX;

// corps
$corps ='<div class="row">
<div class="col s8 m4 offset-m4 l4 offset-l4">
<form id="creation-form" name="creation-form" method="post" action="'.$url_prefix.'/authentification/Base/login">
<div class="input-field">
<label for="login">Pseudo</label>
<input id="login" type="text" name="login" value="'.$m.'" required aria-required="true" />
<p class="erreur"></p>
</div>
<div class="input-field">
<label for="password">Mot de passe</label>
<input id="password" type="password" name="password" value="'.$p.'" required aria-required="true" />
</div>';
if(isset($_GET["pw"]))
{
	$corps = $corps . '<p class="password">';
	if($_GET['pw'])
	{
		$corps = $corps . 'Votre compte a été validé!';
	}
	else
	{
		$corps = $corps . 'Votre lien est érroné';
	}
	$corps = $corps . '</p>';
}
if(isset($_GET["auth"]))
{
	$corps = $corps . '<p class="password">';
	if($_GET['auth'])
	{
		$corps = $corps . 'Vous avez bien été désinscrit(e).Vous ne recevrez plus de mail de notre part !';
	}
	else
	{
		$corps = $corps . 'Votre lien est érroné ou une erreur est survenue';
	}
	$corps = $corps . '</p>';
}
if (isset($_GET["auth"]))
{
	$corps.= "<p class='password'>";
	if ($_GET['pass'])
	{
		$corps.='Nous vous avons envoyé un mail contenant votre nouveau mot de passe';
	}
	else
	{
		$corps.='Votre lien est érroné ou une erreur est survenue';
	}
	$corps.="</p>";
}

$corps=$corps . '<p class="erreur">'.$e.'</p>
<div class="row right-align"><button class="btn waves-insa waves-effect waves-light" name="submit" type="submit" id="submit">Valider&nbsp;<i class="material-icons right">send</i></button>
<div class="lienbutton right-align"><a href="'.$lienmdp.'">Mot de passe oublié </a></div>
</div>
</div>
</form>
</div>';

// insertion dans le gabarit : définir $titre, $corps
require "../app/config/gabarit.php";

?>
