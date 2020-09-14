<?php






class visite 
{


	



}

/**
 * 
 */
class medecin extends Personne
{
	
	private $specialite_medecin;
	private $type_medecin;
	private $matricule_medecin;



					   public function __construct($t,$s,$m,$a,$b,$c,$d,$e,$f,$g)
					   {
					   		super($a,$b,$c,$d,$e,$f,$g);
					   		$this->specialite_medecin=$s;
							
							$this->type_medecin=$t;
							$this->matricule_medecin=$m;
							
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



					public function ToString()
					{
						$r= "$this->matricule_medecin--$this->type_medecin--$this->specialite_medecin";
						return $r;
					}


	
}





?>