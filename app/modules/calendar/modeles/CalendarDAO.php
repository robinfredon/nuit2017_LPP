<?php
//Module Calendar

class CalendarDAO extends DAO{
	public function __construct(){
		require_once 'Calendar.php';
		$db= Db::init();
		parent::__construct($db,'calendar',"id");
	}

	public function findAllCalendar(){
		$zouz=array();
		$sql="SELECT * FROM calendar";
		$req=$this->_db->prepare($sql);
		if ($req->execute()){
			$req->bind_result($id,$nombre,$img,$ouvert,$date);
			while ($req->fetch()){
				$calendar=new Calendar($id,$nombre,$img,$ouvert,$date);
				$zouz[]=$calendar;
			}
		}
		return $zouz;
	}
}
?>
