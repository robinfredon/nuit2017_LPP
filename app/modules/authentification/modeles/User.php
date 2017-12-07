<?php

class User extends Persistable implements JsonAble{
        // Persistable : id, getId et setId
        // interface JsonAble : methode toJson()

	private $login;
	private $mail;
	private $nom;
	private $prenom;
	private $password;
	private $domaine;
	private $valide;
	private $cle;
	private $fonction;
	private $mail_auth;

        public function __construct($id = null, $login,$nom,$prenom, $mail, $password,$domaine, $valide,$cle, $fonction, $mail_auth){
		if($id){
			$this->setId($id);
		}
		$this->login = $login;
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->mail=$mail;
		$this->password = $password;
		$this->domaine=$domaine;
		$this->valide = $valide;
		$this->cle=$cle;
		$this->fonction = $fonction;
		$this->mail_auth = $mail_auth;
		return $this;
	}
        
	public function getLogin(){
		return $this->login;
	}

	public function getNom(){
		return $this->nom;
	}
	
	public function getPrenom(){
		return $this->prenom;
	}
	
	public function getMail(){
		return $this->mail;
	}

	public function getValide(){
		return $this->valide;
	}

	public function getCle(){
		return $this->cle;
	}
	public function getPassword(){
		return $this->password;
	}
	public function getFonction(){
		return $this->fonction;
	}
	public function getAuth(){
		return $this->mail_auth;
	}
	public function toJson(){
		return '{"login":"'.htmlspecialchars($this->login).'","password":"'.htmlspecialchars($this->password).'","jeuCommence":"'.htmlspecialchars($this->jeuCommence).'"}';
	}
	public static function userArrayToJson($users){
		$json = '{"users":[';
		foreach ($users as $user){
			$json = $json.$user->toJson().',';
		}
		$json = substr($json, 0, strlen($json)-1);
		$json = $json.']}';
		return $json;
	}
}
