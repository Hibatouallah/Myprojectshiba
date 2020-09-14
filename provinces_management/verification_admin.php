<!DOCTYPE html>
<html>

  <?php 

  $table= 2016;
    # code...
    if (isset($_POST['password']) AND ($_POST['password']==$table))// Si le mot de passe est 
    {

    // On affiche les codes
   
   ?>
   <head>
   <meta charset="utf-8" />
   
<script>

function placeholderIsSupported() {
    test = document.createElement('input');
    return ('placeholder' in test);
  }

$(document).ready(function(){
  placeholderSupport = placeholderIsSupported() ? 'placeholder' : 'no-placeholder';
  $('html').addClass(placeholderSupport);  
});
</script>
<style type="text/css">
/* BTW alt-shift will pop a color picker 
  example color: followed  by alt shift will pop it
*/
/*
Hide the label if placeholder is supported
*/

body{
    background-image:url("china.jpg");
   background-size: 1600px 800px;
}

#registration-form {
  font-family:'Open Sans Condensed', sans-serif;
  width: 300px;
  min-width:250px;
  margin: 20px auto;
  position: relative;
}

#registration-form .fieldset {
  background-color:#33ccff;
  background-image:url("bg.jpg")  ;
border:2px solid #2F4F4F;
  border-radius: 3px;
  
}

 #registration-form legend {
  text-align: left;
  background: #364351;
  width: 100%;
  padding: 30px 0;
  border-radius: 3px 3px 0 0;
  color: white;

font-size:2em;
}

.fieldset form{
  border:4px solid #2F4F4F;
  margin:0 auto;
  display:block;
  width:100%;
  
  padding:30px 20px;
  box-sizing:border-box;
top: 320;
  border-radius:0 0 3px 3px;
}
.placeholder #registration-form label {
  display: none;
  left: -300px;
}
 .no-placeholder #registration-form label{
margin-left:5px;
  position:relative;
  display:block;
  color:grey;
  text-shadow:0 1px white;
  font-weight:bold;
  left: -300px;
}
/* all */
::-webkit-input-placeholder { text-shadow:1px 1px 1px white; font-weight:bold; }
::-moz-placeholder { text-shadow:0 1px 1px white; font-weight:bold; } /* firefox 19+ */
:-ms-input-placeholder { text-shadow:0 1px 1px white; font-weight:bold; } /* ie */
#registration-form input[type=text] {
  padding: 15px 20px;
  border-radius: 1px;
  margin:5px auto;
  background-color:#f7f7f7;
  border: 1px solid silver;

  -webkit-box-shadow: inset 0 1px 5px rgba(0,0,0,0.2);
  box-shadow: inset 0 1px 5px rgba(0,0,0,0.2), 0 1px rgba(255,255,255,.8);
  width: 100%;

  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -ms-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition:background-color .5s ease;
-moz-transition:background-color .5s ease;
-o-transition:background-color .5s ease;
-ms-transition:background-color .5s ease;
transition:background-color .5s ease;
}
.no-placeholder #registration-form input[type=number] {
  padding: 10px 20px;
  width: 50px;
}

#registration-form input[type=number]:active, .placeholder #registration-form input[type=number]:focus {
  outline: none;
  border-color: silver;
  background-color:white;
  width: 50px;
}

#registration-form input[type=submit] {
  font-family:'Open Sans Condensed', sans-serif;
  text-transform:uppercase;
  outline:none;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  -ms-box-sizing: border-box;
  box-sizing: border-box;
  width: 100%;
  background-color: #5C8CA7;
  padding: 10px;
  color: white;
  border: 1px solid #3498db;
  border-radius: 3px;
  font-size: 1.5em;
  font-weight: bold;
  margin-top: 5px;
  cursor: pointer;
  position:relative;
  top:0;
}

#registration-form input[type=submit]:hover {
  background-color: #2980b9;
}

#registration-form input[type=submit]:active {
background:#5C8CA7;
}


.parsley-error-list{
background-color:#C34343;
padding: 5px 11px;
margin: 0;
list-style: none;
border-radius: 0 0 3px 3px;
margin-top:-5px;
  margin-bottom:5px;
  color:white;
  border:1px solid #870d0d;
  border-top:none;
    -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  position:relative;
  top:-1px;
  text-shadow:0px 1px 1px #460909;
    font-weight:700;
  font-size:12px;
}
.parsley-error{
  border-color:#870d0d!important;
  border-bottom:none;
}
#registration-form select{
  width:100%;
  padding:5px;
}
::-moz-focus-inner {
  border: 0;
}
input
{
  width:250px;

  height: 40px;
}
img
{
  width: 200px;
  height: 200px;
}

</style>
</head>
<body>

<div id="registration-form">
  <div class='fieldset'>
    
    <form action="ajouter.php" method="post" data-validate="parsley">
      <div class='row'>
        <center><img  src="logo_53b5592aee78d.png"></center>
        <label for='id'><center><h2>رقم المقاطعة</h2></center></label>
        <input type="number"  name='id' id='firstname' data-required="true" min="1"max="13"data-error-message="Your First Name is required">
      </div>
      
     
      <input type="submit" value="موافق">
    </form>

  </div>
 
     
      

</div>
</div>

<?php 
}
else
{
  ?>
  <script>alert("الرقم السري غير صحيح");</script>
<?php 
//include("utilisateur2.php");
}
?>
</body>

</html>