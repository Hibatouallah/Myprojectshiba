<?php

include("medecin.php");
include("connection.php");

class medecin_chef extends medecin
{
	
	function __construct($n,$c,$a,$t,$e,$l,$p,$s,$ty,$m,$i)
	{
		parent::__construct($n,$c,$a,$t,$e,$l,$p,$s,$ty,$m,$i)
	}

	public function ToString()
	{
		$rr=parent::ToString();
		return $rr;
	}

	public function delivremedicament($login,$password,$idmed,$idmedecin,$iidinf,$idp,$idmedstock,$datedeliv)
	{
		$C=new Connection();
		$p=$C->connecter();

			if(authentificatin($login,$password)==true))
				{
							
					$req = $p->prepare('INSERT INTO `medicament`(`id_medecin`, `id_infermier`, `id_patient`, `id_medicamentstock`, `date_delivmed`) VALUES ($idmedecin,$idinf,$idp,$idmedstock,$datedeliv)');
							
				}
			else
				echo "erreur d'authentificatin";
	}

	public function ajoutermedicament($login,$password,$descrip,$nbu,$titre,$unitemini)
	{
		$C=new Connection();
		$p=$C->connecter();

			if(authentificatin($login,$password)==true))
				{
							
					$req = $p->prepare('INSERT INTO `medicament_stock`(`description_medicamentstock`, `nombre_unite`, `titre_medicamentstock`, `unite_minimal`) VALUES
					 ($descrip,$nbu,$titre,$unitemini)');
							
				}
			else
				echo "erreur d'authentificatin";
	}

}
















?>