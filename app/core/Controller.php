<?php

// classe mère pour tous les contrôleurs
class Controller
{
	public function view($module, $view, $data = array())
	{
		require_once '../app/modules/'.$module.'/vues/'.$view.'.php';
	}
	public function redirect($module, $controleur, $action)
	{
		header ('Location:'.URL_PREFIX.'/'.$module.'/'.$controleur.'/'.$action);
	}
	public function testSession()
	{
                // test de l'existence d'un user connecté
                if(!isset($_SESSION['id'])){
                    header ('Location:'.URL_PREFIX.'/authentification/Base/login');
                    die;
                }
	}
	public function quitWithErrorTo($view, $error){
		http_response_code($error->getCode());
		$this->view($view, array("code"=>$error->getCode(), "log"=>$error->getLog()));
	}
}
