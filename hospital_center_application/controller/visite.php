<?php

class visite 
{


	private  $type;
	private  $cause;
	private  $description;
//
	
	
					   public function __construct($type,$cause,$d)
					   {
					   		$this->type=$type;
							
							$this->cause=$cause;
							$this->description=$d;
							
					   }


					   public function gettype()
					 {
					   return $this->type;
					 }

					    public function getcause()
					 {
					   return $this->cause;
					 }
					    public function getdescription()
					 {
					   return $this->description;
					 }

					 public function settype($type)
					{
						$this->type=$type;
					}


					 public function setcause($cause)
					{
						$this->cause=$cause;
					}
					 public function setdescription($description)
					{
						$this->description=$description;
					}


					public function ToString()
					{
						$r= "$this->cause--$this->description--$this->type";
						return $r;
					}
}


?>
