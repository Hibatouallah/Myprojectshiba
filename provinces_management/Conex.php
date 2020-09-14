<!DOCTYPE html>
<html>

<?php
header('Content-Type: text/html; charset=utf-8');

try{


$db=new PDO("mysql:host=localhost;dbname=php;charset=utf8",'root','');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);



$moi=$db->exec("INSERT INTO `date` (id_jour,id_aal,jour) VALUES ('','$_POST[id]','$_POST[date]')" );

$red=$db->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'journal';");
$rej=$db->query("SELECT nom_elem FROM element ");
$res=$db->query("SELECT id_elem FROM element ");
$rea=$db->query("SELECT id_aal FROM aal ");
$reb=$db->query("SELECT id_jour FROM `date` WHERE ((id_aal='$_POST[id]') AND (jour='$_POST[date]'))");


$k=0;
$zone=0;


 while ( $rea1[$k]=$rea->fetchColumn()){
$rea2[]=$rea1[$k];
$k++;
 }
$k=0;
while ( $reb1[$k]=$reb->fetchColumn()){
$reb2[]=$reb1[$k];
$k++;
 }

$k=0;
while ( $donne[$k]=$red->fetchColumn()){ 
$loi[]=$donne[$k]; 
 $k++;
}

$k=0;
while ( $do[$k]=$res->fetchColumn()){ 
$lois[]=$do[$k]; 
$k++;
}

$k=0;
while ( $don[$k]=$rej->fetchColumn()){ 
$lo[]=$don[$k]; 
 $k++;
}


 $h=0;
for ($l=0; $l <count($lo); $l++) { 

$zone=$_POST[$l];
  
$sql=$db->exec("INSERT INTO `journal` SET id='' , id_aal='$_POST[id]', id_jour='$reb2[0]', id_elem='$lois[$h]', valeur='$_POST[$h]' ;");

$h++;
}

$reb2[]=NULL;
}catch(PDOException $e)
{
echo"$e";
die('Erreur : ' . $e->getMessage());
}
?>
 
<script type="text/javascript"> alert("تم الارسال بنجاح!");</script>
<?php
 include("test1.html");
?>
   
</html>

