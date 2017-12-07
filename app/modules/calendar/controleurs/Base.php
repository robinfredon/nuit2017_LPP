<?php

// Module : calendar

require_once '../app/modules/calendar/modeles/UserDAO.php';

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
	    $this->view('calendar','accueil',array("donnees"=>""));
    }
	public function perdu(){
		$this->view('calendar','404',array("donnees"=>""));
	}
} 
