<?php

class Personne
{

					  private $nom;
					  private $CIN;
					  private $adresse;
					  private $password;
					  private $login;
					  private $email;
					  private $type_authen;


					   public function __construct($n,$c,$a,$p,$l,$e,$t)
					   {
					   		$this->nom=$n;
							
							$this->CIN=$c;
							$this->adresse=$a;
							$this->password=$p;

							$this->login=$l;
							$this->email=$e;
							$this->type_authen=$t;
					   }


					   public function getnom()
					 {
					   return $this->nom;
					 }
					  public function getCIN()
					 {
					   return $this->CIN;
					 }
					  public function getadresse()
					 {
					   return $this->adresse;
					 }
					  public function getpassword()
					 {
					   return $this->password;
					 }
					  public function getlogin()
					 {
					   return $this->login;
					 }
					  public function getemail()
					 {
					   return $this->email;
					 }

					  public function gettype_authen()
					 {
					   return $this->type_authen;
					 }
					  





					  public function ToString()
					{
						$r= "$this->nom--$this->CIN--$this->adresse--$this->password--$this->login--$this->email--$this->type_authen";
						return $r;
					}


					public function setnom($n)
					{
						$this->nom=$n;
					}

					public function setCIN($CIN)
					{
						$this->CIN=$CIN;
					}
					public function setadresse($adresse)
					{
						$this->adresse=$adresse;
					}
					public function setpassword($password)
					{
						$this->password=$password;
					}
					public function setlogin($login)
					{
						$this->login=$login;
					}
					public function setemail($email)
					{
						$this->email=$email;
					}
					public function settype_authen($type_authen)
					{
						$this->type_authen=$type_authen;
					}

}

?>