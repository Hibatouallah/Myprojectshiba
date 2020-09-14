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
background-color: #FAFAD2;
}
fieldset{
  color:solid-black;

 margin:50;
  padding:50;

background-size: 1600px 800px;
background-image:url("6923909-blue-lake-water-wallpaper.jpg")  ;
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


</style>
<?php

try{


$db=new PDO("mysql:host=localhost;dbname=php;charset=utf8",'root','');

$zone4=$_POST['date'];
$zone5=$_POST['id'];


$rel=$db->query("SELECT nom_elem FROM element");

$rem=$db->query("SELECT valeur FROM journal WHERE id_jour IN( SELECT id_jour FROM `date` WHERE jour='$zone4' AND id_aal='$zone5') ");
$rek=$db->query("SELECT jour FROM `date`  WHERE id_aal IN( SELECT id_aal FROM journal WHERE id_aal='$zone5')");



}catch(PDOException $e)
{
echo"$e";
die();

}

$k=0;

 while ( $don[$k]=$rek->fetchColumn()){
$don2[]=$don[$k];
$k++;
 }


	?>
	 <?php
 $k=0;
    # code...
  
    # code...
 
  if ($don2[$k]==$zone4 ) {
    # code...

    ?>
  <form   method="post" action="Conex3.php"> 
	<body>
	<center>	<div>
   <fieldset  > <table width="600" border="0" cellspacing="0" cellpadding="2" >
    	<tr><td class="table-separateur">

<table width="100%" border="2" cellspacing="1" cellpadding="2">
	 <tr  ><td class="formulaire1" class="table-titre" colspan="4"><center><input type="date" name="date"  value="<?php  echo $_POST['date'] ?>";></center> </td></tr>
 
  <td class="formulaire1" width="500" class="input3"><center><input  type="number" min="<?php if (isset($_POST['id'])) echo htmlentities(trim($_POST['id'])); ?>"" max="<?php if (isset($_POST['id'])) echo htmlentities(trim($_POST['id'])); ?>"" name="id" id="id" value="<?php if (isset($_POST['id'])) echo htmlentities(trim($_POST['id'])); ?>" ></center></td>
  <td class="formulaire1" width="500" class="case3"><center><label for="id"><h1>رقم_المقاطعة</h1></label></center></td> </tr> 

  <?php
  $m=0;
 
while (($donee=$rem->fetch()) && ($donneess=$rel->fetch())) {

for ($n=0; $n < count($rel); $n++) {



  ?>  

  <tr>
  <td class="formulaire1" width="500" class="input3" ><center><input type="number" name="<?php echo $m ?>" value="<?php echo $donee[$n] ?>" id="<?php echo $m?>" ></center></td>
  <td class="formulaire1" width="500" class="case3"><center><label for="<?php  echo $m?>"><h1><?php echo $donneess[$n] ?></h1></label></center></td>
  
</tr>

  <?php 
  $n++;
  $m++;
}} 
  ?>
</table>
</td></tr>
    <tr><td  border="0">
<center><button class="button" > ارسال </button></center></td></tr>
   <br><br> </table></div></center></fieldset>
</body></form >

   <?php
   
  }
else {
  if ($don2[$k]!=$zone4) {
    # code...
 
   ?>

      <script type="text/javascript"> alert("لا توجد اي معلومات مسجاة في هدا التاريخ!");</script>

  
  <?php
include("test1.html");
   }$k++;} 

 
?>



</html>