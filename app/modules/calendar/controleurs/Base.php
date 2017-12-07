<?php

// Module : calendar

require_once '../app/modules/calendar/modeles/CalendarDAO.php';

//test
class Base extends Controller
{
    private $userDAO;
    private $user;
	private $calendar;
	private $calendarDAO;        
    public function __construct(){
		$this->calendarDAO = new CalendarDAO();
        $this->calendar = new Calendar(null,null,null, null);
    }

    public function accueil()
    {
		$data=$this->calendarDAO->findAllCalendar();
	    $this->view('calendar','accueil',array("donnees"=>$data));
    }
	public function perdu(){
		$this->view('calendar','404',array("donnees"=>""));
	}
} 
