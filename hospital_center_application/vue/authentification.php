<?php




if(isset($type) && isset($login) && isset($password))
{
	$type=$_POST["type"];
    $login=$_POST["login"];
    $password=$_POST["password"];

	  switch ($type) {
	  	case 'patient':
	  	    include("patient.php");
	  		$p=new Patient();
	  		$p->authentificatin($login,$password);
	  		break;
	  	case 'medecin':
	  	include("medecin.php");
	  		$m=new medecin();
	  		$m->authentificatin($login,$password);
	  	case 'infermier':
	  	include("infermier.php");
	  		$i=new infermier();
	  		$i->authentificatin($login,$password);
	  	
	  	default:
	  		echo("erreur");
	  		break;
	  }	

	  header('index.html');
}
  




?>
<!--
<!DOCTYPE html>
<html>
<head>
	<title> authentification</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<form action="authentificatin.php" method="POST">
		
		<fieldset>
		<legend><b>Authentification</b></legend>
		 <table class="test">
		 	<tr class="separated">
		 		<td><label> Login <font color="red">*</font></label></td>
                <td><input type="tesxt" name="login" required></td>
		 	</tr>
		 	
		 	<tr class="separated">
				<td><label>Password<font color="red">*</font></label></td>
				<td><input type="password" name="password" required></td>
			</tr>
			
		 	<tr class="separated">
			  
               <td><label>Type<font color="red">*</font></label></td>
                <td><select name="type">
                    <option size="33">Patient</option>
                     <option size="33">Medecin</option>
                     <option size="33">Infermier</option>
                   </select>
                 </td>
                 <br>
            </tr>
		    
			<tr >
			
				<td colspan="2"><center><input type="submit" name="submit" required><input type="reset" name="reset" required></center></td>
			</tr>
			
		 </table>
		 </fieldset>
		
</body>
</html>-->



<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
	

	@import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
.login-block{
    background: #DE6262;  /* fallback for old browsers */
background: -webkit-linear-gradient(to bottom, #FFB88C, #DE6262);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to bottom, #FFB88C, #DE6262); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
float:left;
width:100%;
padding : 50px 0;
}
.banner-sec{background:url(https://static.pexels.com/photos/33972/pexels-photo.jpg)  no-repeat left bottom; background-size:cover; min-height:500px; border-radius: 0 10px 10px 0; padding:0;}
.container{background:#fff; border-radius: 10px; box-shadow:15px 20px 0px rgba(0,0,0,0.1);}
.carousel-inner{border-radius:0 10px 10px 0;}
.carousel-caption{text-align:left; left:5%;}
.login-sec{padding: 50px 30px; position:relative;}
.login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
.login-sec .copy-text i{color:#FEB58A;}
.login-sec .copy-text a{color:#E36262;}
.login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color: #DE6262;}
.login-sec h2:after{content:" "; width:100px; height:5px; background:#FEB58A; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
.btn-login{background: #DE6262; color:#fff; font-weight:600;}
.banner-text{width:70%; position:absolute; bottom:40px; padding-left:20px;}
.banner-text h2{color:#fff; font-weight:600;}
.banner-text h2:after{content:" "; width:100px; height:5px; background:#FFF; display:block; margin-top:20px; border-radius:3px;}
.banner-text p{color:#fff;}
</style>

<section class="login-block">
    <div class="container">
	<div class="row">
		<div class="col-md-4 login-sec">
		    <h2 class="text-center">Login Now</h2>
		    <form class="login-form">
  <div class="form-group">
    <label for="exampleInputEmail1" class="text-uppercase">Username</label>
    <input type="text" class="form-control" placeholder="">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Password</label>
    <input type="password" class="form-control" placeholder="">
  </div>
  
  
    <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      <small>Remember Me</small>
    </label>
    <button type="submit" class="btn btn-login float-right">Submit</button>
  </div>
  
</form>

		</div>
		<div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
            <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        
  </div>
    </div>
    
            </div>	   
		    
		</div>
	</div>
</div>
</section>