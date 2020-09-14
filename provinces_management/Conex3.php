<html>
<head>
<meta charset="utf-8"/>
</head>



<?php

try{


$db=new PDO("mysql:host=localhost;dbname=php;charset=utf8",'root','');

$zone4=$_POST['date'];
$zone5=$_POST['id'];
$rel=$db->query("SELECT nom_elem FROM element");


$k=0;
while ($dd[$k]=$rel->fetchColumn()) {

$j=$k+1;

$res=$db->exec("UPDATE journal SET valeur=$_POST[$k] WHERE id_jour IN (SELECT id_jour FROM `date` WHERE  id_aal='$zone5' AND jour='$zone4' AND id_elem=$j) ");


$k++;

}

}catch(PDOException $e)
{
echo"$e";
die();

}  include("Conex2.php");

?>


