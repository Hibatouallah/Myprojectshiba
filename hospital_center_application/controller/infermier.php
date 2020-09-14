<?php

include("Personne.php");
include("connection.php");

class infermier extends Personne
{
	
	private $specialite_infermier;
	private $type_infermier;
	private $matricule_infermier;



					   public function __construct($t,$s,$m,$n,$c,$a,$t,$e,$l,$p)
					   {
					     	
					   		$this->specialite_infermier=$s;
							
							$this->type_infermier=$t;
							$this->matricule_infermier=$m;
							parent::__construct($n,$c,$a,$t,$e,$l,$p);
					   }


					   public function getspecialite_infermier()
					 {
					   return $this->specialite_infermier;
					 }

					    public function gettype_infermier()
					 {
					   return $this->type_infermier;
					 }
					    public function getmatricule_infermier()
					 {
					   return $this->matricule_infermier;
					 }

					


					 public function setspecialite_infermier($specialite_infermier)
					{
						$this->specialite_infermier=$specialite_infermier;
					}
					 public function settype_infermier($type_infermier)
					{
						$this->type_infermier=$type_infermier;
					}

					 public function setmatricule_infermier($matricule_infermier)
					{
						$this->matricule_infermier=$matricule_infermier;
					}



					public function ToString()
					{
						$rr=parent::ToString();
						$r=$rr+"$this->matricule_infermier--$this->type_infermier--$this->specialite_infermier";
						return $r;
					}

					// fonction d'authentification

					public function authentificatin($login,$password)
					{
						$C=new Connection();
						$p=$C->connecter();

						if($p==null)
							echo "probleme de connection";
						else
						{
							$result=$p->query('SELECT * From "infermier" WHERE "login"="'+$login+'" AND "password"="'+$password+'"');
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

					public function AjouterPatient($login,$password,$ty,$d,$dn,$s,$g,$n,$c,$a,$t,$e,$l,$p)
					{
						$C=new Connection();
						$p=$C->connecter();

						if(authentificatin($login,$password)==true))
						{
					     	$req = $p->prepare('INSERT INTO patient (`prenom_patient`,`nom_patient`, `cin_patient`, `adresse_patient`, `email_patient`, `date_ajout_p`, `password_patient`, `date_naissance`, `situation`, `genre_p`) VALUES ($p,$n,$c,$a,$e,$d,$p,$dn,$s,$g)');
							
						}
						else
							echo "erreur d'authentificatin";

					}

					public function Ajoutervisite($login,$password,$ty,$d,$ip,$im,$ii)
					{
						$C=new Connection();
						$p=$C->connecter();

						if(authentificatin($login,$password)==true))
						{
							
							$req = $p->prepare('INSERT INTO `visite`(`type_visite`, `date_visite`, `id_patient`, `id_medecin`, `id_infermier`) VALUES ($ty,$d,$ip,$im,$ii)');
							
						}
						else
							echo "erreur d'authentificatin";

					}

					public function Ajouterrendezvous($login,$password,$dr,$hr,$dr,$ip,$im,$ii)
					{
						$C=new Connection();
						$p=$C->connecter();

						if(authentificatin($login,$password)==true))
						{
							
							$req = $p->prepare('INSERT INTO `rendezvous`(`date_rendezvous`, `heure_rendezvous`, `description_rendezvous`, `id_patient`, `id_medecin`, `id_infermier`) VALUES ($dr,$hr,$dr,$ip,$im,$ii)');
						}
						else
							echo "erreur d'authentificatin";

					}




	
}



?>