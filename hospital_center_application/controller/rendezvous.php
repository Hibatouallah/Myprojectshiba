<?php

class rendezvous 
{


	private  $daterendezvous;
	private  $heure;
	private  $description;

	
	
					   public function __construct($date,$h,$d)
					   {
					   		$this->daterendezvous=$date;
							
							$this->heure=$h;
							$this->description=$d;
							
					   }


					   public function getdaterendezvous()
					 {
					   return $this->daterendezvous;
					 }

					    public function getheure()
					 {
					   return $this->heure;
					 }
					    public function getdescription()
					 {
					   return $this->description;
					 }

					 public function setdaterendezvous($daterendezvous)
					{
						$this->daterendezvous=$daterendezvous;
					}


					 public function setheure($heure)
					{
						$this->heure=$heure;
					}
					 public function setdescription($description)
					{
						$this->description=$description;
					}


					public function ToString()
					{
						$r= "$this->daterendezvous--$this->description--$this->daterendezvous";
						return $r;
					}



}




?>