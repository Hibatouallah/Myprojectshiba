<!DOCTYPE html>
<html>

<?php

header('Content-Type: text/html; charset=utf-8');
try{

$db=new PDO("mysql:host=localhost;dbname=php;charset=utf8",'root','');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$db=new PDO("mysql:host=localhost;dbname=php;charset=utf8",'root','');
$rel=$db->query("SELECT nom_elem FROM element");
$reg=$db->query("SELECT nom FROM aal");


}catch(PDOException $e)
{
echo"$e";
die();

}  
?>
 


<?php 
$j=0;
  $table= ['2001','2002','2003','2004','2005','2006','2007','2008','2009','2010','2011','2012','2013'];
for ( $i=0; $i<13 ; $i++) {

	
    if ((isset($_POST['mot_de_passe']) AND $_POST['mot_de_passe'] ==  $table[$i]) AND (isset($_POST['id']) AND $_POST['id']== $i+1)) 
    {
    
   
   ?>

<head>
<meta charset="utf-8"/>
<link rel="stylesheet" type="text/css" href="css/style.css" />

<style>


.preview {
  width: 0%;
  margin-left: 5%;
  border: 0px ;height: 20%;
  text-align: left;

}

input{
  text-align:center ;
  display: inline-block;
  padding: 6px;
  }

body {
  color:solid-black;
  margin:50;
  padding:50;
  background-size: 1600px 800px;
  background-image:url("marina_agadir.jpg")  ;
     
}



div { 
  position:absolute;
  left: 50%;
  top: 50%;
  width: 200px;
  height: 200px;
  margin-left: -300px; 
  margin-top: -90px; 

}



.table-separateur {
  font-size : 10px; 
  font-family : Verdana, arial, helvetica, sans-serif; 
  color : #333333; 
  
}


.table-titre {
  font-size : 20px; 
  font-family : Verdana, arial, helvetica, sans-serif; 
  color : #58D3F7; 
  text-align : center; 
  font-weight : bold; 
  background-color : #0B4C5F; 
}


.case3 {
  font-size : 20px; 
  font-family : Verdana, arial, helvetica, sans-serif;
  color : #333333; 
  background-color : #086A87;
  text-align : right; 
}


.input3 {
  font-size : 20px; 
  font-family : Verdana, arial, helvetica, sans-serif; 
  color : #333333; 
  text-align : center; 
  background-color : #0489B1; 
}





.formulaire1{


  width: 200px;
  margin: -32px auto 30px;
  padding: 10px;
  position: relative; 

    
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
    background: linear-gradient(#eeefef,  #ffffff 10%);}

.lui{
  top: -600px;
  left:  -230%;
  width: 300px;
  margin: -20px auto 30px;
  padding: 20px;
  position: relative; 
 
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



.formulaire1{


  width: 200px;
  margin: -32px auto 30px;
  padding: 10px;
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
    background: linear-gradient(#eeefef,  #ffffff 10%);}

button:hover {

  color: #000080;
  font-size: 20px;

}


</style>

</head>





<center>
<form  action="Conex.php" method="post"> 
<body>
  

<img width="200" src="Wilaya_Agadir.gif" >

  <div id="goi">

<table   width="600" border="0" cellspacing="0" cellpadding="2"><tr><td class="table-separateur">

<table width="100%" border="0" cellspacing="1" cellpadding="2">
	<tr  ><td class="formulaire" class="table-titre" colspan="4"><center><input type="date" name="date" max="<?php  echo date('Y-m-d'); ?>" min="<?php  echo date('Y-m-d'); ?>" value="<?php  echo date('Y-m-d'); ?>";></center> </td></tr>
	<?php
	
  $m=0;


		?>
  <td class="formulaire" width="500" class="input3"><center><input  type="number" min="<?php if (isset($_POST['id'])) echo htmlentities(trim($_POST['id'])); ?>"" max="<?php if (isset($_POST['id'])) echo htmlentities(trim($_POST['id'])); ?>"" name="id" id="id" value="<?php if (isset($_POST['id'])) echo htmlentities(trim($_POST['id'])); ?>" ></center></td>
  <td class="formulaire" width="500" class="case3"><center><label for="id"><h1>رقم_المقاطعة</h1></label></center></td> </tr> 


	<?php
	
while ($donee=$rel->fetch()) {

for ($n=0; $n < count($rel); $n++) {

	?>	

	<tr>
  <td class="formulaire" width="500" class="input3" ><center><input type="number" name="<?php echo $m ?>"  id="<?php echo $m?>" ></center></td>
  <td class="formulaire" width="500" class="case3"><center><label for="<?php  echo $m?>"><h1><?php echo $donee[$n]?></h1></label></center></td>
  
</tr>

	<?php	
  $m++;
	}}
	?>
	</table>

  

</td></tr>

<tr><td class="formulaire" border="0">

<center><button> ارسال </button></center></td></tr>


      
 </div></center>


</table>
</body>
</form> 
<?php

  	
    }

    else // Sinon, on affiche un message d'erreur
    { 

       $j++;  
    }

      if ($j==13) {
        
 ?>

      <script type="text/javascript"> alert("الرقم السري غير صحيح!");</script>

  
  <?php include("test1.html");
  }
   }
    
 
  
 ?>
 <form   method="post" action="Conex2.php">  
  
<fieldset class="lui">
  <center><label><h1>اختيار التاريخ</h1></label></center><br><br><br>
<center><label><h4>رقم المقاطعة</h4></center><center></label><br><input type="number" name="id" id="id" min="<?php if (isset($_POST['id'])) echo htmlentities(trim($_POST['id'])); ?>" max="<?php if (isset($_POST['id'])) echo htmlentities(trim($_POST['id'])); ?>" class="formulaire1" value="<?php if (isset($_POST['id'])) echo htmlentities(trim($_POST['id'])); ?>">
  <center><label><h4>التاريخ</h4></center><center></label><br><input type="date" name="date" id="date" class="formulaire1" value="<?php  echo date('Y-m-d'); ?>" > <br>
  <button for="calendrier" class="formulaire1"><h3>ارسال</h3></button></center>
</fieldset>
</form>