<?php

class Connection
{

 	private $serveur;
    private  $bd;
    private  $login;
    private  $password;

		public function __construct()
		{
			$this->$serveur="localhost";
		    $this-> $bd="sics";
		    $this-> $login="root";
            $this->$password="happyhibatouallah1996";
		}

		public function connecter()
		{
			$p=null;
			try
			{
				$p = new PDO('mysql:host=localhost;dbname=$bd;charset=utf8',$login, $password);
			}
			catch(Exception $e)
			{
					$r=$e->intl_get_error_message();
			        echo "probleme de connection code erreur:$r";
			}

			return $p;
		}

}




?>