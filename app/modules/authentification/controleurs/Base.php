<?php

// Module : authentification

require_once '../app/modules/authentification/modeles/UserDAO.php';

//test
class Base extends Controller
{
    private $userDAO;
    private $user;
        
    public function __construct(){
		$this->userDAO = new UserDAO();
        $this->user = new User(0,null,null,null, null, null,null,null, null, null, null);
    }

    public function accueil()
    {
	    $this->view('authentification','accueil',array("donnees"=>""));
    }
	public function credits(){
		$this->view('authentification','credit',array("donnees"=>""));
	}
    function login(){
	$mode = "";
        // test de session
        if (isset ($_SESSION['id'])){
            $this->redirect('authentification','Base','accueil');   
        } else {
            // affichage du formulaire
            if ( !isset ($_POST['login']) && !isset ($_POST['password']) ) {
		// pas de données => affichage
                $this->view('authentification','loginForm', array("mode" => "", "login" => "", "password" => "", "erreurAuth" => ""));
            } else {
		// données => test d'existence de cet utilisateur
           $this->user = $this->userDAO->findByLoginAndPassword($_POST['login'],$_POST['password']);
		if (($this->user)&&($this->user->getValide()==1)){
			// authentification réussie
			$this->authentificationReussie();
			if($this->user->getFonction() != 2){
			    // admin  redirection 
			   $this->redirect('authentification','Base','accueil');
            }
			else
			{
				$this->redirect('authentification','Base','accueil');               		}
		} else {
			// authentification non réussie
			$erreurauth="Authentification non réussie.";
			$this->view('authentification','loginForm', array("mode" => "", "login" => $_POST['login'], "password" => $_POST['password'], "erreurAuth" => $erreurauth));
		}
            }
        }
    }

    public function mdpoublie()
    {
	if (isset($_SESSION['id']))
	{
		$this->redirect('authentification','Base','accueil');
	}
	else
	{
		if ((!isset($_POST['login']))&&(!isset($_POST['mail'])))
		{
			// pas de données => affichage de formulaire
			$this->view('authentification','mdpoublie',array("login"=>"","mail"=>"","erreurlog"=>"","erreurmail"=>""));
		}
		else
		{
		$this->user= $this->userDAO->findByLoginAndMail($_POST['login'],$_POST['mail']);
			if (($this->user))
			{
				$this->userDAO->resetPassByKey($this->user->getCle());	
				$this->redirect('authentification','Base','accueil');
			}
		}
	}
    }


    public function authentificationReussie(){
	$_SESSION['id'] = $this->user->getId();
	$_SESSION['login'] = $this->user->getLogin();
    $_SESSION['fonction'] = $this->user->getFonction();
    }
    
    function logout(){
        unset($_SESSION['id']);
        unset($_SESSION['login']);
        unset($_SESSION['fonction']);
	// redirection
        $this->redirect('authentification','Base','login');
    }
}
