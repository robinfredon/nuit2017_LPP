<?php
$titre="Mot de Passe Oublié";

$p=isset($data['login']) ? $data['login'] : "";
$m=isset($data['mail']) ? $data['mail'] : "";
$el=isset($data['erreurlog']) ? $data['erreurlog'] : "";
$em=isset($data['erreurmail']) ? $data['erreurmail'] : "";

$url_prefix=URL_PREFIX;

$corps=<<<EOT
<div class='row'>
<div class='col s12 offset-m3 m6 offset-l4 l4'>
<form id='pass-form' name='pass-form' method='post' action='$url_prefix/authentification/Base/mdpoublie'>
<div class='input-field'>
<label for='login'>Votre pseudo</label>
<input id='login' type='text' name='login' value='$p' required aria-required='true'/>
<p class='erreur'>$el</p>
</div>

<div class='input-field'>
<label for='mail'>L'adresse mail associée à ce compte </label>
<input type='text' id='mail' name='mail' value='$m' required aria-required='true' />
<p class='erreur'>$em</p>
</div>
<div class='row right-align'>
<button class='btn waves-insa waves-effect waves-light' name='submit' type='submit' id='submit'>Valider&nbsp;<i class='material-icons right'>send</i></button>
</div>
</form>
</div>
</div>
EOT;

$lienjs="";

require '../app/config/gabarit.php';
?>
