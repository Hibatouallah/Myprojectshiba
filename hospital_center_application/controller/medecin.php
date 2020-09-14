<?php

include("Personne.php");
include("connection.php");

class medecin extends Personne
{
	
	private $specialite_medecin;
	private $type_medecin;
	private $matricule_medecin;
	private $id_matricule;



					   public function __construct($n,$c,$a,$t,$e,$l,$p,$s,$ty,$m,$i)
					   {
					     	
					   		$this->specialite_medecin=$s;
							
							$this->type_medecin=$ty;
							$this->matricule_medecin=$m;
							$this->id_matricule=$i;
							parent::__construct($n,$c,$a,$t,$e,$l,$p);
							
					   }


					   public function getspecialite_medecin()
					 {
					   return $this->specialite_medecin;
					 }

					    public function gettype_medecin()
					 {
					   return $this->type_medecin;
					 }
					    public function getmatricule_medecin()
					 {
					   return $this->matricule_medecin;
					 }
					  public function getidmatricule()
					 {
					   return $this->id_matricule;
					 }

					


					 public function setspecialite_medecin($specialite_medecin)
					{
						$this->specialite_medecin=$specialite_medecin;
					}
					 public function settype_medecin($type_medecin)
					{
						$this->type_medecin=$type_medecin;
					}

					 public function setmatricule_medecin($matricule_medecin)
					{
						$this->matricule_medecin=$matricule_medecin;
					}
					 public function setid_matricule($id_matricule)
					{
						$this->id_matricule=$id_matricule;
					}



					public function ToString()
					{
						$rr=parent::ToString();
						$r= $rr+"$this->matricule_medecin--$this->type_medecin--$this->specialite_medecin";
						return $r;
					}


					public function authentificatin($login,$password)
					{
						$C=new Connection();
						$p=$C->connecter();

						if($p==null)
						{

							echo "probleme de connection";
						    return false;
						}
						else
						{
							$result=$p->query('SELECT * From  "medecin" WHERE "login"="'+$login+'" AND "password"="'+$password+'"');
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


					public function consulterpatient($login,$password,$idp)
					{
						
						$C=new Connection();
						$p=$C->connecter();

						if(authentificatin($login,$password)==true)
						{
							
							$req = $p->query('SELECT `id_patient`, `prenom_patient`, `nom_patient`, `cin_patient`, `adresse_patient`, `email_patient`, `date_ajout_p`, `password_patient`, `date_naissance`, `situation`, `genre_p` FROM `patient` WHERE `id_patient`=$idp');
							
						}
						else
							echo "erreur d'authentificatin";
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