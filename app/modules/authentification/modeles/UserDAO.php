<?php

// Module : authentification ; DAO sur une partie du modèle

class UserDAO extends DAO {
	public function __construct()
	{
		require_once 'User.php';
                // création de la connexion à partir de la variable statique db
		$db = Db::init();
                //echo $db->host_info;
		parent::__construct($db,"pla_utilisateur","id");
	}
        public function findByLoginAndPassword($login, $password){
                $user = null;
                $sql = "SELECT * FROM pla_utilisateur WHERE login = ? AND password = ?";
		$req = $this->_db->prepare($sql);
                $newp = md5($password);
		$req->bind_param("ss",$login, $newp);
		if($req->execute()){
                        // sans mysqlnd
                        /* bind variables to prepared statement */
                        $req->bind_result($id, $login, $nom,$prenom,$mail , $password, $domaine, $valide,$cle, $fonction, $auth);
                        while ($req->fetch()) {
                                // création de l'objet
				$user = new User($id, $login,$nom,$prenom,$mail, $password, $domaine, $valide, $cle, $fonction, $auth);
                        }
                        /*
                        // avec mysqlnd
			$result = $req->get_result();
			if($result->num_rows>0){
				$entry = $result->fetch_assoc();
                                // création de l'objet
				$user = new User($entry['id'],$entry['login'],$entry['password'],$entry['valide'],$entry['cle'],$entry['fonction']);
			}*/
		}
		return $user;
	}
	public function findByLoginAndMail($login,$mail)
	{
	 	$user = null;
                $sql = "SELECT * FROM pla_utilisateur WHERE login = ? AND mail = ?";
		$req = $this->_db->prepare($sql);
		$req->bind_param("ss",$login, $mail);
		if($req->execute()){
                        // sans mysqlnd
                        /* bind variables to prepared statement */
                        $req->bind_result($id, $login,$nom,$prenom, $mail , $password, $domaine, $valide,$cle, $fonction, $auth);
                        while ($req->fetch()) {
                                // création de l'objet
				$user = new User($id, $login,$nom,$prenom,$mail, $password, $domaine, $valide, $cle, $fonction, $auth);
			}
		return $user;
		}
	}

	public function findByKey($key){
	    	$user = null;
		$sql = "SELECT * FROM pla_utilisateur WHERE cle = ?";      
		$req = $this->_db->prepare($sql);
		$req->bind_param("s",$key);
		if($req->execute()){
		    // sans mysqlnd
		    /* bind variables to prepared statement */
    			$req->bind_result($id, $login,$nom,$prenom,$mail, $password, $domaine, $valide,$cle, $fonction, $auth);
    			while ($req->fetch()) {
    				// création de l'objet
    				$user = new User($id, $login,$nom,$prenom, $mail, $password, $domaine, $valide, $cle, $fonction, $auth);
    			}
    		}
	 	return $user;
	}


    	public function resetPassByKey($key)
	{
		$chars="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$newpass=substr(str_shuffle($chars),0,5);
		$sql = "UPDATE pla_utilisateur SET password = ? WHERE cle= ?";
		$req=$this->_db->prepare($sql);
		$req->bind_param("ss",md5($newpass),$key);
		if ($req->execute())
		{
			$ret =1;
			$this->sendMailPass($newpass,$key);
		}
		else
		{
			$ret=0;
		}
	}

	public function sendMailPass($npass,$key)
	{
		$entete=$this->enTete();
		$user=$this->findByKey($key);
		$destinataire=$user->getMail();	
		$sujet="Votre nouveau Mot de Passe";
		$liennomail=URL_FULL."utilisateur/Base/unsuscribe/".urlencode($key)."/";
		$lienimg=URL_FULL."/images/logo.png";

		$message=<<<EOT
<html>
        <head>
                <meta http-equip="Content-Type" content="text/html;charset=UTF-8">
                <meta charset="utf-8"/>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">

        </head>
<body>
<div style="border : 0px 1px 0px 1px solid black";>
<table width="100%" cellspacing="0" cellpadding="0">
<tr>
        <td bgcolor="#e0e0e0">
                <div style="display:flex;margin:auto;" width="200">
                        <img src='$lienimg' alt='TutorINSA' style="margin-left:35%;display:block;" width='150' height='150'/>
                        <div>
                        <h1>Tutor'INSA</h1>
                        <p>La plateforme solidaire INSAienne</p>
                        </div>
                </div>
</td>
</tr>
<tr>
        <td style="padding:5%;">
                <table width="100%" cellspacing="0" cellpadding="0" >
			<tr><td style="padding:5%;text-align:left">
<span style="color:red;"><b>$sujet</b></span><br/><br/>
Bienvenue sur la plateforme de tutorat de l'INSA de Toulouse,<br/><br/>
Vous avez demandé un nouveau mot de passe pour votre compte, le voici: <br/>
<br/><b> $npass</b> <br/><br/>
Ceci est un mail automatique. Merci de ne pas y répondre. <br/>
Cordialement,<br/>
Les devs.
			</td></tr>
                </table>
</td>
</tr>
<tr bgcolor="#e0e0e0">
        <td style="text-align:center;">&copy; Club Info 2017 - <a  href="$liennomail">Se désinscrire</a></td>
</tr>
</table>
</div>
</body>
EOT;
	    // envoi
	   mail($destinataire, $sujet, $message, $entete) ;
	}
    
	private function enTete(){
        $t = "MIME-Version: 1.0\r\n";
        $t .= "Content-type: text/html; charset=UTF-8\r\n";
      //  $t .='Content-Transfer-Encoding: 8bit'."\r\n";
        $t .= 'From: <no-reply-tutorinsa@amicale-insat.fr>'."\r\n";
        return $t;
    }


}
