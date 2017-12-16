<?php
  session_start();    
 // ini_set('display_errors',1);  error_reporting(E_ALL);
  include("config.php");
  include('rememberme.php');
  if(!isset($_SESSION['login_user']))
    rememberMe();
?>  
<!DOCTYPE html>
<html>
<head>
  <title>About</title>
  <link rel="stylesheet" type="text/css" href="gradient.css">
  <link rel="stylesheet" type="text/css" href="homepage2.css" />
  <link rel="stylesheet" type="text/css" href="about.css">
</head>
<body>
<div id="homemenu">
<a href="HOMEPAGE.php">HOME</a>
<a href="games.php">GAMES</a>
<a href="leaderboard.php">LEADERBOARD</a>
<a href="about.php">ABOUT US</a>
<img src="logo.gif">     
</div> 

<div id="homemenu2">
<?php if(!isset($_SESSION["login_user"])) : ?>
  <a href="login.php">Log In</a>    
  <a href="register.php">Register</a>
<?php else : ?>
  <a href="logout.php">Logout</a>
  <span style="color:white"><a><?php echo "Welcome ".$_SESSION['login_user'] ?></a></span>
<?php endif ?>
</div>     

     <div id="about">
     	<div>
       <img src="8.jpg">
       <h2>S. Bharat</h2>
       <p>bharat.s17@iiits.in</p>
     	</div>
     	<div>
       <img src="8.jpg">
       <h2>Vismith Adappa</h2>
       <p>vismith.a17@iiit.in</p>
     	</div>
     	<div>
       <img src="8.jpg">
       <h2>Prashant Raj</h2>
       <p>prashant.r17@iiit.in</p>     		
     	</div>
     	<div class="c">   
       <img src="8.jpg">  
       <h2>Siddhartha Mishra</h2>
       <p>siddartha.m17@iiit.in</p>		
     	</div>
     	<div class="c"> 
       <img src="8.jpg">   	
       <h2>Nikhil Sampangi</h2>
       <p>nikhil.s17@iiits.in</p>	
     	</div>
     </div>


</body>
</html>