<?php
$titre = "Tutor'INSA";
$lien1=URL_BASE."/public/images/logo_amicale.png";
$lien2=URL_BASE."/public/images/LogoClubInfo.png";
$corps=<<<EOT
<div class='container-fluid'>
<div class='row'>
<div class='justify col offset-m2 offset-l1 s7 m6 l5'><p>Cette plateforme a été créée par l'initiative de l'Amicale de l'INSA de Toulouse, avec la collaboration du Club'Info. Il a pour but d'être un outil pour les étudiants, appelant à leur solidarité pour s'entraider. 
</br>Vous pouvez trouver des informations complémentaires telles que les conditions d'utilisation et aussi les personnes à contacter en cas de question. </p></div>
<div class='col s3 m2 l2 offset-s1 offset-m1 offset-l1 center-align'>
<img class='responsive-img' src='$lien1' alt='Amicale' title='Amicale'/>
</div>
</div>
<div class='row'>
<div class='col s4 m3 l3 offset-m2 offset-l1'>
<img class='responsive-img' src='$lien2' alt='Clubinfo' title='Clubinfo'/>
</div>
<div class='justify col s7 m6 l5 offset-m5 offset-l1'>
<p class='textaccueil'>Ici vous pourrez faire vos demandes d'aide, et vous proposez pour aider les autres. Evitez de commenter pour rien, n'oubliez pas que cela peut être désagréable.</br> Ne sont comptabilisés sur votre profil que les heures des tutorats où au moins un élève a participé. </p>
</div>
</div>
</div>
EOT;

require '../app/config/gabarit.php';
?>
