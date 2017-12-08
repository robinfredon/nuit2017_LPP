<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php if (isset($titre)){echo $titre;}else{echo "Nuit de l'INFO 2017";} ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0,shrink-to-fit=yes">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="<?php echo URL_BASE;?>/public/css/materialize.css" rel="stylesheet">
<link href="<?php echo URL_BASE;?>/public/css/style.css" rel="stylesheet">
<link href="<?php echo URL_BASE;?>/public/css/styles2.css" rel="stylesheet">
<script src="<?php echo URL_BASE;?>/public/js/jquery.js"></script>
<script src="<?php echo URL_BASE;?>/public/js/materialize.js"></script>
<!-- ckeditor -->

</head>
<body>	
<div id="enveloppe">
	
       <!-- conteneur -->
		<div id="page" class="slide-collapse-container container">
            <h1 id='titrepage'><?php if (isset($titre)){echo $titre;}else{echo "";} ?></h1>
            <?php echo $corps; ?>
        </div>
        
        <!-- hidden -->
        <input id="URL_BASE" type="hidden" value="<?php echo URL_BASE;?>"/>
        <input id="URL_PREFIX" type="hidden" value="<?php echo URL_PREFIX;?>"/>

        <!-- script js-->
	    <?php if(isset($lienjs)) echo $lienjs; ?>
        

</div>


</body>
</html>
