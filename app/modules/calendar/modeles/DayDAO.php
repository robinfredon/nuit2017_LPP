<?php
// Module Calendar 
// Day DAO

class DayDAO extends DAO{
	public function __construct(){
		require_once 'Day.php';
		$db= Db::init();
		parent::__construct($db,'day',"id");
	}

	public function findAllDay(){
		$zouz=array();
		$sql="SELECT * FROM day";
		if ($req->execute()){
			$req->bind_result($id,$ID_calendar,$category,$text);
			while ($req->fetch()){	
				$day=new Day($id,$ID_calendar,$category,$text);
				$zouz[]=$day;
			}	
		}
	}

	public function findDaysByCalendar($JourCalendar){
		$zouz=array();
		$sql="SELECT D.id as id,D.ID_calendar as calendar,D.category as category, D.text as text FROM day D,calendar C WHERE D.ID_calendar=(SELECT DISTINCT ID FROM calendar WHERE nombre=?)";
		$req=$this->_db->prepare($sql);
		$req->bind_param("i",$JourCalendar);
		if ($req->execute()){
			$req->bind_result($id,$ID_calendar,$category,$text);
			while ($req->fetch()){
				$day=new Day($id,$ID_calendar,$category,$text);
				$zouz[]=$day;
			}
		}
		return $zouz;
	}
}
?>
