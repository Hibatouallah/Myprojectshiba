
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
       <!-- Our CSS stylesheet file -->
        
          <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="assets/js/script.js">
    </script>

       <style type="text/css">
html{
  /*background:url('../img/bg_tile.jpg') #161718;*/
  background:url('Nature-Beach-Scenery-Wallpaper-HD.jpg') #161718;
}
       #formContainer{
  width:288px;
  height:321px;
  margin:0 auto;
  position:relative;
  left: 30;
  z-index:1;
  
  -moz-perspective: 800px;
  -webkit-perspective: 800px;
  perspective: 800px;
}

input[type=text],input[type=password]{
  /* The text fields */
  font: 15px 'Segoe UI',Arial,sans-serif;
  border: none;
  background:none;
  height: 36px;
  left: 26px;
  position: absolute;
  top: 176px;
  width: 234px;
  text-indent: 8px;
  text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.3);
  color:#eee;
  outline:none;
}
 

#loginPass{
  top: 215px;
}

#recoverEmail{
  top:215px;
}

input[type=submit]{
  
  /* Submit button */
  
  opacity:0.9;
  position:absolute;
  top:262px;
  left:25px;
  width: 239px;
  height:36px;
  cursor:pointer;
  border-radius:6px;
  box-shadow:0 1px 1px #888;
  border:none;
  color:#fff;
  font:14px/36px 'Segoe UI Light','Segoe UI',Arial,sans-serif;
  
  /* CSS3 Gradients */
  
  background-image: linear-gradient(bottom, rgb(80,102,127) 50%, rgb(87,109,136) 50%, rgb(106,129,155) 100%);
  background-image: -o-linear-gradient(bottom, rgb(80,102,127) 50%, rgb(87,109,136) 50%, rgb(106,129,155) 100%);
  background-image: -moz-linear-gradient(bottom, rgb(80,102,127) 50%, rgb(87,109,136) 50%, rgb(106,129,155) 100%);
  background-image: -webkit-linear-gradient(bottom, rgb(80,102,127) 50%, rgb(87,109,136) 50%, rgb(106,129,155) 100%);
  background-image: -ms-linear-gradient(bottom, rgb(80,102,127) 50%, rgb(87,109,136) 50%, rgb(106,129,155) 100%);
  
  background-image: -webkit-gradient(
    linear,
    left bottom,
    left top,
    color-stop(0.5, rgb(80,102,127)),
    color-stop(0.5, rgb(87,109,136)),
    color-stop(1, rgb(106,129,155))
  );
}

input[type=submit]:hover{
  opacity:1;
}

input::-webkit-input-placeholder {
    color:#eee;
}



#login{
  /*background:url('../img/login_form_bg.jpg') no-repeat;*/
  background:url('bg_login.jpg') no-repeat;
  z-index:100;
  top: 200;
  background-position:650px; 
}

img
{
  width: 190px;
  height: 190px;
}

       </style> 
        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <center>
    <body>
       <img  src="logo_53b5592aee78d.png">
<form id="login" method="post" action="verification_admin.php"> 
 
 <div id="formContainer">
    
        <input type="text" name="login" id="loginEmail" value="utilisateur"/>
        <input type="password" name="password" id="loginPass" placeholder="password" />
        <input type="submit" name="submit" value="Login" />
      
        
  
 </div>
</form>
        <!-- JavaScript includes -->
  
    </body>
  </center>
</html>

