<?php
// Module Calendar Nuit de l'info 2017
// Jérôme & Robin

class Calendar extends Persistable implements JsonAble{
	// Persistable : id, getId, setId
	// interface JsonAble : methode toJson()

	private $nbr;
	private $img;
	private $ouvert;
	private $date;

	public function __construct($id=null,$nombre,$img,$ouvert,$date){
		if ($id){
			$this->setId($id);
		}
		$this->nbr=$nombre;
		$this->img=$img;
		$this->ouvert=$ouvert;
		$this->date=$date;
	}

	public function getNbr(){
		return $this->nbr;
	}
	public function getImg(){
		return $this->img;
	}
	public function getOuvert(){
		return $this->ouvert;
	}
	public function get_Date(){
		return $this->date;
	}
	public function toJson(){
		return 'LOL';
	}
}
?>
