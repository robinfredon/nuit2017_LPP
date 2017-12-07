<?php

/* paramétrage
 * public/.htaccess -> RewriteBase
 * app/config/config.php -> URL_PREFIX et URL_BASE 
*/ 

session_start();

require_once '../app/init.php';

$app = new App;

?>
