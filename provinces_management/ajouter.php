<html>
<head>
<meta charset="utf-8"/>
</head>
<style type="text/css">
.formulaire1{


     width: 200px;
    margin: -32px auto 30px;
    padding: 5px;
    position: relative; /* position du bouton de validation*/

    /* Styles */
    box-shadow: 
        0 0 1px rgba(0, 0, 0, 0.4), 
        0 3px 7px rgba(0, 0, 0, 0.4), 
        inset 0 1px rgba(255,255,255,1),
        inset 0 -3px 2px rgba(0,0,0,0.25);
    border-radius: 8px;
    background: yellow; 
    background: -moz-linear-gradient(#eeefef,   #8B0000 10%);
    background: -ms-linear-gradient(#eeefef,  #8B0000 10%);
    background: -o-linear-gradient(#eeefef, #ffffff 10%);
    background: -webkit-gradient(linear, 0 0, 0 100%, from(#eeefef), color-stop(0.1,  #8B0000));
    background: -webkit-linear-gradient(#eeefef,  #8B0000 10%);
    background: linear-gradient(#eeefef,  #80ced6 10%);}

    .lui{
 top: -200px;
 left:  -37%;
     width: 300px;
    margin: -32px auto 30px;
    padding: 20px;
    position: relative; /* position du bouton de validation*/

    /* Styles */
    box-shadow: 
        0 0 1px rgba(0, 0, 0, 0.4), 
        0 3px 7px rgba(0, 0, 0, 0.4), 
        inset 0 1px rgba(255,255,255,1),
        inset 0 -3px 2px rgba(0,0,0,0.25);
    border-radius: 8px;
    background: #32b2a2; 
    background: -moz-linear-gradient(#32b2a2, #ffffff 10%);
    background: -ms-linear-gradient(#32b2a2, #ffffff 10%);
    background: -o-linear-gradient(#32b2a2, #ffffff 10%);
    background: -webkit-gradient(linear, 0 0, 0 100%, from(#32b2a2), color-stop(0.1, #00CED1));
    background: -webkit-linear-gradient(#32b2a2, #ffffff 10%);
    background: linear-gradient(#1E90FF , #87CEFA 10%);
}
body{
background-color: #DBDECC;

}


 .button {
  font-size: 30px;
     color: white;
     border-radius: 4px;
      text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
        }
  .button {
    background: rgb(66, 184, 221); /* this is a light blue */
        }
        button:hover{
          font-size: 35px;
          background-color:  #1E90FF;
        }

table{
vertical-align: middle;
}

</style>
<?php

try{


$db=new PDO("mysql:host=localhost;dbname=php;charset=utf8",'root','');

//$zone4=$_POST['date'];
$zone5=$_POST['id'];
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);


$rel=$db->query("SELECT nom_elem FROM element");

$rem=$db->query("SELECT  J.valeur FROM `date` D , journal J WHERE (J.id_aal=D.id_aal AND J.id_jour=D.id_jour) AND D.id_aal='$zone5' ORDER BY  D.jour DESC  ");
$reb=$db->query("SELECT DISTINCT D.jour FROM `date` D , journal J WHERE (J.id_aal=D.id_aal AND J.id_jour=D.id_jour) AND D.id_aal='$zone5' ORDER BY  D.jour DESC  ");

	?>
	
  
	<body>
	<center>	<div>
    <tr><td class="table-separateur">
   	<table width="1000" border="0" cellspacing="0" cellpadding="2" >
    	


	 
  <?php
  
  


    ?>
 
  <?php
  $m=0;
$k=0;

 while ( $don[$k]=$rel->fetchColumn()){
$don2[]=$don[$k];
$k++;
 }
$k=0;
while ( $donn[$k]=$rem->fetchColumn()){
$donn2[]=$donn[$k];
$k++;
 }

 $k=0;
while ( $dd[$k]=$reb->fetchColumn()){
$dd2[]=$dd[$k];
$k++;
 }

$nb=count($don2);

for ($n=0; $n <count($don2); $n++) {

  if ($n%$nb==0) {  ?> 
   <td class="formulaire1" width="500" class="case3"><center><label ><h1>التاريخ</h1></label></center></td> 
 <?php 
}
?> 

 
 <td class="formulaire1" width="500" class="case3"><center><label for="<?php  echo $m ?>"><h1><?php echo $don2[$n]?></h1></label></center></td> 
 

  <?php 
  
  $m++;

//} 
}?>

 

<td><tr>
  
<?php

$l=0;
$u=0;
for ($n1=0; $n1 <count($donn2); $n1++) {

if ($n1%$nb==0) {  ?> 

 <td class="formulaire1" width="500" class="input3" ><center><input type="date"  value="<?php echo $dd2[$u] ?>"  ></center></td>
<?php
$u++;}
?> 

<td class="formulaire1" width="500" class="input3" ><center><input type="number" name="<?php echo $m ?>" id="<?php echo $m?>" value="<?php echo $donn2[$n1] ?>" ></center></td>
<?php
 
$l++;
if ($l%$nb==0) {
 ?> 

</td></tr>  
<?php
} }?>
 


    </table></td></tr></div></center>

</body>

   <?php


}catch(PDOException $e)
{
echo"$e";
die();

}  

?>



</html>