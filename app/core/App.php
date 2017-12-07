<?php

class App
{
	// valeurs par défaut
	private $module = 'calendar';
	private $controller = 'Base';
	private $method = 'accueil';
	private $params = array();
        
	// contructeur
	public function __construct()
	{          
        // ré-écriture d'URL à chaque nouvelle requête
		$url = $this->parseUrl();
       			
	       	$contr = '../app/modules/' .$url[0].'/controleurs/' .$url[1].'.php';
		// test si le contrôleur existe (on vient de public/index.php)
		if(file_exists($contr))
		{
			$this->module = $url[0];
            		$this->controller = $url[1];
			unset($url[0]);
        		unset($url[1]);
		} else {
                // on continue avec les controleur/méthode par défaut
				$method='perdu';
		}

		// nouvelle instance du controleur sélectionné
		require_once '../app/modules/'.$this->module.'/controleurs/'.$this->controller.'.php';
		$this->controller = new $this->controller;

		// test si la méthode est donnée
		if(isset($url[2]))
		{
			// test d'existence de cette méthode dans le contrôleur précédent
			if(method_exists($this->controller, $url[2]))
			{
				$this->method = $url[2];
				unset($url[2]);
			}
		}
		// test d'existence de paramètres (valeurs restantes du tableau $url renvoyée sous forme
        	// de tableau indexé)
		$this->params = $url ? array_values($url) : array();
                
		// appel de la méthode
		call_user_func_array(array($this->controller, $this->method), $this->params);
	}
        
	public function parseUrl()
	{
                // récupération de l'url et renvoi d'un tableau
                // rtrim(chaîne, '/') : suppression des blancs et des / en fin de chaîne
                // filter_var : filtrage : pas de caractères illégaux dans une URL

		if(isset($_SERVER['PHP_SELF'])) {
			//echo "URL=".$_GET['url']."<br>";
			 $url = explode('/',filter_var(rtrim($_SERVER['PHP_SELF'], '/'),FILTER_SANITIZE_URL));
		}
		if(isset($_GET['url'])){
			 $url = explode('/',filter_var(rtrim($_GET['url'], '/'),FILTER_SANITIZE_URL));
		}
		return $url;
	}
}

?>
