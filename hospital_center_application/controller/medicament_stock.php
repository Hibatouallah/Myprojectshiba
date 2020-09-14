<?php

CLASS medicament_stock{
			 private   $id_medicamentstock ;
			 private   $titre_medicamentstock;
			 private   $description_medicamentstock;
			 private   $nombre_unite;
			 private   $unite_minimal;

		 
		public function getid_medicamentstock()
		 {
		   return this->id_medicamentstock;
		 }
		 public function gettitre_medicamentstock()
		 {
		   return this->titre_medicamentstock;
		 }
		 public function getdescription_medicamentstock()
		 {
		   return this->description_medicamentstock;
		 }
		 public function getnombre_unite()
		 {
		   return this->nombre_unite;
		 }
		 public function getunite_minimal()
		 {
		   return this->unite_minimal;
		 }


		public function settitre_medicamentstock($t)
		{
			$this->titre_medicamentstock=$t;
		}
		public function setdescription_medicamentstock($d)
		{
			$this->description_medicamentstock=$d;
		}
		public function setnombre_unite($N)
		{
			$this->nombre_unite=$N;
		}
		public function setunite_minimal($u)
		{
			$this->unite_minimal=$u;
		}


		public function __construct($i,$d,$N,$u,$t)
		{
			$this->id_medicamentstock=$i;
			$this->titre_medicamentstock=$t;
			$this->description_medicamentstock=$d;
			$this->nombre_unite=$N;
			$this->unite_minimal=$u;


		}

		public function ToString()
		{
			$r= "$this->id_medicamentstock--$this->titre_medicamentstock--$this->description_medicamentstock--$this->nombre_unite--$this->unite_minimal";
			return $r;
		}

		}

}

?>
