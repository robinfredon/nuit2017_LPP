<?php

// Module : calendar

require_once '../app/modules/calendar/modeles/CalendarDAO.php';
require_once '../app/modules/calendar/modeles/DayDAO.php';

class Base extends Controller
{
	private $calendar;
	private $calendarDAO;
    private $day;
	private $dayDAO;
	public function __construct(){
		$this->calendarDAO = new CalendarDAO();
        $this->calendar = new Calendar(null,null,null,null, null);
		$this->dayDAO=new DayDAO();
		$this->day=new Day(null,null,null,null);
    }

    public function accueil()
    {
		$data=$this->calendarDAO->findAllCalendar();
	    $this->view('calendar','accueil',array("donnees"=>$data));
    }
	public function perdu(){
		$this->view('calendar','404',array("donnees"=>""));
	}

	public function notAllow(){
		$this->view('calendar','403',array("donnees"=>""));
	}
	public function day($JourCalendar){
		$today=date('d');
		if (($JourCalendar>0)&&($JourCalendar<=$today)){
			$data=$this->dayDAO->findDaysByCalendar($JourCalendar);
			$this->view('calendar','day',array("donnees"=>$data));
		}
		else
		{
			$this->notAllow();
		}
	}
} 
