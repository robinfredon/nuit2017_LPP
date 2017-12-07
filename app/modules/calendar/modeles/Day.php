<?php
//Module Calendar Nuit de l'info 2017
// Jerome & Robin

class Day extends Persistable implements JsonAble{
	// Persistable : id, getId, setId
	// interface JsonAble : method toJson()

	private $ID_calendar;
	private $category;
	private $text;

	public function __construct($id=null, $ID_calendar,$category,$text){
		if ($id){
			$this->setId($id);
		}
		$this->ID_calendar=$ID_calendar;
		$this->category=$category;
		$this->text=$text;
	}

	public getIdCalendar(){
		return $this->ID_calendar;
	}
	public function getCategory(){
		return $this->category;
	}
	public function get_Text(){
		return $this->text;
	}

	public function toJson(){
		return 'LOL2';
	}
}
?>
