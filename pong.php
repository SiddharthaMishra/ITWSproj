<!DOCTYPE html>
<?php 
  ini_set('display_errors',1);  error_reporting(E_ALL);
  include("config.php");
  session_start();
?>  
<html>
  <head>
    <title>PONG</title>
    <link href="pong.css" rel="stylesheet">
  </head>
  <div id="mainmenu">
		<a href="">GAMES</a>
		<a href="">LEADERBOARD</a>
		<a href="">ABOUT US</a>
  </div>

  <div class="hl"></div>
  <div id="homemenu">
	<h1>WEBPAGE NAME</h1>
	<a href="HOMEPAGE.php"><img src="3.jpg"></a> 
	<div id="homemenu2">
		<?php if(!isset($_SESSION["login_user"])) : ?>
			<a href="login.php">Log In</a>    
			<a href="register.php">Register</a>
		<?php else : ?>
			<a href="logout.php">Logout</a>
			<span style="color:white"><?php echo "Welcome ".$_SESSION['login_user'] ?></span>
		<?php endif ?> 
	</div>   
	</div> 
  <div class="vl"></div> 
  <body id="grad1">
   <br><br><br><br><br><br><br>
    <button type="reset" onclick="restart()">Reset</button><br>
    <script src="pong.js"></script>
  </center>
  </body>
</html>
