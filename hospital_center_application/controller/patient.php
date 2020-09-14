<?php

include("Personne.php");
include("connection.php");

class Patient extends Personne
{

	private $id_patient;
	private $type_patient;
	private $dateajout;
	private $datenaissance;
	private $situation;
	private $genre;
	
	function __construct($i,$ty,$d,$dn,$s,$g,$n,$c,$a,$t,$e,$l,$p)
	{
		$this->id_patient=$i;
							
		$this->type_patient=$ty;
		$this->dateajout=$d;
		$this->datenaissance=$dn;
		$this->situation=$s;
		$this->genre=$g;
		
		parent::__construct($n,$c,$a,$t,$e,$l,$p);
		
	}



         public function getid_patient()
		{
			return $this->id_patient;
	    }

	     public function gettype_patient()
		{
			return $this->type_patient;
	    }
	     public function getdateajout()
		{
			return $this->dateajout;
	    }
	     public function getdatenaissance()
		{
			return $this->datenaissance;
	    }
	     public function getsituation()
		{
			return $this->situation;
	    }
	     public function getgenre()
		{
			return $this->genre;
	    }

	    

		public function settype_patient($type_patient)
			{
				$this->type_patient=$type_patient;
			}
		public function setdateajout($dateajout)
			{
				$this->dateajout=$dateajout;
			}
		public function setdatenaissance($datenaissance)
			{
				$this->datenaissance=$datenaissance;
			}	

		public function setsituation($situation)
			{
				$this->situation=$situation;
			}
		public function setgenre($genre)
			{
				$this->genre=$genre;
			}

       public function ToString()
		{
			$rr=parent::ToString();
			$r=$rr+"$this->id_patient--$this->type_patient--$this->dateajout--$this->datenaissance--$this->situation--$this->genre";
			return $r;
		}

		public function authentificatin($login,$password)
					{
						$C=new Connection();
						$p=$C->connecter();

						if($p==null)
							echo "probleme de connection";
						else
						{
							$result=$p->query('SELECT * From "patient" WHERE "login"="'+$login+'" AND "password"="'+$password+'"');
							if($result!=null)
							{
								echo"authentificatin reussie";
								return true;
							}
								
							else
							{
								echo "veuillez saisir le mot de passe";
							    return false;
							}
                                
						}
					}


		public function consulterrendezvous($login,$password,$idp)
					{
						
						$C=new Connection();
						$p=$C->connecter();

						if(authentificatin($login,$password)==true)
						{
							
							$req = $p->query('SELECT `id_rendezvous`, `date_rendezvous`, `heure_rendezvous`, `description_rendezvous`, `id_patient`, `id_medecin`, `id_infermier` FROM `rendezvous` WHERE `id_patient`=$idp');
							
						}
						else
							echo "erreur d'authentificatin";
					}


					public function consultervisite($login,$password,$idp)
					{
						
						$C=new Connection();
						$p=$C->connecter();

						if(authentificatin($login,$password)==true)
						{
							
							$req = $p->query('SELECT `id_visite`, `type_visite`, `date_visite`, `id_patient`, `id_medecin`, `id_infermier` FROM `visite` WHERE `id_patient`=$idp');
							
						}
						else
							echo "erreur d'authentificatin";
					}

}









?>